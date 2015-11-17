<?php

include '../config/includes/Conexao.php';
require_once '../objetos/ProdutoDTO.php';


class ProdutoModel{
	
	//buscar um produto específico
	public function buscarProduto($id){
		echo 'buscarProduto';
			
		$sql = "SELECT * FROM `tb_produto` WHERE prod_id =" . $id . ";";
		
		$conn = new Conexao();
		
		$query = $conn->Conn();
		
		//criar um array que irá receber a lista de produtos
		$produtoDTO = new ProdutoDTO();
			
		if($resultado = $query->query($sql)){
				
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
	
	//buscar todos os produtos
	public function buscarProdutos(){
	
	}
	
	//buscar produto por texto
	public function buscarProdutosTexto($texto){
	
	}
	
	//cadastrar produto
	public function cadastrarProduto(){
	
	}
	
	//atualizar produto
	public function atualizarProduto(){
	
	}
	
	
	
}

?>

