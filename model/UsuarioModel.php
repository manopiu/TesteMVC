<?php

include '../config/includes/Conexao.php';
require_once '../objetos/ClienteDTO.php';


class UsuarioModel{
	
	public function cadastrar($clienteDTO){
		
		echo "Cadastrar usuario UsuarioModel<br>";
		//$loginModel = new LoginModel();
				
		$sql = "INSERT INTO `tb_usuario`(`usu_nome`, `usu_login`, `usu_senha`, 
				`usu_telefone`, `usu_endereco`, `usu_pt_referencia`, `usu_tipo`) 
				VALUES (?,?,?,?,?,?,'C')";
		
		//echo "$query<br>";
		
		$conn = new Conexao();
		
		$query = $conn->Conn();
		
		echo $sql;
		
		/* Prepared statement, stage 1: prepare */
		if (!($stmt = $query->prepare($sql))) {
			echo "Prepare falhou: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		echo $clienteDTO->getNome()." ".$clienteDTO->getLogin()." ". 
				$clienteDTO->getSenha()." ".$clienteDTO->getUsu_telefone()." ".
				$clienteDTO->getUsu_endereco()." ".
				$clienteDTO->getUsu_pt_referencia()."<br>";
		
		/* Prepared statement, stage 2: bind and execute */
		if (!$stmt->bind_param('sssiss',$clienteDTO->getNome(), $clienteDTO->getLogin(), 
				$clienteDTO->getSenha(), $clienteDTO->getUsu_telefone(), 
				$clienteDTO->getUsu_endereco(), $clienteDTO->getUsu_pt_referencia())){
			echo "Binding parametros falhou: (" . $stmt->errno . ") " . $stmt->error . "<br>";
		}
		
		/* Execute, stage 3: executando query */
		if (!$stmt->execute()){
			echo "Execute falhou: (" . $stmt->errno . ") " . $stmt->error;
		}
		//fechar statment
		$stmt->close();
			
		
		//Buscar o id recem inserido pra jogar na sessão
		$sql = "SELECT USU_ID FROM tb_usuario ORDER BY USU_ID DESC LIMIT 1";
		
		$resultado = $query->query($sql);
		
		if(!$resultado){
			die('Consulta InvÃ¡lida: ' . mysql_errno());
		}
		$reg = mysqli_fetch_assoc($resultado);
		
		$usuario_id = $reg['USU_ID'];
		
		
		$clienteDTO->setUsu_id($usuario_id);
		
		// Free the resources associated with the result set
		// This is done automatically at the end of the script
		mysqli_free_result($resultado);
		
		$conn->fecharConn();
		
		//echo "testeLogin model logarDB $count <br>";
		return $clienteDTO;
	}
	
	public function atualizar($clienteDTO){
	
		echo "Atualizar usuario UsuarioModel<br>";
		//$loginModel = new LoginModel();
	
		$sql = "UPDATE `tb_usuario` SET `usu_nome`=?,`usu_login`=?,`usu_senha`=?,
				`usu_telefone`=?,`usu_endereco`=?,`usu_pt_referencia`=?
				 WHERE usu_id = ?";
		
	
		echo "$sql<br>ID: ".$clienteDTO->getUsu_id();
		echo "<br>Nome: ".$clienteDTO->getNome();
		echo "<br>Login: ".$clienteDTO->getLogin();
		echo "<br>Senha: ".$clienteDTO->getSenha();
		echo "<br>Endere: ".$clienteDTO->getUsu_endereco();
		echo "<br>Pt refer: ".$clienteDTO->getUsu_pt_referencia();
	
		$conn = new Conexao();
	
		$query = $conn->Conn();
	
		/* Prepared statement, stage 1: prepare */
		if (!($stmt = $query->prepare($sql))) {
			echo "Prepare falhou: (" . $query->errno . ") " . $query->error;
		}
	
		/* Prepared statement, stage 2: bind and execute */
		if (!$stmt->bind_param('sssissi',$clienteDTO->getNome(), $clienteDTO->getLogin(),
				$clienteDTO->getSenha(), $clienteDTO->getUsu_telefone(),
				$clienteDTO->getUsu_endereco(), $clienteDTO->getUsu_pt_referencia(),
				$clienteDTO->getUsu_id())){
			echo "Binding parametros falhou: (" . $stmt->errno . ") " . $stmt->error;
		}
	
		/* Execute, stage 3: executando query */
		if (!$stmt->execute()){
			echo "Execute falhou: (" . $stmt->errno . ") " . $stmt->error;
		}
		//fechar statment
		$stmt->close();
		
		$conn->fecharConn();
	
		//echo "testeLogin model logarDB $count <br>";
		//return $clienteDTO;
	}
	
	public function buscarUsuario($usu_id){
		echo "testeLogin model logarDB<br>";
		//$loginModel = new LoginModel();
	
		$sql = "SELECT * FROM `tb_usuario` WHERE usu_id = $usu_id;";
	
		echo "$sql<br>";
	
		$conn = new Conexao();
	
		$query = $conn->Conn();
	
		$resultado = $query->query($sql);
			
		if(!$resultado){
		die('Consulta InvÃ¡lida: ' . mysql_errno());
		}
		$reg = mysqli_fetch_assoc($resultado);
	
		$clienteDTO = new ClienteDTO();
	
		$clienteDTO->Cliente($reg['usu_id'], $reg['usu_nome'], $reg['usu_login'],
				$reg['usu_senha'], $reg['usu_telefone'], $reg['usu_endereco'],
						$reg['usu_pt_referencia'], $reg['usu_tipo']);
	
						//só para teste
		//echo "<br>".$clienteDTO->getNome();
	
		// Free the resources associated with the result set
		// This is done automatically at the end of the script
		mysqli_free_result($resultado);
	
		$conn->fecharConn();
	
		//echo "testeLogin model logarDB $count <br>";
		return $clienteDTO;
		
	}
}

?>

