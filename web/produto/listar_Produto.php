<?php

 require_once '/objetos/ClienteDTO.php';
 require_once '/objetos/ProdutoDTO.php';
 
 if(isset($_SESSION['usuario'])){
 	$cliente = unserialize ($_SESSION['usuario']);
 }else{
 	header("location:".URL);
 }
 
 //receber o array de produtos
 if(isset($_SESSION['produtos'])){
 	$arrayProdutos = unserialize ($_SESSION['produtos']);
 }
 
 
 ?>
 <script>

function mudarStatusProduto(idProduto,status){
			
	document.getElementById("acao").value = "mudarStatus";
	document.getElementById("idProduto").value = idProduto;
	document.getElementById("statusProduto").value = status;
	//window.alert("dentro: " + document.getElementById("idProduto").value
	//		+ " - " + document.getElementById("statusProduto").value);
	document.getElementById("produto").submit();
}

function updateProduto(idProduto){
	document.getElementById("acao").value = "carregarProduto";
	document.getElementById("idProduto").value = idProduto;
	document.getElementById("produto").submit();
}

</script>
			
<a href="<?php echo URL.'';?>" class="botao">Home</a>
<a href="<?php echo URL.'/Produto/cadastrar/';?>" class="botao">Novo Produto</a>
<br><br>

<form action="../controller/ProdutoGerenciaController.php" method="POST"
			name="produto" id="produto">
			
	<table class="ui-widget ui-widget-content ui-corner-all padding Tcentro">
	  <tr>
	    <th  style="width: 600px;" class="ui-widget-header padding" >NOME</th>
	    <th  style="width: 600px;" class="ui-widget-header padding" >DESCRIÇÃO</th>
	    <th class="ui-widget-header padding" >TAMANHO</th>
	    <th class="ui-widget-header padding" >CUSTO</th>
	    <th class="ui-widget-header padding" >SITUAÇÃO</th>
	    <th class="ui-widget-header padding" >AÇÃO</th>
	  </tr>
	<?php 
	  		foreach ($arrayProdutos as $produto){
	?>
	  <tr>
	    <td align="left" style="width: 150px; font-weight: normal"><?php print $produto->getNome();?></td>
	    <td style="width: 150px; font-weight: normal"><?php print $produto->getDescricao();?></td>
	    <td style="width: 150px; font-weight: normal"><?php print $produto->getTamanho();?></td>
	    <td style="width: 150px; font-weight: normal">R$ <?php print $produto->getCusto();?></td>
	    <td style="width: 150px; font-weight: normal"><?php 
	    		if($produto->getStatus() == 'S'){
	    			print "Ativo";
	    		}else{
	    			print "Inativo";
	    		}
	    	?>
	    </td>
	    <td style="width: 150px; font-weight: normal">  
	        <a href="#" class="editar"
	        	onclick="updateProduto('<?php print $produto->getId();?>');">
	        	Editar 	
	        </a>
	        <a href="#" class="excluir"
	        	onclick="mudarStatusProduto('<?php print $produto->getId();?>','<?php print $produto->getStatus();?>');"
	        	>Alterar Situa&ccedil;&atilde;o
	        </a>        
	    </td>
	  </tr>  
	  
 	 <?php }?>  
	</table>
    <input type="hidden" name="acao" id="acao" value="">
    <input type="hidden" name="idProduto" id="idProduto" value="">
    <input type="hidden" name="statusProduto" id="statusProduto" value="">
    
</form>
