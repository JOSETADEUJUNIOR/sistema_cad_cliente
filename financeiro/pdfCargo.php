<?php	
	require_once '../DAO/CargoDAO.php';

	$html .= '<table border=1';
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<td style="width:50px"><b>ID</b></td>';
	$html .= '<td style="width:180px"><b>Nome Cargo</b></td>';
	$html .= '<td style="width:400px"><b>Descrição do Cargo</b></td>';
	$html .= '</tr>';
	$html .= '</thead>';
	




	$objCargo = new CargoDAO();

	$cargos = $objCargo->ConsultarCargo();

	for ($i=0; $i<count($cargos) ; $i++) { 
		
		$html .= '<tbody>';
		$html .= '<tr><td>' .$cargos[$i]['id_cargo']."</td>";
		$html .= '<td >' .$cargos[$i]['nome_cargo']."</td>";
		$html .= '<td >' .$cargos[$i]['descricao_cargo']."</td></tr>";
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
			<h1 style="text-align: center;">Sistema de Clientes - Gerar PDF</h1>
			'.$html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_Cargos.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>