<?php

 require_once '/objetos/ClienteDTO.php';
 require_once '/objetos/ProdutoDTO.php';
 
 if(isset($_SESSION['usuario'])){
 	$cliente = unserialize ($_SESSION['usuario']);
 }else{
 	header("location:".URL);
 }
 
 if(isset($_SESSION['produto'])){
 	$produtosDTO = unserialize ($_SESSION['produto']);
 }

?>
<H1>ALTERAR PRODUTO</H1>


<form action="../controller/ProdutoGerenciaController.php" method="POST"
			name="produtoFrm" id="produtoFrm">
    
    <span>NOME:</span><br>
    <input class="campotexto800" type="text" name="nome" id="nome" 
    	value="<?php print $produtosDTO->getNome(); ?>"> <br>
    
    <span>DESCRIÇÃO:</span><br>
    <input class="campotexto800" type="text" name="descricao" id="descricao" 
    	value="<?php print $produtosDTO->getDescricao(); ?>"> <br>
    
    <span>TAMANHO:</span>
    	<span style="width: 80px; font-weight: normal; color: red;">&nbsp;&nbsp;*usar apenas para pizza</span><br>
    <span>
     	<select  class="paddingcinco"  name="tamanho" id="tamanho">
     		<option value="" selected="selected"
     		></option>
     		<option value="P" 
     			<?php if($produtosDTO->getTamanho() == 'P'){?>selected="selected"<?php }?>
     		>Pequena</option>
     		<option value="M" 
     			<?php if($produtosDTO->getTamanho() == 'M'){?>selected="selected"<?php }?>
     		>M&eacute;dia</option>
     		<option value="G" 
     			<?php if($produtosDTO->getTamanho() == 'G'){?>selected="selected"<?php }?>
     		>Grande</option>
     	</select>
     </span>&nbsp;<br>
    
    <span>VALOR:</span><br>
    <input class="" type="text" name="valor" id="valor" 
    	value="<?php print $produtosDTO->getCusto(); ?>"><br>        
    <span>STATUS:</span><br>
    <span>
     	<select  class="paddingcinco"  name="status" id="status">
     		<option value="S" 
     			<?php if($produtosDTO->getStatus() == 'S'){?>selected="selected"<?php }?>
     		>Ativo</option>
     		<option value="N" 
     			<?php if($produtosDTO->getStatus() == 'N'){?>selected="selected"<?php }?>
     		>Inativo</option>
     	</select>
     </span>&nbsp;
    <br>  
  
    <br>
    <input type="hidden" name="idProduto" id="idProduto" value="<?php print $produtosDTO->getId();?>"> 
    <input type="hidden" name="acao" id="acao" value="updateProduto">
    <input type="submit" value="Alterar" class="botao direita">
</form>