<H1>ALTERAR ENTREGADOR</H1>


<form action="../controller/UsuarioController.php" method="POST"
			name="cadastrarUsuario" id="cadastrarusuario">
    
    <span>Nome:</span><br>
    <input class="campotexto800" type="text" name="nome" 
    	value="PAULO ROBERTO SANTANA"> <br>
    
    <span>EMPRESA:</span><br>
    <select name="empresa" class="paddingcinco" >
        <option value="">SELECIONE</option>
        <option value="">Empresa 1</option>
        <option selected="" value="">Empresa 2</option>
    </select><br>
    
    <span>CPF:</span><br>
    <input class="" type="text" name="telefone" 
    	value="02548955523"><br>
    
    <span>RG:</span><br>
    <input class="campotexto800" type="text" name="endereco" 
    	value="2.256666"><br>
    
    <span>Telefone:</span><br>
    <input class="campotexto800" type="text" name="referencia" 
    	value="8738658888"><br>
    
  
    <br> 
    <input type="submit" value="Cadastrar" class="botao direita">
</form>