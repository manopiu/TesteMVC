<H1>CADASTRAR PRODUTO</H1>


<form action="../controller/UsuarioController.php" method="POST"
			name="cadastrarUsuario" id="cadastrarusuario">
    
    <span>NOME:</span><br>
    <input class="campotexto800" type="text" name="nome" 
    	value=""> <br>
    
    <span>DESCRIÇÃO:</span><br>
    <input class="campotexto800" type="text" name="nome" 
    	value=""> <br>
    
    <span>TAMANHO:</span><br>
    <select name="empresa" class="paddingcinco" >
        <option value="">SELECIONE</option>
        <option value="">PEQUENA</option>
        <option value="">MÉDIA</option>
        <option value="">GRANDE</option>
    </select><br>
    
    <span>VALOR:</span><br>
    <input class="" type="text" name="telefone" 
    	value=""><br>        
    
  
    <br> 
    <input type="submit" value="Cadastrar" class="botao direita">
</form>