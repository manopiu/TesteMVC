<h1>Entregadores</h1>

<a href="<?php echo URL.'/Entregadores/';?>" class="botao">Home</a>
<a href="<?php echo URL.'/Entregadores/cadastrar/';?>" class="botao">Novo Entregador</a>
<br><br>
<?php
if($acao == 'cadastrar'){
    require_once 'cadastrar_Entregadores.php';
}elseif($acao=='alterar'){
    require_once 'alterar_Entregadores.php';
}else{
    require_once 'listar_Entregadores.php';
}
?>