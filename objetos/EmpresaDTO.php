<?php
class EmpresaDTO {

	private $id;
	private $nome;
	private $cnpj;
	private $endereco;
	private $telefone;
	private $email;
	//status S = sim / N = nao
	private $status;

	public function EmpresaDTO(){

	}

	/**gets e sets**/

	//id
	public function setId ($id){
		$this->id = $id;
	}

	public function getId(){
		$this->id;
	}
	
	//nome
	public function setNome ($nome){
		$this->nome = $nome;
	}
	
	public function getNome(){
		$this->nome;
	}
	//cnpj
	public function setCNPJ ($cnpj){
		$this->cnpj = $cnpj;
	}
	
	public function getCNPJ(){
		$this->cnpj;
	}
	//enderco
	public function setEndereco ($endereco){
		$this->endereco = $endereco;
	}
	
	public function getEndereco(){
		$this->endereco;
	}
	//telefone
	public function setTelefone ($telefone){
		$this->telefone = $telefone;
	}
	
	public function getTelefone(){
		$this->telefone;
	}
	//email
	public function setEmail ($email){
		$this->email = $email;
	}
	
	public function getEmail(){
		$this->email;
	}
	//status S = sim / N = nao 
	public function setStatus($status){
		$this->status = $status;
	}
	
	public function getStatus(){
		$this->status;
	}
	/** fim dos gets e sets **/
}
?>