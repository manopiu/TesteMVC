<h1>Empresas</h1>

<a href="<?php echo URL.'/Empresas/';?>" class="botao">Home</a>
<a href="<?php echo URL.'/Empresas/cadastrar/';?>" class="botao">Nova Empresa</a>
<br><br>
<?php
if($acao == 'cadastrar'){
    require_once 'cadastrar_Empresas.php';
}elseif($acao=='alterar'){
    require_once 'alterar_Empresas.php';
}elseif ($acao=='EmpresasGerencia'){
	require_once 'listar_Empresas.php';
}else{
    require_once 'listar_Empresas.php';
}
?>