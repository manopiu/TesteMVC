<?php

include '../config/includes/Conexao.php';
require_once '../objetos/ProdutoDTO.php';


class ProdutoModel{
	
	//buscar um produto específico
	public function buscarProduto($id){
		echo 'buscarProduto';
			
		$sql = "SELECT * FROM `tb_produto` WHERE prod_id =" . $id . ";";
		
		$conn = new Conexao();
		
		$mysqli = $conn->Conn();
		
		//criar um array que irá receber a lista de produtos
		$produtoDTO = new ProdutoDTO();
			
		if($resultado = $mysqli->query($sql)){
				
			while ($row = mysqli_fetch_array($resultado)) {
				//echo "dentro ".$row['prod_id']." - ".$row['prod_nome']."<br>";
		
				$produtoDTO->setId($row['prod_id']);
				$produtoDTO->setNome($row['prod_nome']);
				$produtoDTO->setTamanho($row['prod_tamanho']);
				$produtoDTO->setCusto($row['prod_custo']);
				$produtoDTO->setStatus($row['prod_status']);
				$produtoDTO->setDescricao($row['prod_descricao']);
		
			}
		}
		
		mysqli_free_result($resultado);
		
		$conn->fecharConn();
		
		return $produtoDTO;
		}
		
	
	//buscar todos os produtos ativos (status = S)
	//implementei pra usar no caso de uso do pedido
	public function buscarProdutosAtivos(){
		echo 'buscarProdutosAtivos';
			
		$sql = "SELECT * FROM `tb_produto` WHERE prod_status = 'S';";

		$conn = new Conexao();
		
		$query = $conn->Conn();
		
		//criar um array que irá receber a lista de produtos
		$produtosArray = array();
			
		if($resultado = $query->query($sql)){
			
			while ($row = mysqli_fetch_array($resultado)) {
				//echo "dentro ".$row['prod_id']." - ".$row['prod_nome']."<br>";
				$produtoDTO = new ProdutoDTO();
				
				$produtoDTO->setId($row['prod_id']);
				$produtoDTO->setNome($row['prod_nome']);
				$produtoDTO->setTamanho($row['prod_tamanho']);
				$produtoDTO->setCusto($row['prod_custo']);
				$produtoDTO->setStatus('S');
				$produtoDTO->setDescricao($row['prod_descricao']);
						
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
	
	//mudar status do produto
	public function mudarStatusProduto($produtoID,$statusProduto){
		echo 'mudarStatusProduto';
			
		if($statusProduto == 'S'){
			$sql = "UPDATE `tb_produto` SET `prod_status` = 'N' WHERE prod_id = $produtoID;";
		}elseif ($statusProduto == 'N'){
			$sql = "UPDATE `tb_produto` SET `prod_status` = 'S' WHERE prod_id = $produtoID;";
		}
			
		echo "<br>".$sql;
		
		$conn = new Conexao();
		
		$mysqli = $conn->Conn();
		
		
			
		if($mysqli->query($sql) === TRUE){
		
			echo "<br>Atualizado com sucesso<br>";
			
		}
		
		$conn->fecharConn();
	}
	
	//buscar todos os produtos. Ativos ou Inativos
	public function buscarTodosProdutos(){
		echo 'buscarTodosProdutos';
			
		$sql = "SELECT * FROM `tb_produto`;";
		
		$conn = new Conexao();
		
		$query = $conn->Conn();
		
		//criar um array que irá receber a lista de produtos
		$produtosArray = array();
			
		if($resultado = $query->query($sql)){
				
			while ($row = mysqli_fetch_array($resultado)) {
				//echo "dentro ".$row['prod_id']." - ".$row['prod_nome']."<br>";
				$produtoDTO = new ProdutoDTO();
		
				$produtoDTO->setId($row['prod_id']);
				$produtoDTO->setNome($row['prod_nome']);
				$produtoDTO->setTamanho($row['prod_tamanho']);
				$produtoDTO->setCusto($row['prod_custo']);
				$produtoDTO->setStatus($row['prod_status']);
				$produtoDTO->setDescricao($row['prod_descricao']);
		
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
	
	//buscar produto por texto
	public function buscarProdutosTexto($texto){
	
	}
	
	//cadastrar produto
	public function cadastrarProduto($produtoDTO){
		echo "Dentro cadastrarProduto";
		
		$sql = "INSERT INTO `tb_produto`(`prod_descricao`, 
					`prod_tamanho`, `prod_custo`, `prod_status`, `prod_nome`) 
				
				VALUES ('".$produtoDTO->getDescricao()."','".$produtoDTO->getTamanho()."',
						".$produtoDTO->getCusto().",'".$produtoDTO->getStatus()."',
								'".$produtoDTO->getNome()."');";
		
			
		echo "<br>".$sql;
		
		$conn = new Conexao();
		
		$mysqli = $conn->Conn();
		
		
			
		if($mysqli->query($sql) === TRUE){
		
			echo "<br>Atualizado com sucesso<br>";
		
		}
		
		$conn->fecharConn();
	}
	
	//atualizar produto
	public function atualizarProduto($produtoDTO){
		echo "Dentro atualizarProduto";
		
		$sql = "UPDATE `tb_produto` SET `prod_descricao`= '".$produtoDTO->getDescricao().
				"',`prod_tamanho`= '".$produtoDTO->getTamanho().
				"',`prod_custo`=".$produtoDTO->getCusto().
				",`prod_status`='".$produtoDTO->getStatus().
				"',`prod_nome`= '".$produtoDTO->getNome()."' WHERE prod_id = ".$produtoDTO->getId().";";
		
			
		echo "<br>".$sql;
		
		$conn = new Conexao();
		
		$mysqli = $conn->Conn();
		
		
			
		if($mysqli->query($sql) === TRUE){
		
			echo "<br>Atualizado com sucesso<br>";
				
		}
		
		$conn->fecharConn();
	}	
}

?>

