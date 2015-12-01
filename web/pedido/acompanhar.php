<?php 
require_once '/objetos/ProdutoDTO.php';
require_once '/objetos/PedidoDTO.php';

if(isset($_SESSION['pedidos'])){
	$arrayPedidos = unserialize ($_SESSION['pedidos']);
}
 
 ?>

<h1>Acompanhar Pedido</h1>

<div id="accordion">
<?php foreach($arrayPedidos as $pedidoDTO) {?>
  <h3><b>Pedido n&ordm;:</b> <?php print $pedidoDTO->getID();?> - 
  		<b>Data:</b> <?php print $pedidoDTO->getDataPedido(); ?> - 
  		<b>Status: </b><?php print $pedidoDTO->getStatus();?></h3>
  <div>
    <p>
    <table border="0" class="ui-widget ui-widget-content ui-corner-all padding Tcentro">
    <tr>
    	<th WIDTH="200" class="ui-widget-header padding">Produtos</th>
    	<th WIDTH="70" align="center" class="ui-widget-header padding">Valor</th>
       	<th WIDTH="100" align="center" class="ui-widget-header padding">Quantidade</th>
       	<th WIDTH="70" align="center" class="ui-widget-header padding">Valor total</th>
    </tr>
    <?php foreach ($pedidoDTO->getArrayProdutos() as $produtosDTO) {?>
    <tr>
    	<td ><?php print $produtosDTO->getNome();?></td>
    	<td align="center"><?php print $produtosDTO->getCusto();?></td>
    	<td align="center"><?php print $produtosDTO->getQuantidade();?></td>
    	<td align="center"><?php print number_format(($produtosDTO->getCusto() 
    			* $produtosDTO->getQuantidade()),2,".","");?></td>
    </tr>
    <?php }?>
    <tr>
    	<td colspan="3" align="right">Taxa de entrega:</td>
     	<td align="center"><?php print $pedidoDTO->getTaxa(); ?></td>    	
    </tr>
    <tr>
    	<td colspan="3" align="right">Valor total:</td>
     	<td align="center"><?php print $pedidoDTO->getValorTotal(); ?></td>    	
    </tr>
    </table>
   
    </p>
  </div>
  <?php }?>
  
</div>