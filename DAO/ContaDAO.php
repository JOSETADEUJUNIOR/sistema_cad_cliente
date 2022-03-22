<?php

class ContaDAO{

    public function CadastrarConta($nome,$agencia,$numConta,$saldo){

        if (trim($nome)=='' || trim($agencia)=='' || trim($numConta)=='' || trim($saldo)=='') {
            return 0;
        }


    }
    public function AlterarConta($nome,$agencia,$numConta,$saldo){

        if (trim($nome)=='' || trim($agencia)=='' || trim($numConta)=='' || trim($saldo)=='') {
            return 0;
        }


    }




}


?>