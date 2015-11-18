<?php

if($acao == 'novo'){
    require_once 'pedido.php';
		//../controller/PedidoController.php?acao=novoPedido';
}elseif($acao=='acompanhar'){
    require_once 'acompanhar.php';
}elseif ($acao=='pedidoRealizado'){
	require_once 'pedido_efetuado.php';
}
?>