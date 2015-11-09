<H1>CADASTRAR ENTREGADOR</H1>


<form action="../controller/UsuarioController.php" method="POST"
			name="cadastrarUsuario" id="cadastrarusuario">
    
    <span>Nome:</span><br>
    <input class="campotexto800" type="text" name="nome" 
    	value=""> <br>
    
    <span>EMPRESA:</span><br>
    <select name="empresa" class="paddingcinco" >
        <option value="">SELECIONE</option>
        <option value="">Empresa 1</option>
        <option value="">Empresa 2</option>
    </select><br>
    
    <span>CPF:</span><br>
    <input class="" type="text" name="telefone" 
    	value=""><br>
    
    <span>RG:</span><br>
    <input class="campotexto800" type="text" name="endereco" 
    	value=""><br>
    
    <span>Telefone:</span><br>
    <input class="campotexto800" type="text" name="referencia" 
    	value=""><br>
    
  
    <br> 
    <input type="submit" value="Cadastrar" class="botao direita">
</form>