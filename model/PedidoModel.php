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
		
		$validado;
		//instancia conexao
		$conn = new Conexao();
		//recebe conexão
		$mysqli = $conn->Conn();
		//desabilita o autocommit
		$mysqli->autocommit(FALSE);
		try {
			//pegar data do sistema
			date_default_timezone_set("Etc/GMT+3");
			$data = date("d-m-Y H:i:s");
			
			echo "<br><br> total = ".$pedidoDTO->getValorTotal()." formatado = ".
				str_replace(",",".",$pedidoDTO->getValorTotal())."<br>";
			
			$sql = "INSERT INTO `tb_pedidos` (`usu_id`, `pedi_sessao`, `pedi_status`, 
					`pedi_troco`, `pedi_valorTotal`, `pedi_dataPedido`, 
					`pedi_formaPagamento`, `pedi_taxa`) 
					VALUES (".$pedidoDTO->getClienteDTO()->getUsu_id().",'test teste','P',".
					str_replace(",",".",$pedidoDTO->getTroco()).",".
					str_replace(",",".",$pedidoDTO->getValorTotal()).
					",now(),'".$pedidoDTO->getFormaPagamento()."',".
					str_replace(",",".",$pedidoDTO->getTaxa()).");";
			echo $sql;
			
			$mysqli->query($sql);
			//pegar ultimo id inserido
			$pedidoId = $mysqli->insert_id;
			echo "<br>Pedido ID: ".$pedidoId."<br>";
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
			
			$validado = true;
		} catch (Exception $e) {
			/* Rollback */
			$mysqli->rollback();
			echo "catch";
			$validado = false;
		}finally {
			$conn->fecharConn();
			return $validado;
		}
	}
	
	
	//recuperar os pedidos de um cliente
	public function recuperarPedidos($usuarioId){
		echo "<br>Dentro de recuperarPedidos<br>";
		
		//criar um array d epedidos
		$arrayPedidos = array();
		
		$sql = "SELECT *, DATE_FORMAT(pedi_dataPedido,'%d/%m/%Y %H:%i') as data,
				DATE_FORMAT(pedi_dataEntraga,'%d/%m/%Y %H:%i') as dataEntrega
				FROM `tb_pedidos` WHERE usu_id = $usuarioId AND pedi_status <> 'C';";
		
		echo "<br>".$sql."<br>";
		
		$conn = new Conexao();
		
		$mysqli = $conn->Conn();
			
		if($resultado = $mysqli->query($sql)){
				
			while ($row = mysqli_fetch_array($resultado)) {
				//echo "dentro ".$row['prod_id']." - ".$row['prod_nome']."<br>";
				$pedidoDTO = new PedidoDTO();
		
				$pedidoDTO->setId($row['pedi_id']);
				$pedidoDTO->setSessao($row['pedi_sessao']);
				$pedidoDTO->setStatus($this->verificarStatus($row['pedi_status']));
				$pedidoDTO->setTroco($row['pedi_troco']);
				$pedidoDTO->setValorTotal($row['pedi_valorTotal']);
				$pedidoDTO->setDataPedido($row['data']);
				$pedidoDTO->setTaxa($row['pedi_taxa']);
				if($row['dataEntrega'] == null || $row['dataEntrega'] == ""){
					$pedidoDTO->setDataEntrega("");
				}else{
					$pedidoDTO->setDataEntrega($row['dataEntrega']);
				}
				$pedidoDTO->setFormaPagamento($row['pedi_formaPagamento']);
			
				$arrayPedidos[] = ($pedidoDTO);
				//echo "id: $genero[0], Genero: $genero[1]<br>";
					
				//echo "Final";
				//echo "<br>$i<br>";
		
			}
			
			//buscar os produtos dos pedidos
			foreach($arrayPedidos as $pedido2DTO) {
				//echo "<br> dentro";
				//$pedido2DTO->getTaxa()." taxa".$pedido2DTO->getId()."<br>";
				$pedido2DTO->setArrayProdutos($this->produtosPedido($pedido2DTO->getId()));
			}
			
			//buscar cliente
			
			
			//buscar entregador
			
			
			mysqli_free_result($resultado);
		}
		$conn->fecharConn();
		
		return $arrayPedidos;
		
		
	}
	
	//Formatar status do pedido 
	//Se for E = Entregue
	//Se for P = Pendente 
	//Se for T = Transito 
	//Se for C = Cancelado
	public function verificarStatus($foo){
		
		$status = "";
		
		if($foo == "E"){
			$status = "Encerrado";
		}elseif ($foo == "P"){
			$status = "Processando";
		}elseif ($foo == "T"){
			$status = "Em trânsito";
		}elseif ($foo == "C"){
			$status = "Cancelado";
		}
		//echo "<br>".$status;
		return $status;
		
	}
	
	//retornar um array de produtos de um determinado pedido
	public function produtosPedido($pedidoId){
		
		echo "<br>dentro de produtosPedido";
		
		$sql = "SELECT * FROM tb_produtos_pedidos, tb_produto 
				WHERE tb_produtos_pedidos.prod_id = tb_produto.prod_id 
				AND tb_produtos_pedidos.pedi_id = $pedidoId";
		
		echo "<br>".$sql;
		
		$conn = new Conexao();
		
		$mysqli = $conn->Conn();
		
		//criar um array que irá receber a lista de produtos
		$produtosArray = array();
			
		if($resultado = $mysqli->query($sql)){
				
			while ($row = mysqli_fetch_array($resultado)) {
				//echo "dentro ".$row['prod_id']." - ".$row['prod_nome']."<br>";
				$produtoDTO = new ProdutoDTO();
		
				$produtoDTO->setId($row['prod_id']);
				$produtoDTO->setNome($row['prod_nome']);
				$produtoDTO->setTamanho($row['prod_tamanho']);
				$produtoDTO->setCusto($row['prod_custo']);
				$produtoDTO->setStatus($row['prod_status']);
				$produtoDTO->setDescricao($row['prod_descricao']);
				$produtoDTO->setQuantidade($row['prpe_qtd']);
		
				$produtosArray[] = ($produtoDTO);
				//echo "id: $genero[0], Genero: $genero[1]<br>";
					
				//echo ;
				//echo "<br>$i<br>";
		
			}
			mysqli_free_result($resultado);
		}
		$conn->fecharConn();
		
		return $produtosArray;
		
	}
}

?>

