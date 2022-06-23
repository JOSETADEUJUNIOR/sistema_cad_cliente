<?php	
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
	require_once '../DAO/SubCategoriaDAO.php';

	$html .= '<table border=1';
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<td style="width:50px"><b>ID</b></td>';
	$html .= '<td style="width:600px"><b>Nome SUBCATEGORIAS</b></td>';
	$html .= '</tr>';
	$html .= '</thead>';
	




	$objSub = new SubCategoriaDAO();

	$subCat = $objSub->ConsultarSubCategoria();

	for ($i=0; $i<count($subCat) ; $i++) { 
		
		$html .= '<tbody>';
		$html .= '<tr><td>' .$subCat[$i]['id_subCategoria']."</td>";
		$html .= '<td >' .$subCat[$i]['nome_subcategoria']."</td>";
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
		"relatorio_SubCat.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>