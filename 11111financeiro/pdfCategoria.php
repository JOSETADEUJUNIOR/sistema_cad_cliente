<?php	
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
	require_once '../DAO/CategoriaDAO.php';

	$html .= '<table border=1';
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<td style="width:50px"><b>ID</b></td>';
	$html .= '<td style="width:600px"><b>Nome Categoria</b></td>';
	$html .= '</tr>';
	$html .= '</thead>';
	
	$objCat = new CategoriaDAO();
    $categorias = $objCat->ConsultarCategoria();
    for ($i=0; $i<count($categorias) ; $i++) { 
		$html .= '<tbody>';
		$html .= '<tr><td>' .$categorias[$i]['id_categoria']."</td>";
		$html .= '<td >' .$categorias[$i]['nome_categoria']."</td>";
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
		"relatorio_Categorias.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>