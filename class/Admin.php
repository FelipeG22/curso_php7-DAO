<?php 

class Admin{

	private $id_admin;
	private $nome_completo_admin;
	private $apelido_admin;
	private $login_admin;
	private $senha_admin;
	private $status_admin;

	public function getIdAdmin(){
		return $this->id_admin;
	}

	public function setIdAdmin($idadmin){
		$this->id_admin = $idadmin;
	}

	public function getNomeCom(){
		return $this->nome_completo_admin;
	}

	public function setNomeCom($nomecom){
		$this->nome_completo_admin = $nomecom;
	}

	public function getApelidoAdm(){
		return $this->apelido_admin;
	}

	public function setApelidoAdmin($apelidoAdm){
		$this->apelido_admin = $apelidoAdm;
	}

	public function getLoginAdmin(){
		return $this->login_admin;
	}

	public function setLoginAdmin($loginadmin){
		$this->login_admin = $loginadmin;
	}

	public function getSenhaAdmin(){
		return $this->senha_admin;
	}

	public function setSenhaAdmin($senhaadmin){
		$this->senha_admin = $senhaadmin;
	}

	public function getStatusAdmin(){
		return $this->status_admin;
	}

	public function setStatusAdmin($statusadmin){
		$this->status_admin = $statusadmin;
	}

	public function selectForId($id){

		$sql = new Sql();

		$result = $sql->select("SELECT * FROM cw_admin WHERE id_admin = :ID", array(":ID"=>$id));

		if (count($result) > 0) {
			
			$row = $result[0];

			$this->setIdAdmin($row['id_admin']);
			$this->setNomeCom($row['nome_completo_admin']);
			$this->setApelidoAdmin($row['apelido_admin']);
			$this->setLoginAdmin($row['login_admin']);
			$this->setSenhaAdmin($row['senha_admin']);
			$this->setStatusAdmin($row['status_admin']);
		}
	}

	public static function getListAdmin(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM cw_admin ORDER BY apelido_admin");
	}

	public static function pesquisarAdmin($apelidoAdmin){

		$sql = new Sql();

		return $sql->select("SELECT * FROM cw_admin WHERE apelido_admin LIKE :PESQUISA ORDER BY apelido_admin", array(
			':PESQUISA'=>"%".$apelidoAdmin."%"
		));
	}

	public function logarAdmin($login, $senha){

		$senha = md5($senha);

		$sql = new Sql();

		$result = $sql->select("SELECT * FROM cw_admin WHERE login_admin = :LOGIN AND senha_admin = :SENHA", array(":LOGIN"=>$login, ":SENHA"=>$senha));

		if (count($result) > 0) {
			
			$row = $result[0];

			$this->setIdAdmin($row['id_admin']);
			$this->setNomeCom($row['nome_completo_admin']);
			$this->setApelidoAdmin($row['apelido_admin']);
			$this->setLoginAdmin($row['login_admin']);
			$this->setSenhaAdmin($row['senha_admin']);
			$this->setStatusAdmin($row['status_admin']);
		}else{
			throw new Exception("Login ou senha inválidos!");			
		}		
	}

	public function __toString(){

		return json_encode(array(
			"id_admin"=>$this->getIdAdmin(),
			"nome_completo_admin"=>$this->getNomeCom(),
			"apelido_admin"=>$this->getApelidoAdm(),
			"login_admin"=>$this->getLoginAdmin(),
			"senha_admin"=>$this->getSenhaAdmin(),
			"status_admin"=>$this->getStatusAdmin()
		));		 
	}
}
?>