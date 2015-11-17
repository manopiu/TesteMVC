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
	private $formaPagamento;

	public function PedidoDTO(){

	}

	/**gets e sets**/

	//id
	public function setId ($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}
	//clienteDTO
	public function setClienteDTO ($cliente){
		$this->clienteDTO = $cliente;
	}
	
	public function getClienteDTO(){
		return $this->clienteDTO;
	}
	//entregadorDTO
	public function setEntregadorDTO ($entregador){
		$this->entregadorDTO = $entregador;
	}
	
	public function getEntregadorDTO(){
		return $this->entregadorDTO;
	}
	//sessao
	public function setSessao ($sessao){
		$this->sessao = $sessao;
	}
	
	public function getSessao(){
		return $this->sessao;
	}
	//troco
	public function setTroco ($troco){
		$this->troco = $troco;
	}
	
	public function getTroco(){
		return $this->troco;
	}
	//valorTotal
	public function setValorTotal($valor){
		$this->valorTotal = $valor;
	}
	
	public function getValorTotal(){
		return $this->valorTotal;
	}
	//dataPedido
	public function setDataPedido ($data){
		$this->dataPedido = $data;
	}
	
	public function getDataPedido(){
		return $this->dataPedido;
	}
	//dataEnrega
	public function setDataEntrega ($data){
		$this->dataEntrega = $data;
	}
	
	public function getDataEntrega(){
		return $this->dataEntrega;
	}
	//status P = pendente / T = transito / C = cancelado / E = entregue
	public function setStatus($status){
		$this->status = $status;
	}
	
	public function getStatus(){
		return $this->status;
	}
	
	//array de produtos
	public function setArrayProdutos($produtos){
		$this->arrayProdutoDTO = $produtos;
	}
	
	public function getArrayProdutos(){
		return $this->arrayProdutoDTO;
	}
	
	//Taxa entrega
	public function setTaxa($tx){
		$this->taxa = $tx;
	}
	
	public function getTaxa(){
		return $this->taxa;
	}
	
	//Forma de pagamento
	//C = cartao / D = dinheiro
	public function setFormaPagamento($pagamento){
		$this->formaPagamento = $pagamento;
	}
	
	
	public function getFormaPagamento(){
		return $this->formaPagamento;
	}
	/** Fim dos gets e sets **/
}
?>