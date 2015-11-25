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
  <h3><b>Pedido n&ordm;:</b> 0045 - <b>Data:</b> 02/11/2015 - <b>Status: </b>Saiu para entrega</h3>
  <div>
    <p>
    <table border="0" class="ui-widget ui-widget-content ui-corner-all padding Tcentro">
    <tr>
    	<th WIDTH="200" class="ui-widget-header padding">Produtos</th>
    	<th WIDTH="70" align="center" class="ui-widget-header padding">Valor</th>
       	<th WIDTH="100" align="center" class="ui-widget-header padding">Quantidade</th>
       	<th WIDTH="70" align="center" class="ui-widget-header padding">Valor total</th>
    </tr>
    <tr>
    	<td > Marguerita - Grande</td>
    	<td align="center">23,00</td>
    	<td align="center">2</td>
    	<td align="center">46,00</td>
    </tr>
    <tr>
    	<td > Calabresa - M&eacute;dia</td>
    	<td align="center">16,00</td>
    	<td align="center">1</td>
    	<td align="center">16,00</td>
    </tr>
    <tr>
    	<td colspan="3" align="right">Taxa de entrega:</td>
     	<td align="center">4,00</td>    	
    </tr>
    <tr>
    	<td colspan="3" align="right">Valor total:</td>
     	<td align="center">66,00</td>    	
    </tr>
    </table>
   
    </p>
  </div>
  <?php }?>
  
</div>