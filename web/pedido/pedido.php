<script>

function adicionarCarrinho(){
	document.getElementById("acao").value = "adicionarCarrinho";
	//window.alert("dentro: " + document.getElementById("acao").value);
	document.getElementById("pedido").submit();
}
function cancelarProduto(){
	document.getElementById("acao").value = "cancelarProduto";
	//window.alert("dentro: " + document.getElementById("acao").value);
	document.getElementById("pedido").submit();
}

</script>

<h2>Fa&ccedila seu pedido.</h2>
<?php

 require_once 'objetos/ClienteDTO.php';
 require_once '/objetos/ProdutoDTO.php';
 require_once '/objetos/PedidoDTO.php';
 
 if(isset($_SESSION['usuario'])){
 	$cliente = unserialize ($_SESSION['usuario']);
 }else{
 	header("location:".URL);
 }
 
 if(isset($_SESSION['produtos'])){
 	$arrayProdutos = unserialize ($_SESSION['produtos']);
 }
 
  if(isset($_SESSION['pedido'])){
  	$pedidoDTO = unserialize ($_SESSION['pedido']);
  } 
 
 if(isset($_SESSION['produtosCarrinho'])){
  	$carrinho = unserialize ($_SESSION['produtosCarrinho']);
  } 
  
 function validarSessao(){
 	$validado = false;
 	if(isset($_SESSION['usuario'])){
 		$validado = TRUE;
 	}
 	return $validado;
 } 
?>

<form action="../controller/PedidoController.php" method="POST"
			name="pedido" id="pedido">
    
    <span>Escolha sua pizza:</span>
    	<span>
            <select class="paddingcinco" name="produto" id="produto">
    	 	<option value="">Selecione...</option>
    	 	<?php 
    	 	foreach ($arrayProdutos as $produtos){
    	 		
			echo "<option value=".$produtos->getID().">".
				$produtos->getNome()." - ".$produtos->getTamanho()."</option>";
			}
			?>
    	 </select>  
     </span>
     &nbsp;&nbsp;&nbsp;
     <span>Quantidade:&nbsp;</span>
     <span>
     	<select  class="paddingcinco"  name="qtd" id="qtd">
     		<option value="1" selected="selected">1</option>
     		<option value="2">2</option>
     		<option value="3">3</option>
     		<option value="4">4</option>
     		<option value="5">5</option>
     	</select>
     </span>&nbsp;
     <a href="#" onclick="adicionarCarrinho();">
    	 	<img src="<?php echo URL.'/'.DIR_IMG.'/carrinho.png'; ?>" width="30" >
         </a> 
     <br><br>
    <span>Carrinho:</span><br><br>
    
    <?php if (isset($carrinho) ){ 
    	$total = 0;
    	//if($carrinho != null || $carrinho != ""){
    ?>
    <table border="0" class="ui-widget ui-widget-content ui-corner-all padding Tcentro">
    <tr>
    	<th WIDTH="200" class="ui-widget-header padding">Produtos</th>
    	<th WIDTH="70" align="center" class="ui-widget-header padding">Valor</th>
       	<th WIDTH="100" align="center" class="ui-widget-header padding">Quantidade</th>
       	<th WIDTH="70" align="center" class="ui-widget-header padding">Valor total</th>
        <th WIDTH="50" align="center" class="ui-widget-header padding">Cancelar</th>
    </tr>
    <?php 
    
    
    foreach($carrinho as $produtosDTO) {?>
    	<tr>
    	<td ><?php echo $produtosDTO->getNome()." - ".$produtosDTO->getTamanho(); ?></td>
    	<td align="center"><?php print $produtosDTO->getCusto();?></td>
    	<td align="center"><?php print $produtosDTO->getQuantidade();?></td>
    	<td align="center"><?php print number_format(($produtosDTO->getCusto()*$produtosDTO->getQuantidade()),2,",",".");;?></td>
    	<td align="center">
    		<a href="#" onclick="cancelarProduto();">
    	 		<img src="<?php echo URL.'/'.DIR_IMG.'/cancelar_001.png'; ?>" width="20" >
         	</a>
        </td>
        </tr>
	<?php 
    $total = $total + ($produtosDTO->getCusto()*$produtosDTO->getQuantidade());
    }?>
   
    <tr>
    	<td colspan="3" align="right">Taxa de entrega:</td>
     	<td><?php print number_format($pedidoDTO->getTaxa(),2,",","");?></td>    	
    </tr>
    <tr>
    	<td colspan="3" align="right">Valor total:</td>
     	<td align="center"><?php print number_format($total+$pedidoDTO->getTaxa(),2,",","");?></td>    	
    </tr>
    </table>
     <?php }
    //}
      ?>
    <input type="hidden" name="acao" id="acao" value="efetuarPedido">
    <input type="hidden" name="idProduto" id="idProduto" value="">
    <br> 
    <input type="submit" value="Fechar Pedido" class="botao direita">
</form>