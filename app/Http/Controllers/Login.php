<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Login as LoginModel;
use App\Http\Controllers\Factory;
use App\Http\Controllers\News;

class Login
{

    /**
     * Consultar Login e Senha no BD para validar a permissao de acesso.
     */
    public function validarAcesso(Request $request)
    {
        $login = $request->input('login');
        $senha = md5($request->input('senha'));

        try{
            $resultado = LoginModel::all()->where('login', $login)->where('senha', $senha);

            if(count($resultado) == 1) {
                Session::put('login', $login); // Cria sessao
                if(Session::has('login')){
                    return redirect('/news');
                }
            }

            return redirect('/login');

        } catch(Exception $e){
            return __FUNCTION__ . ": " . $e->getMessage();
        }
    }


    /**
     * Criar Login (Acesso) para o usuario
     */
    public function criarAcesso(Request $request)
    {
        $login = $request->input('email');
        $senha = $request->input('senha');
        $tms_cadastro = Factory::dataAgora();

        if(in_array(null, [$login, $senha])) return view('index');

        try{
            $objLogin = new LoginModel();

            $objLogin->login = $login;
            $objLogin->senha = md5($senha);
            $objLogin->tms_cadastro = $tms_cadastro;

            $objNews = new News();
            $materias = $objNews->buscarMaterias();

            if($objLogin->save()){
                Session::put('login', $login);
                return view('/home', ['materias' => $materias, 'total' => count($materias)]);
            }

            return redirect('/index');

        } catch(Exception $e){
            return __FUNCTION__ . ": " . $e->getCode();
        }
    }


    /**
     * Validar sessao
     */
    public function validarSessao()
    {
        if(!Session::has('login')){
            $this->encerrarSessao();
        }
    }


    /**
     * Encerrar sessao do usuario
     */
    public function encerrarSessao()
    {
        try{
            Session::flush();
    
            return redirect('/');
        } catch(Exception $e) {
            dd($e);
        }
    }
}

