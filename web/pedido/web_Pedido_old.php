<h1>Pagina WEB Pedido!!!</h1>

<?php

if($acao == 'novo'){
    require_once 'pedido.php';
		//../controller/PedidoController.php?acao=novoPedido';
}elseif($acao=='acompanhar'){
    require_once 'acompanhar.php';
}
?>