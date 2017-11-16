<?php 


require_once("config.php");

//$sql = new Sql();
//$usuarios = $sql->select("SELECT * FROM tb_usuarios");
//echo json_encode($usuarios);

// carrega 1 usuario
//$usr = new Usuario();
//$usr->loadById(4);
//echo $usr;

//carrega lista de usuarios
//$lista = Usuario::getList();
//echo json_encode($lista);

//carrega lista de usuarios buscada pelo login
//$busca = Usuario::search("se");
//echo json_encode($busca);

//carrega 1 usuario pelo login e senha
$usuario = new Usuario();
$usuario->login("bola", "@#@$%");

echo $usuario;

 ?>