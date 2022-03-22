<?php

class UtilDAO{

    public static function CodigoLogado()
    {
        return 1; // estamos inserindo fixo o ID
    }

    public static function DataAtual(){
        return date('Y-m-d');
    }

    public static function CodigoEmpresa()
    {
        return 1;// codigo da empresa statico
    }


    public static function ExibirDataBr($data){

        if ($data == "") {
            return "";
        }
        else{
        $data_array = explode('-', $data);

        $data_br = $data_array[2]. '/' . $data_array[1] . '/' . $data_array[0];
        
        return $data_br;
    }
    }


}