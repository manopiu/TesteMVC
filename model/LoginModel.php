<?php

include '../config/includes/Conexao.php';
require_once '../objetos/ClienteDTO.php';


class LoginModel{
	
	public function logarModel($login, $senha){
		
		echo "testeLogin model logarDB<br>";
		//$loginModel = new LoginModel();
				
		$sql = "SELECT * FROM `tb_usuario` WHERE `usu_login`= '$login'
				and `usu_senha` = '$senha';";
		
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

