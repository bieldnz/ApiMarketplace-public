<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Access-Control-Allow-Origin:* ");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

include 'conexao.php';

$foto = $_POST["foto"];
$name = $_POST['name'];
$descricao = $_POST['descricao'];
$categorias = $_POST['categorias'];
$preco = $_POST['preco'];
$users_id = (int)$_POST['users_id'];
$public_id = $_POST['public_id'];

$result = "INSERT INTO products (name, preco, descricao, foto, categorias, users_id, public_id_foto) VALUES (:name, :preco, :descricao, :foto, :categorias, :users_id, :public_id_foto)";
$insert_products = $conn->prepare($result);
$insert_products->bindParam(":name", $name, PDO::PARAM_STR);
$insert_products->bindParam(":preco", $preco, PDO::PARAM_STR);
$insert_products->bindParam(":descricao", $descricao, PDO::PARAM_STR);
$insert_products->bindParam(":foto", $foto, PDO::PARAM_STR);
$insert_products->bindParam(":categorias", $categorias, PDO::PARAM_STR);
$insert_products->bindParam(":users_id", $users_id, PDO::PARAM_INT);
$insert_products->bindParam(":public_id_foto", $public_id, PDO::PARAM_STR);

$insert_products->execute();

if ($insert_products) {
    $response = [
        "msg" => "funcionou"
    ];
} else {
    $response = [
        "msg" => "Nao funcionou"
    ];
}

echo json_encode($response);
