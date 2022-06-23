<?php



if (isset($_POST['cep'])) {
    $cep = trim($_POST['cep']);
    if ($cep =='') {
        
       


    }else{

        $url = "https://viacep.com.br/ws/{$cep}/json/";
        
        $address = json_decode(file_get_contents($url));
    }
    
    
}


?>