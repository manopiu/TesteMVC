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
    <input class="campotexto800" type="text" name="nome" 
    	value="<?php print $produtosDTO->getNome(); ?>"> <br>
    
    <span>DESCRIÇÃO:</span><br>
    <input class="campotexto800" type="text" name="nome" 
    	value="<?php print $produtosDTO->getDescricao(); ?>"> <br>
    
    <span>TAMANHO:</span><br>
    <input class="campotexto800" type="text" name="nome" 
    	value="<?php print $produtosDTO->getTamanho(); ?>"> <br>
    
    <span>VALOR:</span><br>
    <input class="" type="text" name="telefone" 
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
    <input type="hidden" name="acao" id="acao" value="updateProduto">
    <input type="submit" value="Alterar" class="botao direita">
</form>