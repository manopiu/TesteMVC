<?php

 require_once '/objetos/ClienteDTO.php';
 require_once '/objetos/EmpresaDTO.php';
 
 if(isset($_SESSION['usuario'])){
 	$cliente = unserialize ($_SESSION['usuario']);
 }else{
 	header("location:".URL);
 }
 
 //receber o array de produtos
 if(isset($_SESSION['empresas'])){
 	$arrayProdutos = unserialize ($_SESSION['empresas']);
 }
 
 
 ?>


<script>
function teste(){
	alert('oi');
}
</script>

<form action="../controller/EmpresaController.php" method="POST"
			name="empresat" id="empresat">
			
	<table class="ui-widget ui-widget-content ui-corner-all padding Tcentro">
	  <tr>
	    <th class="ui-widget-header padding" >NOME</th>
	    <th class="ui-widget-header padding" >CNPJ</th>
	    <th class="ui-widget-header padding" >ENDEREÇO</th>
	    <th class="ui-widget-header padding" >TELEFONE</th>
	    <th class="ui-widget-header padding" >EMAIL</th>
	    <th class="ui-widget-header padding" >AÇÃO</th>
	  </tr>
	  <tr>
	      <td style="width: 150px; font-weight: normal"><?php print "oiasdiaso"?></td>
	    <td style="width: 150px; font-weight: normal">57492749000</td>
	    <td style="width: 150px; font-weight: normal">Rua da conceição, numero 200, centro</td>
	    <td style="width: 100px; font-weight: normal">8799998888</td>
	    <td style="width: 150px; font-weight: normal">empresa1@empresa1.com.br</td>
	    <td  style="width: 100px;">  
	        <a href="<?php echo URL.'/Empresas/alterar/';?>" class="editar">Editar</a>
	        <a href="" onclick="teste();" class="excluir">Excluir</a>        
	    </td>
	  </tr>
	  
	  <tr>
	      <td style="width: 150px;">Empresa 2</td>
	    <td style="width: 150px;">44280355000</td>
	    <td>Rua da Maria, numero 10, centro</td>
	    <td style="width: 100px;">8738658888</td>
	    <td>empresa2@empresa2.com.br</td>
	    <td  style="width: 100px;">  
	        <a href="<?php echo URL.'/Empresas/alterar/';?>" class="editar">Editar</a>
	        <a href="" class="excluir">Excluir</a>        
	    </td>
	  </tr>
	  
	</table>

</form>
