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
		$this->id;
	}
	//valor
	public function setValor ($valor){
		$this->valor = $valor;
	}
	
	public function getValor(){
		$this->valor;
	}
	//data
	public function setData ($data){
		$this->data = $data;
	}
	
	public function getData(){
		$this->data;
	}
	//Status - S = sim; N = nao
	public function setStatus ($status){
		$this->status = $status;
	}
	
	public function getStatus(){
		$this->status;
	}
	/** Fim gets e sets**/
	
}
?>