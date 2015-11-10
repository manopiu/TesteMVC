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
			
		$resultado = $query->query($sql);
			
		if(!$resultado){
			die('Consulta Inválida: ' . mysql_errno());
		}
		$reg = mysqli_fetch_assoc($resultado);

		$taxa = $reg["tax_valor"];
				
		return $taxa;
	}
	
	
	//atualizar taxa
	public function atualizarTaxa(){
	
	}
	
	
	
}

?>

