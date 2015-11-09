<h2>Cadastre-se</h2>
<?php

 require_once 'objetos/ClienteDTO.php';
 
 if(isset($_SESSION['usuario'])){
 	$cliente = unserialize ($_SESSION['usuario']);
 }else{
 	header("location:".URL);
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
    
    <span>Nome completo:</span><br>
    <input class="campotexto800" type="text" name="nome" 
    	value="<?php if (validarSessao()) echo trim($cliente->getNome()); ?>"> <br>
    
    <span>Telefone:</span><br>
    <input class="" type="text" name="telefone" 
    	value="<?php if (validarSessao()) echo trim($cliente->getUsu_telefone()); ?>"><br>
    
    <span>Endereço:</span><br>
    <input class="campotexto800" type="text" name="endereco" 
    	value="<?php if (validarSessao()) echo trim($cliente->getUsu_endereco()); ?>"><br>
    
    <span>Ponto de referência:</span><br>
    <input class="campotexto800" type="text" name="referencia" 
    	value="<?php if (validarSessao()) echo trim($cliente->getUsu_pt_referencia()); ?>"><br>
    
    <span>Login:</span><br>
    <input class="" type="text" name="login" 
    	value="<?php if (validarSessao()) echo trim($cliente->getLogin()); ?>"><br>
    
    <span>Senha:</span><br>
    <input class="" type="password" name="senha" id="senha"
    	value="<?php if (validarSessao()) echo trim($cliente->getSenha()); ?>"><br>
    
    <input type="hidden" name="acao" id="acao" value="cadastrar">
    <br> 
    <input type="submit" value="Cadastrar" class="botao direita">
</form>