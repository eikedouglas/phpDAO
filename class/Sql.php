<?php

//classe que conecta ao banco, prepara e executa query
class Sql extends PDO {
	private $conn;

	//A cada instancia dessa classe, fazer a conexao com o banco de dados:
	public function __construct(){
		$this->conn = new PDO ("mysql:host=localhost;dbname=dbphp7", "root", "");
	}
	
	//metodo que que seta os parametros
	private function setParams($statement, $parametres = array()){
		//associa os parametros
		foreach ($parametres as $key => $value) {
			$this->setParam($statement, $key, $value);
		}
	} 

	private function setParam($statement, $key, $value) {
		$statement->bindParam($key, $value);
	}
	
	public function query($rawQuery, $params = array ()) {
		//rawQuery: comando sql
		//$params = array (); dados passados em um array
		
		//prepara query
		$stmt = $this->conn->prepare($rawQuery);
		//executa metodo que seta os parametros
		$this->setParams($stmt, $params);
		
		$stmt->execute();
		
		return $stmt;
	}

	public function select ($rawQuery, $params = array()):array{
		$stmt = $this->query($rawQuery, $params);

		return $stmt->fetchAll(PDO::FETCH_ASSOC); //FETCH_ASSOC recupera os dados sem os index deles
	}
}

?>