<?php

//include '../config/includes/Conexao.php';
require_once '../objetos/ProdutoDTO.php';
require_once '../objetos/PedidoDTO.php';


class PedidoModel{
	
	//buscar taxa de entrega
	public function buscarTaxaVigente(){
		echo "buscarTaxa";
		
		$sql = "SELECT * FROM `tb_taxa` WHERE tax_status = 'S'";

		$conn = new Conexao();
		
		$query = $conn->Conn();
		
		$taxa;
			
		$resultado = $query->query($sql);
			
		if(!$resultado){
			die('Consulta Inválida: ' . mysql_errno());
		}
		$reg = mysqli_fetch_assoc($resultado);
				echo $reg["tax_valor"];
				
		return $reg["tax_valor"];
	}
	
	
	//atualizar taxa
	public function atualizarTaxa(){
	
	}
	
	
	
}

?>

