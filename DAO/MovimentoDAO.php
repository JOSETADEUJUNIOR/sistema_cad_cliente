<?php

class  MovimentoDAO{

    public function CadastrarMovimento($tipo,$data,$valor,$categoria,$empresa,$conta,$obs){


        if (trim($tipo)=='' || trim($data)=='' || trim($valor)=='' ||
            trim($categoria)=='' || trim($empresa)=='' || trim($conta)==''){
          
                return 0;
        }

    }


}



?>