<?php

class ClienteDTO {
	
	private $usu_id;
	private $usu_nome;
	private $usu_login;
	private $usu_senha;
	private $usu_telefone;
	private $usu_endereco;
	private $usu_pt_referencia;
	private $usu_tipo;
	
	public function ClienteDTO(){
		
	}
	
	public function Cliente($id, $nome, $login, $senha, $telefone, 
			$endereco, $pt_referencia, $tipo){
		$this->setUsu_id($id);
		$this->setNome($nome);
		$this->setLogin($login);
		$this->setSenha($senha);
		$this->setUsu_telefone($telefone);
		$this->setUsu_endereco($endereco);
		$this->setUsu_pt_referencia($pt_referencia);
		$this->setUsu_tipo($tipo);
	}
	
	public function ClienteCadastro($nome, $login, $senha, $telefone, 
			$endereco, $pt_referencia, $tipo){
		$this->setNome($nome);
		$this->setLogin($login);
		$this->setSenha($senha);
		$this->setUsu_telefone($telefone);
		$this->setUsu_endereco($endereco);
		$this->setUsu_pt_referencia($pt_referencia);
		$this->setUsu_tipo($tipo);
	}
	
	//get e set para usuario_id
	public function setUsu_id($usu_id){
		$this->usu_id = $usu_id;
	}
	/**
	 * return string
	 */
	public function getUsu_id(){
		return $this->usu_id;
	}
	
//---------------------------------	
	
	public function setNome($nome){
		$this->usu_nome = $nome;
	}
	/**
	 * return string
	 */
	public function getNome(){
		return $this->usu_nome;
	}
	
	//---------------------------------
	
	public function setLogin($login){
		$this->usu_login = $login;
	}
	/**
	 * return string
	 */
	public function getLogin(){
		return $this->usu_login;
	}
	
	//---------------------------------
	
	public function setSenha($senha){
		$this->usu_senha = $senha;
	}
	/**
	 * return string
	 */
	public function getSenha(){
		return $this->usu_senha;
	}
	
	//--------------------------------
	//get e set para usuario_telefone
	public function setUsu_telefone($usu_telefone){
		$this->usu_telefone = $usu_telefone;
	}
	/**
	 * return string
	 */
	public function getUsu_telefone(){
		return $this->usu_telefone;
	}
	
	//--------------------------------
	//get e set para usuario_telefone
	public function setUsu_endereco($usu_endereco){
		$this->usu_endereco = $usu_endereco;
	}
	/**
	 * return string
	 */
	public function getUsu_endereco(){
		return $this->usu_endereco;
	}
	
	//--------------------------------
	//get e set para usuario_ponto_referencia
	public function setUsu_pt_referencia($usu_referencia){
		$this->usu_pt_referencia = $usu_referencia;
	}
	/**
	 * return string
	 */
	public function getUsu_pt_referencia(){
		return $this->usu_pt_referencia;
	}
	
	//--------------------------------
	//get e set para usuario_tipo (C= Cliente e F = Funcionario
	public function setUsu_tipo($usu_tipo){
		$this->usu_tipo = $usu_tipo;
	}
	/**
	 * return string
	 */
	public function getUsu_tipo(){
		return $this->usu_tipo;
	}
}

?>