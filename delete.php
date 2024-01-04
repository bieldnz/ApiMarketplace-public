<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

include "conexao.php";

$id = filter_input(INPUT_GET, "id");

$public_id_foto = $_POST["public_id_foto"];

$cloudinary->destroy($public_id_foto);

$query_delete = "DELETE FROM products WHERE id=:id LIMIT 1";
$delete_delete_product = $conn->prepare($query_delete);
$delete_delete_product->bindParam(":id", $id, PDO::PARAM_INT);
$delete_delete_product->execute();

$response = ["MSG" => "DS"];

echo json_encode($response)

?>