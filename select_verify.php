<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: *");

include_once "conexao.php";
//Dados usados para verificar se o login ou a senha, que o usuário está tentando criar
//já existem no banco de dados. >------------------------------------------------------------
$login = $_POST["login"];
$password = $_POST["password"];
//------------------------------------------------------------------------------------------<

$query = "SELECT id FROM users WHERE login=:login OR password=:password";
include_once("select.php")
?>