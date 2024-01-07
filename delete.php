<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

include "conexao.php";

//Recebo o id do projeto que vai ser excluido
$id = filter_input(INPUT_GET, "id");

//public_id_foto é a string necessário para realizar a exclusão da imagem no coudinary
$public_id_foto = $_POST["public_id_foto"];

//Realizo a destruição da imagem
$cloudinary->destroy($public_id_foto);

//Esta é a query que realiza o DELETE no banco de dados------------------------------>
$query_delete = "DELETE FROM products WHERE id=:id LIMIT 1";
$delete_delete_product = $conn->prepare($query_delete);
$delete_delete_product->bindParam(":id", $id, PDO::PARAM_INT);
$delete_delete_product->execute();
//------------------------------------------------------------------------------------<

$response = ["MSG" => "DS"];

echo json_encode($response)

?>