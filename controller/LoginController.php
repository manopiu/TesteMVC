  
<?php

echo "testeLogin Controle<br>";
require_once '../config/includes/config.php';
require_once '../model/LoginModel.php';
//require_once '../objetos/ClienteDTO.php';

//login e senha
$username = $_POST["nome"];
$password = $_POST["senha"];

//zerar alerta
if(isset($_SESSION['alerta'])){
	unset($_SESSION['alerta']);
}

$loginModel = new LoginModel();

$clienteDTO = $loginModel->logarModel($username, $password);
echo $clienteDTO->getNome()."\n";

if ($clienteDTO != null AND $clienteDTO->getUsu_id() > 0 ) {
    
    echo "cliente carregado";
    //session_start();
    $_SESSION['usuario'] = serialize($clienteDTO);
    //require_once '../web/paginaPrincipal.php';
    header("location: ".URL."/home");

}else{
	echo "cliente vazio";
	//usando passagens de dados por sessao. Se for passar ogjetos, serializar
	//ex. $SESSION['usuario'] = serialize($objeto);
	//session_start();
	$alerta = "Login ou senha inválidos";
	$_SESSION['alerta'] = $alerta;
	header("location: ".URL);
}
?>

