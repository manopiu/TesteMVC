<h1>Cliente</h1>

<form name="buscar" method="POST">
<span>Buscar Cliente:</span><br>
<input class="padding" type="text" name="buscar" value="<?php if(isset($_POST['buscar'])){ echo $_POST['buscar']; }?>" style="width: 98%;"> <br><br>
</form>
<?php
$number = '1123.90';

$number = str_replace("." , "" , $number ); // Primeiro tira os pontos
$number = str_replace("," , "." , $number ); // depois tira os virgula

//echo number_format($number, 2, ',', '.');

if(isset($_POST['buscar'])){
?>

<form action="../controller/UsuarioController.php" method="POST"
			name="cadastrarUsuario" id="cadastrarusuario">
    
    <span>Nome completo:</span><br>
    <input class="campotexto800" type="text" name="nome" 
    	value=""> <br>
    
    <span>Telefone:</span><br>
    <input class="" type="text" name="telefone" 
    	value=""><br>
    
    <span>Endereço:</span><br>
    <input class="campotexto800" type="text" name="endereco" 
    	value=""><br>
    
    <span>Ponto de referência:</span><br>
    <input class="campotexto800" type="text" name="referencia" 
    	value=""><br>
    
    <span>Login:</span><br>
    <input class="" type="text" name="login" 
    	value=""><br>
    
    <span>Senha:</span><br>
    <input class="" type="password" name="senha" id="senha"
    	value=""><br>
    
    <input type="hidden" name="acao" id="acao" value="cadastrar">
    <br> 
    <input type="submit" value="Cadastrar" class="botao direita">
</form>
<?php } ?>