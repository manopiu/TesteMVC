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

//echo '<br>'.$acao;

if($acao == "carregar"){
	echo "Dentro";

	//limpar produtoDTO 
	if(isset($_SESSION['produtos'])){
		unset($_SESSION['produtos']);
	}
	
	//buscar todos os produtos ativos
	$produtoModel = new ProdutoModel();
	$arrayProdutos = $produtoModel->buscarTodosProdutos();
	$_SESSION['produtos'] = serialize($arrayProdutos);
	
	foreach($arrayProdutos as $produtoDTO) {
	   print $produtoDTO->getNome()." sdadgre<br>";
	}
	
	header("location:".URL."/Produto/ProdutoGerencia");
	
}else if($acao == "mudarStatus"){
	echo "<br>mudarStatus<br>";
	
	$produtoID = $_POST["idProduto"];
	
	$statusProduto = $_POST["statusProduto"];
	
	//echo "<br> ProdutoID = ".$produtoID.", status = ".$statusProduto;
	
	
	if($produtoID > 0){
		echo $statusProduto;
		
		$produtoModel = new ProdutoModel();
		
		$produtoModel->mudarStatusProduto($produtoID,$statusProduto);
		
		if(isset($_SESSION['produtos'])){
			unset($_SESSION['produtos']);
		}
		
		$arrayProdutos = $produtoModel->buscarTodosProdutos();
		$_SESSION['produtos'] = serialize($arrayProdutos);
		
		//echo "<br>Taxa = ".$pedidoDTO->getTaxa();
	}
	header("location:".URL."/Produto/ProdutoGerencia");
	
}else if($acao == "carregarProduto"){
	echo "<br>dentro de updateProduto<br>";

	$produtoID = $_POST["idProduto"];
	//instanciar model
	$produtoModel = new ProdutoModel();
	//buscar uma DTO do tipo produto
	$produtoDTO = $produtoModel->buscarProduto($produtoID);
	//Lançar a DTO na sessão
	$_SESSION['produto'] = serialize($produtoDTO);
		
	header("location:".URL."/Produto/alterar");

}else if($acao == "updateProduto"){
	echo "<br>dentro de updateProduto<br>";
	
	
	header("location:".URL."/Produto/ProdutoGerencia");
	
	
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

