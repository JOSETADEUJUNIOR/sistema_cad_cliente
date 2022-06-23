<?php
require_once './DAO/UtilDAO.php';
UtilDAO::VerLogado();
use Dompdf\Dompdf;
// Incluindo o autoload do DOM PDF
require_once __DIR__."/dompdf/autoload.inc.php";

//Criando a instancia do Dom PDF.
//Criando o namespace para evitar erros




// Instanciando a classe do Dom DPF
$dompdf = new Dompdf();

$html .= require __DIR__."/assets/arquivo.html";


//Criando o código HTML que será transformado em pdf
$dompdf->loadHtml($html);


//Define o tipo de papel de impressão (opcional)
//tamanho (A4, A3, A2, etc)
//oritenação do papel:'portrait' (em pé) ou 'landscape' (deitado)
$dompdf->setPaper('A4', 'landscape');

// Vai renderizar o HTML como PDF
$dompdf->render();

// Saída do pdf para a renderização do navegador.
//Coloca o nome que deseja que seja renderizado.

$dompdf->stream("relatorio.pdf", ["Attachment" => false]); 

?>

