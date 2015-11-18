<?php

//include '../config/includes/Conexao.php';
require_once '../objetos/ProdutoDTO.php';
require_once '../objetos/PedidoDTO.php';
require_once '../objetos/ClienteDTO.php';


class PedidoModel{
	
	//buscar taxa de entrega
	public function buscarTaxaVigente(){
		echo "buscarTaxa";
		
		$sql = "SELECT * FROM `tb_taxa` WHERE tax_status = 'S'";

		$conn = new Conexao();
		
		$query = $conn->Conn();
			
		$resultado = $query->query($sql);
			
		if(!$resultado){
			die('Consulta InvÃ¡lida: ' . mysql_errno());
		}
		$reg = mysqli_fetch_assoc($resultado);

		$taxa = $reg["tax_valor"];
		
		mysqli_free_result($resultado);
		
		$conn->fecharConn();
		
		return $taxa;
	}
	
	
	//atualizar taxa
	public function atualizarTaxa(){
	
	}
	
	//persistir pedido
	public function salvarPedido($pedidoDTO){
		echo "Dentro de salvarPedido";
		
		//instancia conexao
		$conn = new Conexao();
		//recebe conexão
		$mysqli = $conn->Conn();
		//desabilita o autocommit
		$mysqli->autocommit(FALSE);
		try {
			//pegar data do sistema
			date_default_timezone_set("Etc/GMT+3");
			$data =date("d-m-Y H:i:s");
			
			$sql = "INSERT INTO `tb_pedidos`(`usu_id`, `pedi_sessao`, `pedi_status`, 
					`pedi_troco`, `pedi_valorTotal`, `pedi_dataPedido`, `pedi_formaPagamento`) 
					VALUES (".$pedidoDTO->getClienteDTO()->getUsu_id().",'test teste','P',".
					number_format($pedidoDTO->getTroco(),2,".","").",".
					number_format($pedidoDTO->getValorTotal(),2,".","").
					",now(),'".$pedidoDTO->getFormaPagamento()."');";
			echo $sql;
			
			$mysqli->query($sql);
			//pegar ultimo id inserido
			$pedidoId = $mysqli->insert_id;
			echo "<br>".$pedidoId."<br>";
			//inserir os produtos na tabela tb_produtos_pedidos
			$arrayProdutos = $pedidoDTO->getArrayProdutos();
			
			foreach($arrayProdutos as $produtoDTO) {
				echo "produto - ".$produtoDTO->getId()."<br>";
				$sql = "INSERT INTO `tb_produtos_pedidos`(`pedi_id`, `prod_id`, `prpe_qtd`) 
						VALUES ('".$pedidoId."','".$produtoDTO->getId()."','".
						$produtoDTO->getQuantidade()."');";
				$mysqli->query($sql);
			}
			
			/* commit insert */
			$mysqli->commit();
			
			return true;
		} catch (Exception $e) {
			/* Rollback */
			$mysqli->rollback();
			echo "catch";
			return false;
		}finally {
			$conn->fecharConn();
		}
	}
	
	
	//recuperar os pedidos de um cliente
	public function recuperarPedidos($usuarioId){
		echo "<br>Dentro de recuperarPedidos<br>";
		
		$arrayPedidos = array();
		
		$sql = "SELECT * FROM tb_produtos_pedidos, tb_pedidos, tb_produto
		where tb_produtos_pedidos.prod_id = tb_produto.prod_id AND
		tb_produtos_pedidos.pedi_id = tb_pedidos.pedi_id AND
		tb_pedidos.usu_id = 1 and tb_pedidos.pedi_status <> 'E' AND
		tb_pedidos.pedi_status <> 'C';";
		
	}
}

?>

