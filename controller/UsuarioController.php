<?php

echo "Usuario Controller<br>";

require_once '../model/UsuarioModel.php';
require_once '../config/includes/config.php';

echo 'Dentro da funcao ususarioController';
//session_start();
$acao = $_POST["acao"];

//zerar alerta
if (isset($_SESSION['alerta'])){
	unset($_SESSION['alerta']);
}

echo '<br>'.$acao;

if($acao == "cadastrar"){

	//instanciar o objeto alerta caso falhem as verifica��es
	$alerta = "Preenchimento obrigat&oacuterio: <br><blockquote>";
	
	$validado = true;
	
	//PEGAR AS INFORMA��ES DA VIEW E VALIDAR
	//CASO A VALIDACAO FALHAR, RETORNAR A PAGINA DE CADASTRO PARA 
	//COMPLETAR O CADASTRO
	$nome = $_POST["nome"];
	$telefone = $_POST["telefone"];
	$endereco = $_POST["endereco"];
	$pt_referencia = $_POST["referencia"];
	$login = $_POST["login"];
	$senha = $_POST["senha"];
	
	//Objeto que ser� povoado
	$clienteDTO = new ClienteDTO();
	
	
	//VALIDACAO
	if($nome == null || $nome == ""){
		$alerta .= "- Nome Completo<br>";
		$validado = false;
	}
	if($telefone == null || $telefone == ""){
		$alerta .= "- Telefone <br>";
		$validado = false;
	}
	if($endereco == null || $endereco == ""){
		$alerta .= "-Endere&ccedilo <br>";
		$validado = false;
	}
	if($login == null || $login == ""){
		$alerta .= "-Login <br>";
		$validado = false;
	}
	if($senha == null || $senha == ""){
		$alerta .= "-Senha <br>";
		$validado = false;
	}
	
	if(!$validado){		
		//$alerta = "Login ou senha inválidos";
		$_SESSION['alerta'] = $alerta;
		header("location:".URL."/Cadastrar/cadastrar");
		
	}else{
		echo "validado os dados no controller.<br>";
		echo "senha: ".$senha."<br>";
		$usuarioModel = new UsuarioModel();
		
		$clienteDTO->ClienteCadastro($nome, $login, $senha, $telefone,
				$endereco, $pt_referencia, 'C');
		
		$cadatrado = $usuarioModel->cadastrar($clienteDTO);
		
		if($cadatrado != null && $cadatrado->getUsu_id() != null &&
				$cadatrado->getUsu_id() != ""){
			
			$_SESSION['usuario'] = serialize($cadatrado);
			
			header("location:../home/home");
		}else{
			header("location:../Cadastrar/Cadastrar");
		}
		
	}
//acao de atualizar o Usuario
}elseif ($acao == "update"){
	//instanciar o objeto alerta caso falhem as verifica��es
	$alerta = "Preenchimento obrigat�rio: <br>";
		
	$validado = true;
		
	//PEGAR AS INFORMA��ES DA VIEW E VALIDAR
	//CASO A VALIDACAO FALHAR, RETORNAR A PAGINA DE CADASTRO PARA
	//COMPLETAR O CADASTRO
	$usu_id = $_POST["usu_id"];
	$nome = $_POST["nome"];
	$telefone = $_POST["telefone"];
	$endereco = $_POST["endereco"];
	$pt_referencia = $_POST["referencia"];
	$login = $_POST["login"];
	$senha = $_POST["senha"];
	$tipoCliente = $_POST["tipoCliente"];
		
	//Objeto que ser� povoado
	$clienteDTO = new ClienteDTO();
		
		
	//VALIDACAO
	if($usu_id == null || $usu_id == ""){
		$validado = false;
	}
	
	if($nome == null || $nome == ""){
		$alerta .= "\t - Nome Completo<br>";
		$validado = false;
	}
	if($telefone == null || $telefone == ""){
		$alerta .= "\t - Telefone <br>";
		$validado = false;
	}
	if($endereco == null || $endereco == ""){
		$alerta .= "\t-Endere�o <br>";
		$validado = false;
	}
	if($login == null || $login == ""){
		$alerta .= "\t-Login <br>";
		$validado = false;
	}
	if($senha == null || $senha == ""){
		$alerta .= "\t-Senha <br>";
		$validado = false;
	}
	echo $validado;
	if(!$validado){
				//if (!isset($_SESSION['alerta'])){
				//$_SESSION('alert') = $alerta;
				//echo Avisos($_SESSION['alerta']);
				//}
				//header("location:../Cadastrar");
}else{
                            
	$usuarioModel = new UsuarioModel();
	
	$clienteDTO->Cliente($usu_id, $nome, $login, $senha, $telefone,
			$endereco, $pt_referencia, $tipoCliente);
	
	$usuarioModel->atualizar($clienteDTO);
	
	$cadatrado = $usuarioModel->buscarUsuario($usu_id);
			
                         
	if($cadatrado != null){
					
		$_SESSION['usuario'] = serialize($cadatrado);
		//require_once '../web/paginaPrincipal.php';
		//header("location:../home/home");
        header("location:".URL."/Cadastrar/alterar");
	}
			
}
			
			
//Acao de buscar um usuario
}elseif ($acao == "buscar"){
	
}


/**
$clienteDTO = new ClienteDTO();
$loginModel = new LoginModel();

$clienteDTO = $loginModel->logarModel($username, $password);
echo $clienteDTO->getNome()."\n";

if ($clienteDTO != null) {
	echo "cliente carregado";
    session_start();
    $_SESSION['usuario'] = serialize($clienteDTO);
    //require_once '../web/paginaPrincipal.php';
    header("location:../home");

    //usando passagens de dados por sessao. Se for passar ogjetos, serializar
    //ex. $SESSION['usuario'] = serialize($objeto);
    session_start();
    $alerta = "Login ou senha inválidos";
    $_SESSION['alerta'] = $alerta;
    header("location:../home");


    //usando request para passagem de parametros
    //$alerta = "Login ou senha inv�lidos";
    //$_REQUEST['alerta'] = $alerta;				
    //header("location:../inicio2.php?alerta=".$_REQUEST['alerta']);

}else{
	echo "cliente vazio";
}
**/
?>

