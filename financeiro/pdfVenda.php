<?php	
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
	require_once '../DAO/VendaDAO.php';
    if (isset($_GET['idVenda'])) {
        $idVenda = $_GET['idVenda']; 
    }
    $objVenda = new VendaDAO();
    $vendas = $objVenda->ResultadoVenda($idVenda);
    $dadosVenda = $objVenda->DetalhesVenda($idVenda);


    $html .= '<head>';
    $html .= '<style>';
    $html .= 'p{color:black;}
              td{font-size:14px}  ';
    $html .= '</style>';

    $html .= '</head>';

    $html .= '<p>Cupom fiscal</p>';
    $html .= '<p style="float: right"> Data da Venda: ' .UtilDAO::ExibirDataBr((@$dadosVenda[0]['data_venda'] == '' ? '' : $dadosVenda[0]['data_venda'])).'</p>';
    $html .= '<p>-----------------------------------------------------------------------------------</p>';
    
    
    $html .= '<table> ';
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<td style="width:100px"><b>COD</b></td>';
	$html .= '<td style="width:220px"><b>PRODUTO</b></td>';
    $html .= '<td style="width:50px"><b>QTD</b></td>';
    $html .= '<td style="width:90px"><b>VALOR</b></td>';
    $html .= '</tr>';
    $html .= '</thead>';
	
  
    for ($i=0; $i<count($vendas) ; $i++) { 
        $html .= '<tbody>';
        $html .= '<tr><td>' .$vendas[$i]['cod_produto']."</td>";
		$html .= '<td >' .$vendas[$i]['nome_produto']."</td>";
        $html .= '<td >' .$vendas[$i]['qtd_produto']."</td>";
        $html .= '<td >' .explode('.',$vendas[$i]['item_valor'])[0].',00'."</td>";
        $html .= '</tbody>';
        $html .= '</hr>';
    }
    
    $html .= '<h3>Valor Total: 1200,00</h3>';
    $html .= '<h3>---------------------------------------</h3>';

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
			<h4 style="text-align: center;">RondonCell</h4>
			'.$html .'
		');

	//Renderizar o html
    $dompdf->setPaper([0,0,400,600]);
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_produtos.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>