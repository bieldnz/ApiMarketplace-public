<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: *");

include_once "conexao.php";

//Dados que vão ser usados para fazer a verificação do
//login e da senha do usuário antes dele entrar na conta >----------------------------
$login = $_POST["login"];
$password = $_POST["password"];
//-----------------------------------------------------------------------------------------<

//Query para realizar a verificação
$query = "SELECT id FROM users WHERE login=:login AND password=:password";
include_once("select.php")
?>