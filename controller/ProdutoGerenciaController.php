<?php

echo "Produto Controller<br>";

require_once '../model/ProdutoModel.php';
require_once '../objetos/ProdutoDTO.php';
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
	
	//recuperando os dados
	$produtoID = $_POST["idProduto"];
	$nome = $_POST["nome"];
	$descricao = $_POST["descricao"];
	$tamanho = $_POST["tamanho"];
	$custo = $_POST["valor"];
	$status = $_POST["status"];
	
	//Carregar DTO do tipo produto
	$produtoDTO = new ProdutoDTO();
	
	$produtoDTO->setId($produtoID);
	$produtoDTO->setNome($nome);
	$produtoDTO->setDescricao($descricao);
	$produtoDTO->setTamanho($tamanho);
	str_replace(",",".",$produtoDTO->setCusto($custo));
	$produtoDTO->setStatus($status);
	
	//instanciar model
	$produtoModel = new ProdutoModel();
	$produtoModel->atualizarProduto($produtoDTO);
	
	//carregar produtos e voltar pra pagina de gerenciamento
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
	
	
}else if($acao == "cadastrarProduto"){
	echo "<br>dentro de cadastrarProduto<br>";
	
	//recuperando os dados
	$produtoID = $_POST["idProduto"];
	$nome = $_POST["nome"];
	$descricao = $_POST["descricao"];
	$tamanho = $_POST["tamanho"];
	$custo = $_POST["valor"];
	$status = $_POST["status"];
	
	//Carregar DTO do tipo produto
	$produtoDTO = new ProdutoDTO();
	
	$produtoDTO->setId($produtoID);
	$produtoDTO->setNome($nome);
	$produtoDTO->setDescricao($descricao);
	$produtoDTO->setTamanho($tamanho);
	$produtoDTO->setCusto(str_replace(",",".",$custo));
	$produtoDTO->setStatus($status);
	
	//instanciar model
	$produtoModel = new ProdutoModel();
	$produtoModel->cadastrarProduto($produtoDTO);
	
	//carregar produtos e voltar pra pagina de gerenciamento
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
	
}

?>

