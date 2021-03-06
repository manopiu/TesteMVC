<?php

echo "Produto Controller<br>";

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

	//limpar produtoDTO 
	if(isset($_SESSION['produtos'])){
		unset($_SESSION['produtos']);
	}
	
	//buscar todos os produtos ativos
	$produtoModel = new ProdutoModel();
	$arrayProdutos = $produtoModel->buscarProdutosAtivos();
	$_SESSION['produtos'] = serialize($arrayProdutos);
	
	foreach($arrayProdutos as $produtoDTO) {
	   print $produtoDTO->getNome()." sdadgre<br>";
	}
	
	header("location:".URL."/Produto/Menu");
	
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
	//receber� o novo array com o item deletado
	$arrayNovo = array();
	
	/*
	 * percorrer o array de produtos do carrinho
	 * quando achar o id do produto cancelado, este
	 * ser� retirado
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
	$total = $_POST["total"];

	//setar valor total
	$pedidoDTO->setValorTotal($total);
	
	$troco = $troco - $total;
	//echo "<br>troco = ".$troco.", Pagamento = ".$formaPagamento."<br>";
	
	//calcular troco
	if($troco > 0 && $formaPagamento == "D"){
		$pedidoDTO->setFormaPagamento("D");
		$pedidoDTO->setTroco($troco);
	}else{
		$pedidoDTO->setFormaPagamento("C");
	}
	
	//instanciar model para persistir o pedido.
	$pedidoModel = new PedidoModel();
	
	$salvo = $pedidoModel->salvarPedido($pedidoDTO);
	
	
	if($salvo){
		echo "salvo = true";
		header("location:".URL."/Pedido/pedidoRealizado");
	}else{
		echo "salvo = flase";
		header("location:".URL."/Pedido/novo");
	}
	
}else if($acao == "meusPedidos"){
	echo "<br>dentro de meusPedidos<br>";
	
	//buscar todos os pedidos ativos
	
	$clienteDTO = new ClienteDTO();
	$clienteDTO = unserialize ($_SESSION['usuario']);
	
	$pedidoModel = new PedidoModel();
	$arrayPedidos = $pedidoModel->recuperarPedidos($clienteDTO->getUsu_id());
		
	//foreach($arrayPedidos as $pedidoDTO) {
	//	echo "<br>".$pedidoDTO->getId()." sdadgre".$pedidoDTO->getValorTotal()."<br>";
		//$pedidoDTO->setArrayProdutos(produtosPedido($pedido2DTO->getId()));
	//}
	
	$_SESSION['pedidos'] = serialize($arrayPedidos);
	
	header("location:".URL."/Pedido/acompanhar");
}

?>

