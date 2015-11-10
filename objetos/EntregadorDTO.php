<?php
class EntregadorDTO {

	private $id;
	private $empresaDTO;
	private $nome;
	private $cpf;
	private $rg;
	private $telefone;
	//status S = sim / N = nao
	private $status;

	public function EntregadorDTO(){

	}

	/**gets e sets**/

	//id
	public function setId ($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}
	//empresaDTO
	public function setEmpresaDTO ($empresa){
		$this->empresaDTO = $empresa;
	}
	
	public function getEmpresaDTO(){
		return $this->empresaDTO;
	}
	//nome
	public function setNome ($nome){
		$this->nome = $nome;
	}
	
	public function getNome(){
		return $this->nome;
	}
	//cpf
	public function setCPF ($cpf){
		$this->cpf = $cpf;
	}
	
	public function getCPF(){
		return $this->cpf;
	}
	//rg
	public function setRG ($rg){
		$this->rg = $rg;
	}
	
	public function getRG(){
		return $this->rg;
	}
	//telefone
	public function setTelefone ($telefone){
		$this->telefone = $telefone;
	}
	
	public function getTelefone(){
		return $this->telefone;
	}
	//status S = sim / N = nao 
	public function setStatus($status){
		$this->status = $status;
	}
	
	public function getStatus(){
		return $this->status;
	}
	/** fim dos gets e sets **/
}
?>