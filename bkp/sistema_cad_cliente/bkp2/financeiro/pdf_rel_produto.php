<?php	
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
	require_once '../DAO/ProdutoDAO.php';
    $objProduto = new ProdutoDAO();
    
    if (isset($_GET['btnFiltrar'])) {
       $produto = $_GET['produto'];

       $produtos = $objProduto->ResultadoProduto($produto);
 
    }
    if (isset($_GET['btnEstoque'])) {
        
        $produtos = $objProduto->ResultadoProdutoEstoque();

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
    $html .= '<td style="width:100px;text-align:center"><b>COD</b></td>';
    $html .= '<td style="width:60px;text-align:center"><b>CATEGORIA</b></td>';
    $html .= '<td style="width:300px;text-align:center"><b>NOME</b></td>';
    $html .= '<td style="width:30px;text-align:center"><b>ESTOQUE</b></td>';
	$html .= '<td style="width:50px;text-align:center"><b>CUSTO</b></td>';
    $html .= '<td style="width:80px;text-align:center"><b>VALOR VENDA</b></td>';
    $html .= '</tr>';
    $html .= '</thead>';
	
  
    for ($i=0; $i<count($produtos) ; $i++) { 
        $html .= '<tbody>';
        $html .= '<tr><td>' .$produtos[$i]['cod_produto']."</td>";
        $html .= '<td>' .$produtos[$i]['nome_categoria']."</td>";
		$html .= '<td >' .$produtos[$i]['nome_produto']."</td>";
        $html .= '<td >' .$produtos[$i]['estoque']."</td>";
        $html .= '<td >' .$produtos[$i]['custo']."</td>";
        $html .= '<td >' .explode('.',$produtos[$i]['valor_produto'])[0].',00'."</td>";
        
      
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