<h2>Cadastre-se</h2>
<?php
if (isset($_SESSION['alerta'])){
	echo Avisos($_SESSION['alerta']);
 }
 require_once 'objetos/ClienteDTO.php';

 
 
 if(isset($_SESSION['usuario'])){
 	$cliente = unserialize ($_SESSION['usuario']);
 }
?>

<form action="../controller/UsuarioController.php" method="POST"
			name="cadastrarUsuario" id="cadastrarusuario">
    
    <span>Nome completo:</span><br>
    <input class="campotexto800" type="text" name="nome" 
    	value="<?php echo trim($cliente->getNome()); ?>"> <br>
    
    <span>Telefone:</span><br>
    <input class="" type="text" name="telefone" 
    	value="<?php echo trim($cliente->getUsu_telefone()); ?>"><br>
    
    <span>Endereço:</span><br>
    <input class="campotexto800" type="text" name="endereco" 
    	value="<?php echo trim($cliente->getUsu_endereco()); ?>"><br>
    
    <span>Ponto de referência:</span><br>
    <input class="campotexto800" type="text" name="referencia" 
    	value="<?php echo trim($cliente->getUsu_pt_referencia()); ?>"><br>
    
    <span>Login:</span><br>
    <input class="" type="text" name="login" 
    	value="<?php echo trim($cliente->getLogin()); ?>"><br>
    
    <span>Senha:</span><br>
    <input class="" type="password" name="senha" 
    	value="<?php echo trim($cliente->getSenha()); ?>"><br>
    
    <input type="hidden" name="acao" id="acao" value="update">
    <input type="hidden" name="usu_id" id="usu_id" 
    	value="<?php echo trim($cliente->getUsu_id()); ?>">
    <input type="hidden" name="tipoCliente" id="tipoCliente" 
    	value="<?php echo trim($cliente->getUsu_tipo()); ?>">
    
    <br> 
    <input type="submit" value="Atualizar" class="botao direita">
</form>