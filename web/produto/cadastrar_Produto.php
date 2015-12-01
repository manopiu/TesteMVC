<?php

 require_once '/objetos/ClienteDTO.php';
 require_once '/objetos/ProdutoDTO.php';
 
 if(isset($_SESSION['usuario'])){
 	$cliente = unserialize ($_SESSION['usuario']);
 }else{
 	header("location:".URL);
 }
 
?>

<H1>CADASTRAR PRODUTO</H1>


<form action="../../controller/ProdutoGerenciaController.php" method="POST"
			name="cadastrarProduto" id="cadastrarProduto">
    
    <span>NOME:</span><br>
    <input class="campotexto800" type="text" name="nome" id="nome" 
    	value=""> <br>
    
    <span>DESCRIÇÃO:</span><br>
    <input class="campotexto800" type="text" name="descricao" id="descricao" 
    	value=""> <br>
    
    <span>TAMANHO:</span>
    	<span style="width: 80px; font-weight: normal; color: red;">&nbsp;&nbsp;*usar apenas para pizza</span><br>
    <span>
     	<select  class="paddingcinco"  name="tamanho" id="tamanho">
     		<option value="" selected="selected">Selecionar para pizza</option>
     		<option value="P">Pequena</option>
     		<option value="M">M&eacute;dia</option>
     		<option value="G">Grande</option>
     	</select>
     </span>&nbsp;<br>
    
    <span>VALOR:</span><br>
    <input class="" type="text" name="valor" id="valor" 
    	value=""><br>        
    <span>STATUS:</span><br>
    <span>
     	<select  class="paddingcinco"  name="status" id="status">
     		<option value="S" selected="selected">Ativo</option>
     		<option value="N">Inativo</option>
     	</select>
     </span>&nbsp;
    <br>  
  	<input type="hidden" name="acao" id="acao" value="cadastrarProduto">
    <input type="submit" value="Cadastrar" class="botao direita">
</form>