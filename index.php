<?php 


require_once("config.php");

//$sql = new Sql();
//$usuarios = $sql->select("SELECT * FROM tb_usuarios");
//echo json_encode($usuarios);

//carrega 1 usuario
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
//$usuario = new Usuario();
//$usuario->login("root", "@#@$%");
//echo $usuario;

//inserindo novos registros no banco
//$aluno = new Usuario("novo","123");
//$aluno->insert();
///echo $aluno;

$usuario = new Usuario();
$usuario->loadById(2);

$usuario->update("professor","b123");

echo $usuario;

 ?>