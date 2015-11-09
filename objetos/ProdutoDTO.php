<?php
class ProdutoDTO {

	private $id;
	private $nome;
	//tamanho P = pequeno / M = medio / G = grande
	private $tamanho;
	private $custo;
	//status S = sim / N = nao
	private $status;
	private $descricao;
	private $quantidade;

	public function ProdutoDTO(){

	}

	/**gets e sets**/

	//id
	public function setId ($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}
	//nome
	public function setNome ($nome){
		$this->nome = $nome;
	}
	
	public function getNome(){
		return $this->nome;
	}
	//tamanho P = peq / M = med / G = gde
	public function setTamanho ($tamanho){
		$this->tamanho = $tamanho;
	}
	
	public function getTamanho(){
		return $this->tamanho;
	}
	//custo
	public function setCusto ($custo){
		$this->custo = $custo;
	}
	
	public function getCusto(){
		return $this->custo;
	}
	//Status - S = sim; N = nao
	public function setStatus ($status){
		$this->status = $status;
	}
	
	public function getStatus(){
		return $this->status;
	}
	//descricao
	public function setDescricao ($descricao){
		$this->descricao = $descricao;
	}
	
	public function getDescricao(){
		return $this->descricao;
	}
	//quantidade em um pedido
	public function setQuantidade ($qtd){
		$this->quantidade = $qtd;
	}
	
	public function getQuantidade(){
		return $this->quantidade;
	}
	/** Fim dos gets e sets**/
}
?>