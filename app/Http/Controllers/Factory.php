<?php

namespace App\Http\Controllers;

use DateTime;

class Factory
{

    /**
     * Retorna a data no atual momento em que usar o metodo
     */
    public static function dataAgora($padrao = "EUA")
    {
        if($padrao == "EUA") return date('Y-m-d H:i:s');
        else return date('d-m-Y H:i:s');
    }

    /**
     * Retorna uma imagem padrao conforme a categoria
     */
    public static function imagem($padrao = "Brasil e Mundo")
    {
        switch($padrao){
            case "Política":
                return "politica.png";
                break;
            case "Lazer e Cultura":
                return "lazer.png";
                break;
            case "Cotidiano":
                return "cotidiano.png";
                break;
            case "Economia":
                return "economia.png";
                break;
            case "Entretenimento":
                return "entretenimento.png";
                break;
            default:
                return "mundo.png";
        }
    }

    /**
     * Retorna a data com aparencia amigavel
     * 
     * Dia(int) mes(abreviado em 3 letras) ano hora[h]minuto
     */
    public static function dataAmigavel($data)
    {
        $data = new DateTime($data);

        // define dia mes ano
        $novaData = $data->format('d') . " " . strtolower($data->format("M")) . " " . $data->format("Y");
        // define hora minuto
        $novaData .= " " . $data->format("H") . "h" . $data->format("i");

        return $novaData;
    }
}

