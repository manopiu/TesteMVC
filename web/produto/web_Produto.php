
<?php
if($acao == 'cadastrar'){
    require_once 'cadastrar_Produto.php';
}elseif($acao=='alterar'){
    require_once 'alterar_Produto.php';
}elseif($acao=='Menu'){
    require_once 'menu_Produto.php';
}elseif($acao=='Promocao'){
	require_once 'promocao.php';
}elseif($acao=='ProdutoGerencia'){
	require_once 'listar_Produto.php';
}else{
    require_once 'listar_Produto.php';
}
?>