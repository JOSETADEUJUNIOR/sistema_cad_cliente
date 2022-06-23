<?php

ob_start();

if (isset($_GET['codbarras'])) {
    $codigo = $_GET['codbarras'];
    $nome_pruduto = $_GET['nomeProduto'];
}

?>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid black;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
<h2 style="text-align: center;"><?= $nome_pruduto ?></h2>


<img src="barcode.php?text=<?= $codigo . '&orientation=horizontal&size=50&codetype=Code39&print=true&sizefactor=1' ?>" />

</body>

</html>
<?php
// Require composer autoload
$arquivo = "relProdutoBarras.pdf";

$html = ob_get_clean();
$html = ($html);


require_once '../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new Mpdf\Mpdf();
$mpdf->SetHeader('Emitir Codigo de Barras');
// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output($arquivo, 'I');
