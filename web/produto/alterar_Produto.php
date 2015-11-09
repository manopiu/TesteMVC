<H1>ALTERAR PRODUTO</H1>


<form action="../controller/UsuarioController.php" method="POST"
			name="cadastrarUsuario" id="cadastrarusuario">
    
    <span>NOME:</span><br>
    <input class="campotexto800" type="text" name="nome" 
    	value="Pizza Calabresa"> <br>
    
    <span>DESCRIÇÃO:</span><br>
    <input class="campotexto800" type="text" name="nome" 
    	value="Queijo e Calabresa"> <br>
    
    <span>TAMANHO:</span><br>
    <select name="empresa" class="paddingcinco" >
        <option value="">SELECIONE</option>
        <option selected value="">PEQUENA</option>
        <option value="">MÉDIA</option>
        <option value="">GRANDE</option>
    </select><br>
    
    <span>VALOR:</span><br>
    <input class="" type="text" name="telefone" 
    	value="12,00"><br>        
    
  
    <br> 
    <input type="submit" value="Cadastrar" class="botao direita">
</form>