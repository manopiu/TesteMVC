<?php
class PedidoDTO {

	private $id;
	private $clienteDTO;
	private $entregadorDTO;
	private $arrayProdutoDTO;	
	private $sessao;
	private $troco;
	private $valorTotal;
	private $dataPedido;
	private $dataEntrega;
	//status P = Pendente / T = transito / C = cancelado / E = entregue
	private $status;
	private $taxa;

	public function PedidoDTO(){

	}

	/**gets e sets**/

	//id
	public function setId ($id){
		$this->id = $id;
	}

	public function getId(){
		$this->id;
	}
	//clienteDTO
	public function setClienteDTO ($cliente){
		$this->clienteDTO = $cliente;
	}
	
	public function getClienteDTO(){
		$this->clienteDTO;
	}
	//entregadorDTO
	public function setEntregadorDTO ($entregador){
		$this->entregadorDTODTO = $entregador;
	}
	
	public function getEntregadorDTO(){
		$this->entregadorDTODTO;
	}
	//sessao
	public function setSessao ($sessao){
		$this->sessao = $sessao;
	}
	
	public function getSessao(){
		$this->sessao;
	}
	//troco
	public function setTroco ($troco){
		$this->troco = $troco;
	}
	
	public function getTroco(){
		$this->troco;
	}
	//valorTotal
	public function setValorTotal($valor){
		$this->valorTotal = $valor;
	}
	
	public function getValorTotal(){
		$this->valorTotal;
	}
	//dataPedido
	public function setDataPedido ($data){
		$this->dataPedido = $data;
	}
	
	public function getDataPedido(){
		$this->dataPedido;
	}
	//dataEnrega
	public function setDataEntrega ($data){
		$this->dataEntrega = $data;
	}
	
	public function getDataEntrega(){
		$this->dataEntrega;
	}
	//status P = / T = / C = cancelado / E = entregue
	public function setStatus($status){
		$this->status = $status;
	}
	
	public function getStatus(){
		$this->status;
	}
	
	//array de produtos
	public function setArrayProdutos($produtos){
		$this->arrayProdutoDTO = $produtos;
	}
	
	public function getArrayProdutos(){
		$this->arrayProdutoDTO;
	}
	
	//Taxa entrega
	public function setTaxa($tx){
		$this->taxa = $tx;
	}
	
	public function getTaxa(){
		$this->$taxa;
	}
	/** Fim dos gets e sets **/
}
?>