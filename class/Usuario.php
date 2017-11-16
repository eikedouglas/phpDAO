<?php 

class Usuario {
	
	private $idusuario;
	private $desclogin;
	private $descsenha;
	private $dtcadastro;

	public function __construct($login = "", $password = ""){
		$this->setDesclogin($login);
		$this->setDescsenha($password);
	}

	public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($valor){
		$this->idusuario = $valor;
	}
	public function getDesclogin(){
		return $this->desclogin;
	}

	public function setDesclogin($valor){
		$this->desclogin = $valor;
	}
	public function getDescsenha(){
		return $this->descsenha;
	}

	public function setDescsenha($valor){
		$this->descsenha = $valor;
	}
	public function getDtcadastro(){
		return $this->dtcadastro;
	}

	public function setDtcadastro($valor){
		$this->dtcadastro = $valor;
	}
	//metodo que faz um select dos dados do usuario no banco e seta os atribudos
	public function loadById($Id){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
				":ID"=>$Id	
		));

		if(count($results) > 0) {
			$this->setDados($results[0]);
		}
	}

	public static function getList(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios ORDER BY desclogin;");

	}

	public static function search($login){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios WHERE desclogin LIKE :SEARCH ORDER BY desclogin", array(
			':SEARCH'=>"%".$login."%"
		));

	}

	public function login($login, $password){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE desclogin = :LOGIN AND descsenha = :PASSWORD", array(

			":LOGIN"=>$login,
			"PASSWORD"=>$password
		));

		if(count($results) > 0) {

			$this->setDados($results[0]);

		} else {

			throw new Exception("Login e/ou senha invalidos");
			
		}

	}

	public function setDados($dados){
		$this->setIdusuario($dados['idusuario']);
		$this->setDesclogin($dados['desclogin']);
		$this->setDescsenha($dados['descsenha']);
		$this->setDtcadastro(new Datetime($dados['dtcadastro']));
	}

	public function insert(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)",array(
			":LOGIN"=>$this->getDesclogin(),
			":PASSWORD"=>$this->getDescsenha()
		));

		if(count($results) > 0) {

			$this->setDados($results[0]);

		}

	}

	public function update($login, $password){

		$this->setDesclogin($login);
		$this->setDescsenha($password);

		$sql = new Sql();

		$sql->query("UPDATE tb_usuarios SET desclogin=:LOGIN, descsenha=:PASSWORD WHERE idusuario=:ID", array(
			":LOGIN"=>$this->getDesclogin(),
			":PASSWORD"=>$this->getDescsenha(),
			":ID"=>$this->getIdusuario()	
		));

	}

	public function __toString(){
		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"desclogin"=>$this->getDesclogin(),
			"descsenha"=>$this->getDescsenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
		));
	}



}

 ?>