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

<h1>Produtos Dispon&iacute;veis</h1><br>

<table class="ui-widget ui-widget-content ui-corner-all padding Tcentro">
  <tr>
    <th  style="width: 700px;" class="ui-widget-header padding" >NOME</th>
    <th  style="width: 700px;" class="ui-widget-header padding" >DESCRIÇÃO</th>
    <th class="ui-widget-header padding" >TAMANHO</th>
    <th class="ui-widget-header padding" >CUSTO</th>
  </tr>
  <?php 
  		foreach ($arrayProdutos as $produtos){
  ?>	
  <tr>
      <td><?php echo $produtos->getNome();?></td>
      <td><?php print $produtos->getDescricao();?></td>
    <td style="width: 150px;"><?php print $produtos->getTamanho();?></td>
    <td><?php echo $produtos->getCusto();?></td>
  </tr>  
  
 <?php }?>
</table>