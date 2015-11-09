<?php

echo "Pedido Controller<br>";

require_once '../model/ProdutoModel.php';
require_once '../model/PedidoModel.php';
require_once '../objetos/ProdutoDTO.php';
require_once '../objetos/PedidoDTO.php';
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
	$pedidoDTO->setClienteDTO(unserialize('usuario'));
	$_SESSION['pedido'] = serialize($pedidoDTO);
	
	//foreach($arrayProdutos as $produtoDTO) {
 	//   print $produtoDTO->getNome()." sdadgre<br>";
	//}
	
	
	header("location:".URL."/Pedido/novo");
	
}else if($acao == "adicionarCarrinho"){
	echo "adicionarCarrinho<br>";
	$produtoID = $_POST["produto"];
	$qtd = $_POST["qtd"];
	
	echo $produtoID;
	
	$produtoModel = new ProdutoModel();
	
	//recuperando o pedidoDTO
	$pedidoDTO = unserialize ($_SESSION['pedido']);
	
	/**
	//buscando o produto
	$produtoDTO = $produtoModel->buscarProduto($produtoID);
	//recuperando o array de produtos do pedidoDTO
	$arrayProduto = $pedidoDTO->getArrayProdutos();
	//addicionando produtoDTO ao array
	$arrayProduto[] = ($produtoDTO);
	//setando o novo array ao pedidoDTO
	$pedidoDTO->setArrayProdutos($arrayProduto);
	**/
	
	
	
	if(isset($_SESSION['produtosCarrinho'])){
		$arrayProdutosCarrinho = unserialize ($_SESSION['produtosCarrinho']);
		
	}
	$produtoDTO = $produtoModel->buscarProduto($produtoID);
	$produtoDTO->setQuantidade($qtd);
	
	$arrayProdutosCarrinho[] = ($produtoDTO);
	
	echo "buscou<br>";
	$array = array($pedidoDTO->getArrayProdutos());
	foreach($arrayProdutosCarrinho as $produtoDTO) {
		print $produtoDTO->getNome()." sdadgre<br>";
	}
	
	$_SESSION['pedido'] = serialize($pedidoDTO);
	$_SESSION['produtosCarrinho'] = serialize($arrayProdutosCarrinho);
	
	header("location:".URL."/Pedido/novo");
}

?>

