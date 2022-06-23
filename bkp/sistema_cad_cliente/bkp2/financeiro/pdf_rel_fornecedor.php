<?php	
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
	require_once '../DAO/FornecedorDAO.php';
    $objFornecedor = new FornecedorDAO();
    
    
    if (isset($_GET['btnFiltrar'])) {
       $idForn = $_GET['fornecedor'];

       $fornecedores = $objFornecedor->ResultadoFornecedor($idForn);
 
    }
    if (isset($_GET['btnCnpj'])) {
        $cnpj = $_GET['cnpj'];
        $fornecedores = $objFornecedor->ResultadoFornecedorCnpj($cnpj);
       var_dump($fornecedores);
  
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
    $html .= '<td style="width:110px;text-align:center"><b>CNPJ</b></td>';
	$html .= '<td style="width:250px;text-align:center"><b>NOME</b></td>';
    $html .= '<td style="width:100px;text-align:center"><b>TELEFONE</b></td>';
	$html .= '<td style="width:180px;text-align:center"><b>EMAIL</b></td>';
    $html .= '</tr>';
    $html .= '</thead>';
	
  
    for ($i=0; $i<count($fornecedores) ; $i++) { 
        $html .= '<tbody>';
        $html .= '<tr><td>' .$fornecedores[$i]['cnpj_fornecedor']."</td>";
        $html .= '<td>' .$fornecedores[$i]['nome_fornecedor']."</td>";
		$html .= '<td >' .$fornecedores[$i]['telefone_fornecedor']."</td>";
        $html .= '<td >' .$fornecedores[$i]['email_fornecedor']."</td>";
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
		"relatorio_fornecedores.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>