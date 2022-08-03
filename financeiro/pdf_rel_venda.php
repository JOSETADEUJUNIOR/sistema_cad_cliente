<?php	
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
	require_once '../DAO/VendaDAO.php';
    require_once '../DAO/PrincipalDAO.php';
    $empresa = new PrincipalDAO();
    $getEmpresa = $empresa->GetEmpresa();
    $objVenda = new VendaDAO();
    
    if (isset($_GET['btnFiltrar'])) {
       $dtInicial = $_GET['dtInicial'] ;
       $dtFinal = $_GET['dtFinal'];
       $cliente = $_GET['cliente'];

       $vendas = $objVenda->ResultadoVendaDt($dtInicial, $dtFinal, $cliente);
       
    }

    if (isset($_GET['btnVendaHoje'])) {
        
        $vendas = $objVenda->ResultadoVendaDia();
    }
    for ($i=0; $i<count($vendas) ; $i++) { 
        $total = $total + $vendas[$i]['item_valor_fim'];

    }
    $valorTotal = explode('.',$total);

    $html .= '<head>';
    $html .= '<style>';
    $html .= 'p{color:black;font-size:16px}
              td{font-size:14px} 
              .linha{
                  margim-top:1px;
              }
              span{font-size:12px; text-aligh:right}
              table, th, td{border: 1px solid black; border-collapse: collapse } ';
    $html .= '</style>';
    $html .= '</head>';
    $html .= '<table> ';
	$html .= '<thead>';
	$html .= '<tr>';
    $html .= '<td style="width:20px;text-align:center"><b>ID</b></td>';
    $html .= '<td style="width:50px;text-align:center"><b>Dt Venda</b></td>';
	$html .= '<td style="width:80px;text-align:center"><b>COD</b></td>';
    $html .= '<td style="width:200px;text-align:center"><b>CLIENTE</b></td>';
	$html .= '<td style="width:180px;text-align:center"><b>PRODUTO</b></td>';
    $html .= '<td style="width:30px;text-align:center"><b>QTD</b></td>';
    $html .= '<td style="width:50px;text-align:center"><b>DESC</b></td>';
    $html .= '<td style="width:50px;text-align:center"><b>VALOR</b></td>';
    $html .= '</tr>';
    $html .= '</thead>';
	
  
    for ($i=0; $i<count($vendas) ; $i++) { 
        $html .= '<tbody>';
        $html .= '<tr><td>' .$vendas[$i]['id_venda']."</td>";
        $html .= '<td>' .UtilDao::ExibirDataBr($vendas[$i]['data_venda'])."</td>";
        $html .= '<td>' .$vendas[$i]['cod_produto']."</td>";
		$html .= '<td >' .$vendas[$i]['nome_cliente']."</td>";
        $html .= '<td >' .$vendas[$i]['nome_produto']."</td>";
        $html .= '<td >' .$vendas[$i]['qtd_produto']."</td>";
        $html .= '<td >' .explode('.',$vendas[$i]['desconto'])[0].','.explode('.',$vendas[$i]['desconto'])[1]."</td>";
        $html .= '<td >' .explode('.',$vendas[$i]['item_valor_fim'])[0].','.explode('.',$vendas[$i]['item_valor_fim'])[1]."</td>";
        $html .= '</tbody>';
        $html .= '</hr>';
    }
    
    
    $html .= '<div class="col-md-6">';
    $html .= '<p style="text-align: right"> <strong>Valor Total:</strong> '.$valorTotal[0].','.($valorTotal[1]!=''?$valorTotal[1]:'00').'</p>';
    $html .= '</div>';
    $html .= '<div class="col-md-6">';
    $html .= '<p style="text-align: left"> <strong>Data do Relatório:</strong> '.UtilDAO::ExibirDataBr(date('Y-m-d')).'</p>';
    $html .= '</div>';
    //tb_venda.id_venda as id_venda, data_venda, nome_cliente, nome_produto, item_valor

	$html .= '</table>';
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;
	// include autoloader
	require_once("dompdf/autoload.inc.php");
	//Criando a Instancia
	$dompdf = new DOMPDF();
	// Carrega seu HTML
    $emp = $getEmpresa[0]['nome_empresa'];
	$dompdf->load_html('
			<h3 style="text-align: center;">'.$emp.'</h3>
			'.$html .'
		');

	//Renderizar o html
    $dompdf->setPaper('A4');
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_venda.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>