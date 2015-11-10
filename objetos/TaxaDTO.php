<?php

class TaxaDTO {

	private $id;
	private $valor;
	private $data;
	private $status;
	
	public function TaxaDTO(){

	}
	
	/**gets e sets**/
	
	//id
	public function setId ($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}
	//valor
	public function setValor ($valor){
		$this->valor = $valor;
	}
	
	public function getValor(){
		return $this->valor;
	}
	//data
	public function setData ($data){
		$this->data = $data;
	}
	
	public function getData(){
		return $this->data;
	}
	//Status - S = sim; N = nao
	public function setStatus ($status){
		$this->status = $status;
	}
	
	public function getStatus(){
		return $this->status;
	}
	/** Fim gets e sets**/
	
}
?>