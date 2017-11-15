<?php 

class Usuario {
	
	private $idusuario;
	private $desclogin;
	private $descsenha;
	private $dtcadastro;

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

			$row = $results[0];

			$this->setIdusuario($row['idusuario']);
			$this->setDesclogin($row['desclogin']);
			$this->setDescsenha($row['descsenha']);
			$this->setDtcadastro(new Datetime($row['dtcadastro']));
		}
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