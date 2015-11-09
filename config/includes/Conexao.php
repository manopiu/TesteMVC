<?php

class Conexao{
	
	public $conn = null;
	
	static function Conn(){
		include '../config/includes/config.php';
		
		//conex„o nova usando mysqli
		//vers„o nova
		$conn = new mysqli($hostname,$usuario,$senha, $db);
		
		if (!$conn) {
		    echo "Error: Unable to connect to MySQL." . PHP_EOL;
		    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		    exit;
		}
		
		echo "Successo: A conexao SQL funcionou! A conexao ao banco de dados est· bom. <br>";
		echo "Host information: " . mysqli_get_host_info($conn) . "<br>";
		
		return $conn;
		//mysqli_close($link);
	}
	
	static function fecharConn(){
		if($conn != null){
			$conn->close();
		}
	}
}

/**
 //vers„o antiga
 $link = mysql_connect($hostname,$usuario,$senha);

 if(!$link){
 die("N√£o foi poss√≠vel conectar");
 }
 //vers„o antigs
 mysql_select_db($db);

 mysql_query('SET NAMES utf8');

 **/

