<?php	
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
	require_once '../DAO/ClienteDAO.php';
    $objCliente = new ClienteDAO();
    
    if (isset($_GET['btnFiltrar'])) {
       $cliente = $_GET['cliente'];

       $clientes = $objCliente->ResultadoCliente($cliente);
 
    }
    if (isset($_GET['btnCpf'])) {
        $cpf = $_GET['cpf'];
 
        $clientes = $objCliente->ResultadoClienteCpf($cpf);
  
     }
    
    $html .= '<head>';
    $html .= '<style>';
    $html .= 'p{color:black;font-size:16px}
              td{font-size:14px} 
              .linha{
                  margim-top:1px;
              }
              span{font-size:18px; text-aligh:right}
              table, th, td{border: 1px solid black; border-collapse: collapse } ';
    $html .= '</style>';
    $html .= '</head>';
    $html .= '<table> ';
	$html .= '<thead>';
	$html .= '<tr>';
    $html .= '<td style="width:90px;text-align:center"><b>CPF</b></td>';
	$html .= '<td style="width:180px;text-align:center"><b>NOME</b></td>';
    $html .= '<td style="width:180px;text-align:center"><b>RUA</b></td>';
	$html .= '<td style="width:180px;text-align:center"><b>BAIRRO</b></td>';
    $html .= '<td style="width:50px;text-align:center"><b>DT NASC</b></td>';
    $html .= '</tr>';
    $html .= '</thead>';
	
  
    for ($i=0; $i<count($clientes) ; $i++) { 
        $html .= '<tbody>';
        $html .= '<tr><td>' .$clientes[$i]['cpf_cliente']."</td>";
        $html .= '<td>' .$clientes[$i]['nome_cliente']."</td>";
		$html .= '<td >' .$clientes[$i]['rua_cliente']."</td>";
        $html .= '<td >' .$clientes[$i]['bairro_cliente']."</td>";
        $html .= '<td >' .UtilDAO::ExibirDataBr($clientes[$i]['data_nascimento'])."</td>";
      
        $html .= '</tbody>';
        $html .= '</hr>';
    }
    
    //tb_venda.id_venda as id_venda, data_venda, nome_cliente, nome_produto, item_valor

	$html .= '</table>';
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;
	// include autoloader
	require_once("dompdf/autoload.inc.php");
	//Criando a Instancia
	$dompdf = new DOMPDF();
	// Carrega seu HTML
	$dompdf->load_html('
			<h3 style="text-align: center;">RondonCell</h3>
			'.$html .'
		');

	//Renderizar o html
    $dompdf->setPaper('A4');
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_clientes.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>