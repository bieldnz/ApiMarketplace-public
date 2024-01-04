<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: *");

include_once "conexao.php";

$id = filter_input(INPUT_GET, "id");

$nome = $_POST["name"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$categorias =$_POST["categorias"];
$foto = $_POST["foto"];
$public_id_foto = $_POST['public_id_foto'];
$old_public_id_foto = $_POST['old_public_id_foto'];

$cloudinary->destroy($old_public_id_foto);

$query = "UPDATE products SET name=:name, descricao=:descricao, preco=:preco, foto=:foto, categorias=:categorias, public_id_foto=:public_id_foto WHERE id=:id";
$query_product = $conn->prepare($query);
$query_product->bindParam(":id", $id, PDO::PARAM_INT);
$query_product->bindParam(":name", $nome, PDO::PARAM_STR);
$query_product->bindParam(":descricao", $descricao, PDO::PARAM_STR);
$query_product->bindParam(":preco", $preco, PDO::PARAM_STR);
$query_product->bindParam(":categorias", $categorias, PDO::PARAM_STR);
$query_product->bindParam(":foto", $foto);
$query_product->bindParam(":public_id_foto",$public_id_foto, PDO::PARAM_STR);

$query_product->execute();

if ($query_product) {
    $response = [
        "ID" => $id,
        "nome" => $nome,
        "descrição" => $descricao,
        "preco" => $preco,
        "foto" => $foto
    ];
    $response2 = [
        "MSG" => "Funcionou"
    ];
} else {
    $response = [
        "MSG" => "Dados não enviados"
    ];
}

echo json_encode($response);
echo json_encode($response2);
