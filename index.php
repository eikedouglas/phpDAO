<?php 


require_once("config.php");

//$sql = new Sql();
//$usuarios = $sql->select("SELECT * FROM tb_usuarios");
//echo json_encode($usuarios);

$usr = new Usuario();

$usr->loadById(4);

echo $usr;

 ?>