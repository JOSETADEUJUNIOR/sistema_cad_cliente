<?php	
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
	require_once '../DAO/FornecedorDAO.php';

	$html .= '<table border=1';
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<td style="width:60px"><b>CNPJ</b></td>';
	$html .= '<td style="width:80px"><b>NOME</b></td>';
	$html .= '<td style="width:60px"><b>TELEFONE</b></td>';
	$html .= '</tr>';
	$html .= '</thead>';
	
	$objForn = new FornecedorDAO();
	$fornecedores = $objForn->ConsultarFornecedor();

	for ($i=0; $i<count($fornecedores) ; $i++) { 
		
		$html .= '<tbody>';
		$html .= '<tr><td>' .$fornecedores[$i]['cnpj_fornecedor']."</td>";
		$html .= '<td >' .$fornecedores[$i]['nome_fornecedor']."</td>";
		$html .= '<td >' .$fornecedores[$i]['telefone_fornecedor']."</td>";
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
		"relatorio_Fornecedor.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>