<?php

namespace App\Http\Controllers;

use App\Models\News as NewsModel;
use App\Http\Controllers\Factory;
use App\Http\Controllers\Login;
use Exception;
use Illuminate\Support\Facades\Auth;

class News
{

    /**
     * Inserir materias no BD
     */
    public function criarMateria()
    {
        $objLogin = new Login();
        $objLogin->validarSessao();
        $id_materias = $this->listarMaterias();
        $materias = $this->consultarMateria();

        try {
            // IGNORAR SAVE SE A CONSULTA NA API RETORNAR NADA
            if (!is_null($materias)) {
                foreach ($materias as $news) {
                    if (!in_array($news->id, $id_materias)) { // SE NAO EXISTIR MATERIA NO BD, ENTAO SALVA
                        $objNews = new NewsModel();

                        $objNews->id_materia = $news->id;
                        $objNews->titulo = $news->title;
                        $objNews->recorte = $news->excerpt;
                        $objNews->categoria = $news->categories[0];
                        $objNews->conteudo = $news->content;
                        $objNews->autor = $news->author;
                        $objNews->tms_cadastro = Factory::dataAgora();

                        $objNews->save();
                    }
                }
            }

            $materias = $this->buscarMaterias();

            return view('/home', ['materias' => $materias, 'total' => count($materias)]);
        } catch (Exception $e) {
            return __FUNCTION__ . ": " . $e->getMessage();
        }
    }


    /**
     * Buscar todas as materias (atualizadas)
     */
    public function buscarMaterias($quantidadePadrao = 9)
    {
        $materias = array();

        try {
            if ($quantidadePadrao == 9) {
                $resultado = NewsModel::select('id_materia', 'categoria', 'titulo', 'recorte', 'autor', 'tms_cadastro')
                    ->orderBy('id_materia', 'desc')
                    ->limit(9)
                    ->get();
            } elseif($quantidadePadrao == 0) {
                $resultado = NewsModel::select('id_materia', 'categoria', 'titulo', 'recorte', 'autor', 'tms_cadastro')
                    ->orderBy('id_materia', 'desc')
                    ->get();
            } else {
                $resultado = NewsModel::inRandomOrder()->take(4)->get();;
            }

            // CRIAR UM ARRAY COM DADOS PARA A HOME
            foreach ($resultado as $materia) {
                $imagem = Factory::imagem($materia->categoria);
                $dataPost = Factory::dataAmigavel($materia->tms_cadastro);

                array_push($materias, array(
                    "id_materia" => $materia->id_materia,
                    "categoria" => $materia->categoria,
                    "titulo" => $materia->titulo,
                    "recorte" => $materia->recorte,
                    "autor" => $materia->autor,
                    "imagem" => $imagem,
                    "dataPost" => $dataPost
                ));
            }

            return $materias;
        } catch (Exception $e) {
            die($e);
            return __FUNCTION__ . ": " . $e->getCode();
        }
    }


    /**
     * Listar Materias ja existentes no BD
     */
    public function listarMaterias()
    {
        $id_materias = array();

        try {
            $resultado = NewsModel::select('id_materia')->get();

            // CRIA UM ARRAY COM ID DAS MAERIAS JA EXISTENTES
            foreach ($resultado as $materia) {
                array_push($id_materias, $materia->id_materia);
            }

            return $id_materias;
        } catch (Exception $e) {
            return __FUNCTION__ . ": " . $e->getCode();
        }
    }


    /**
     * Consultar as Materias na API
     */
    public function consultarMateria()
    {
        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://thmais.com.br/wp-json/feed/v1/posts/every',
                CURLOPT_RETURNTRANSFER => True,
            ));

            $response = curl_exec($curl);

            return json_decode($response);
        } catch (Exception $e) {
            return __FUNCTION__ . ": $e";
        }
    }


    /**
     * Listar todas as materias para VER MAIS
     */
    public function verMais()
    {
        try {
            $materias = $this->buscarMaterias(0);

            return view('/verMais', ['materias' => $materias, 'total' => count($materias)]);
        } catch (Exception $e) {
            return __FUNCTION__ . ": " . $e->getMessage();
        }
    }


    /**
     * Exibir todo o conteudo da materia
     */
    public function exibirMateria($id)
    {
        try {
            // Obter o conteudo da materia clicada
            $resultado = NewsModel::where('id_materia', $id)->first();

            $dataPost = Factory::dataAmigavel($resultado->tms_cadastro);
            $imagem = Factory::imagem($resultado->categoria);

            $materia = array(
                "titulo" => $resultado->titulo,
                "id_materia" => $resultado->id_materia,
                "categoria" => $resultado->categoria,
                "titulo" => $resultado->titulo,
                "recorte" => $resultado->recorte,
                "autor" => $resultado->autor,
                "conteudo" => $resultado->conteudo,
                "dataPost" => $dataPost,
                "imagem" => $imagem
            );

            // Obter conteudo para ver mais
            $materiasSugestao = $this->buscarMaterias(1);

            return view('/materia', ['materia' => $materia, 'sugestao' => $materiasSugestao]);
        } catch (Exception $e) {
            return __FUNCTION__ . ": " . $e->getMessage();
        }
    }
}
