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
    $valorTotVenda = $objVenda->ValorTotVenda($idVenda);


    $html .= '<head>';
    $html .= '<style>';
    $html .= 'p{color:black;font-size:8px}
              td{font-size:8px} 
              .linha{
                  margim-top:1px;
              }
              span{font-size:8px; text-aligh:right} ';
    $html .= '</style>';

    $html .= '</head>';
    $html .= '<p class="linha" id="linha">-----------------------------------------------------------------------------------</p>';
   
    $html .= '<p>Cupom não fiscal</p>';
    $html .= '<p style="float: right"> Cliente: ' .(@$dadosVenda[0]['nome_cliente'] == '' ? '' : $dadosVenda[0]['nome_cliente']).'</p> </br>';
    $html .= '<p style="float: right"> Data da Venda: ' .UtilDAO::ExibirDataBr((@$dadosVenda[0]['data_venda'] == '' ? '' : $dadosVenda[0]['data_venda'])).'</p>';
    $html .= '<br>';
    $html .= '<p>-----------------------------------------------------------------------------------</p>';
    
    
    $html .= '<table> ';
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<td style="width:30px"><b>COD</b></td>';
	$html .= '<td style="width:80px"><b>PRODUTO</b></td>';
    $html .= '<td style="width:20px"><b>QTD</b></td>';
    $html .= '<td style="width:30px"><b>Desconto</b></td>';
    $html .= '<td style="width:90px"><b>VALOR</b></td>';
    $html .= '</tr>';
    $html .= '</thead>';
	
  
    for ($i=0; $i<count($vendas) ; $i++) { 
        $html .= '<tbody>';
        $html .= '<tr><td>' .$vendas[$i]['cod_produto']."</td>";
		$html .= '<td >' .$vendas[$i]['nome_produto']."</td>";
        $html .= '<td >' .$vendas[$i]['qtd_produto']."</td>";
        $html .= '<td >' .explode('.',$vendas[$i]['desconto'])[0].','.explode('.',$vendas[$i]['desconto'])[1]."</td>";
        $html .= '<td >' .explode('.',$vendas[$i]['item_valor'])[0].','.explode('.',$vendas[$i]['item_valor'])[1]."</td>";
        $html .= '</tbody>';
        $html .= '</hr>';
    }
    
    
    $html .= '<p>------------------------------------------------------------------------------------</p>';
    $html .= '<p style="text-align: right"> Valor Total: R$ ' .explode('.',$valorTotVenda[0]['valorTotal'])[0].','.explode('.',$valorTotVenda[0]['valorTotal'])[1].'</p>';
    //tb_venda.id_venda as id_venda, data_venda, nome_cliente, nome_produto, item_valor

	$html .= '</table>';
	$html .= '<p style="font-size: 7px;"> *Este produto tem garantia de 30 dias após a data de compra</p>';
    
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
    $dompdf->setPaper([2,-10,220,400]);
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_venda.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>