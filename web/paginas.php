<div id="conteudo" class="sombra">        
    <!--AQUI VAI AS PAGINAS QUE VÃO NA VIEW-->
    <?php
    require_once 'objetos/ClienteDTO.php';
    
    if(isset($_SESSION['usuario'])){
        
        echo '
            <span class="direita">       
            <b>Bem-vindo: </b>'; 
        $cliente = unserialize ($_SESSION['usuario']);
        echo $cliente->getNome();
        echo '<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        		<font size="2"> <a href="';
        		echo URL.'/Cadastrar/alterar';
        		echo'"> Alterar cadastro</a></font>';
    	echo '</span><br>';
    	
        
        if($pagina==NULL){  
        	$pagina = 'home';
        }
        
        require_once 'web/'.$pagina.'/web_'.$pagina.'.php';                
        
    }else{
        
        if($pagina==NULL){
        	$pagina = 'home'; 
       	}
       	
        require_once 'web/'.$pagina.'/web_'.$pagina.'.php';                
        
    }
    if(isset($_SESSION['alerta'])){
   		echo Avisos($_SESSION['alerta']);
    }
    ?> 

    <!--NÃO APAGAR ESSA PARTE--><div class="baixo"></div>
</div>