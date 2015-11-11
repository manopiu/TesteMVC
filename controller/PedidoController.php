<?php

echo "Pedido Controller<br>";

require_once '../model/ProdutoModel.php';
require_once '../model/PedidoModel.php';
require_once '../objetos/ProdutoDTO.php';
require_once '../objetos/PedidoDTO.php';
require_once '../objetos/ClienteDTO.php';
require_once '../config/includes/config.php';


//zerar alerta
if(isset($_SESSION['alerta'])){
	unset($_SESSION['alerta']);
}

if($_POST != null){
	$acao = $_POST["acao"];
}elseif($_GET != null){
	$acao = $_GET["acao"];
}

echo '<br>'.$acao;

if($acao == "carregar"){
	echo "Dentro";
	
	if(isset($_SESSION['produtosCarrinho'])){
		unset($_SESSION['produtosCarrinho']);
	}
	if(isset($_SESSION['taxaEntrega'])){
		unset($_SESSION['taxaEntrega']);
	}
	//limpar produtoDTO 
	if(isset($_SESSION['produtos'])){
		unset($_SESSION['produtos']);
	}
	//buscar todos os produtos ativos
	$produtoModel = new ProdutoModel();
	$arrayProdutos = $produtoModel->buscarProdutosAtivos();
	$_SESSION['produtos'] = serialize($arrayProdutos);
	
	//buscar a taxa de entrega vigente
	$pedidoModel = new PedidoModel();
	$taxa = $pedidoModel->buscarTaxaVigente();
	
	//criar um produtoDTO novo
	$pedidoDTO = new PedidoDTO();
	$pedidoDTO->setTaxa($taxa);
	echo "<br>Taxa = ".$pedidoDTO->getTaxa();
	
	$clienteDTO = new ClienteDTO();
	$clienteDTO = unserialize ($_SESSION['usuario']);
	
	//echo "<br>".$clienteDTO->getNome()."<br>";
	$pedidoDTO->setClienteDTO($clienteDTO);
	//echo "<br>Taxa = ".$pedidoDTO->getTaxa();
	$_SESSION['pedido'] = serialize($pedidoDTO);
	
	//foreach($arrayProdutos as $produtoDTO) {
 	//   print $produtoDTO->getNome()." sdadgre<br>";
	//}
	
	
	header("location:".URL."/Pedido/novo");
	
}else if($acao == "adicionarCarrinho"){
	echo "adicionarCarrinho<br>";
	$produtoID = $_POST["produto"];
	
	if($produtoID > 0){
		$qtd = $_POST["qtd"];
		
		echo $produtoID;
		
		$produtoModel = new ProdutoModel();
		
		if(isset($_SESSION['produtosCarrinho'])){
			$arrayProdutosCarrinho = unserialize ($_SESSION['produtosCarrinho']);
			
		}
		$produtoDTO = $produtoModel->buscarProduto($produtoID);
		$produtoDTO->setQuantidade($qtd);
		
		$arrayProdutosCarrinho[] = ($produtoDTO);
		
		echo "buscou<br>";
		//$array = array($pedidoDTO->getArrayProdutos());
		//foreach($arrayProdutosCarrinho as $produtoDTO) {
			//print $produtoDTO->getNome()." sdadgre".$produtoDTO->getId()."<br>";
		//}
		
		//$_SESSION['pedido'] = serialize($pedidoDTO);
		$_SESSION['produtosCarrinho'] = serialize($arrayProdutosCarrinho);
		
		//echo "<br>Taxa = ".$pedidoDTO->getTaxa();
	}
	header("location:".URL."/Pedido/novo");
	
}else if($acao == "cancelarProduto"){
	echo "<br>dentro de cancelarProduto<br>";

	$produtoCanceladoId = $_POST["idProduto"];
	$qtdProduto = $_POST["qtdProduto"];
	
	//recuperando o carrinho de produtos
	if(isset($_SESSION['produtosCarrinho'])){
		$arrayProdutosCarrinho = unserialize ($_SESSION['produtosCarrinho']);
	}
	//receberá o novo array com o item deletado
	$arrayNovo = array();
	
	/*
	 * percorrer o array de produtos do carrinho
	 * quando achar o id do produto cancelado, este
	 * será retirado
	 */
	foreach($arrayProdutosCarrinho as $produtoDTO) {
		//echo "produto - ".$produtoDTO->getId()."<br>";
		if($produtoDTO->getId() == $produtoCanceladoId &&
				$produtoDTO->getQuantidade() == $qtdProduto){
			//echo "produto deletado - ".$produtoDTO->getId()."<br>";
		}else{
			array_push($arrayNovo, $produtoDTO);
		}
		
		$arrayProdutosCarrinho = $arrayNovo;
	}
	
	echo "<br>Fora do foreach<br>";
	
	$_SESSION['produtosCarrinho'] = serialize($arrayProdutosCarrinho);
	
	header("location:".URL."/Pedido/novo");

}else if($acao == "fecharPedido"){
	echo "<br>dentro de fecharPedido<br>";
	
	//recuperando o pedidoDTO
	if(isset($_SESSION['pedido'])){
			$pedidoDTO = unserialize ($_SESSION['pedido']);
	}
	
	//recuperando o carrinho de produtos
	if(isset($_SESSION['produtosCarrinho'])){
		$arrayProdutosCarrinho = unserialize ($_SESSION['produtosCarrinho']);
	}
	
	$pedidoDTO->setArrayProdutos($arrayProdutosCarrinho);
	
	//pegando forma de pagamento e valor para troco.
	$formaPagamento = $_POST["pagamento"];
	$troco = $_POST["troco"];
	
	//calcular troco
	if($troco > 0 && $formaPagamento == "dinheiro"){
		$pedidoDTO->setFormaPagamento("D");
		//$troco =
	}
	
}

?>

