<?php	
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
	require_once '../DAO/ProdutoDAO.php';

	$html .= '<table border=1';
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<td style="width:50px"><b>COD</b></td>';
	$html .= '<td style="width:90px"><b>PRODUTO</b></td>';
    $html .= '<td style="width:90px"><b>ESTOQUE</b></td>';
    $html .= '<td style="width:90px"><b>VALOR</b></td>';
    $html .= '<td style="width:90px"><b>CATEGORIA</b></td></br>';
	$html .= '</tr>';
    $html .= '</thead>';
	
	$objProd = new ProdutoDAO();
    $produtos = $objProd->ConsultarProduto();
    for ($i=0; $i<count($produtos) ; $i++) { 
		$html .= '<tbody>';
		$html .= '<tr><td>' .$produtos[$i]['cod_produto']."</td>";
		$html .= '<td >' .$produtos[$i]['nome_produto']."</td>";
        $html .= '<td >' .$produtos[$i]['estoque']."</td>";
        $html .= '<td >' .$produtos[$i]['valor_produto']."</td>";
        $html .= '<td >' .$produtos[$i]['nome_categoria']."</td></br>";
        $html .= '</tbody>';
    }

	$html .= '</table>';
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;
	// include autoloader
	require_once("dompdf/autoload.inc.php");
	//Criando a Instancia
	$dompdf = new DOMPDF();
	// Carrega seu HTML
	$dompdf->load_html('
			<h1 style="text-align: center;">SYS VENDAS - Gerar PDF</h1>
			'.$html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_produtos.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>