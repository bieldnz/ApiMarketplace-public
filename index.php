<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: *");

include_once "conexao.php";

$users_id = $_POST['users_id'];

$query_products = "SELECT * FROM products WHERE users_id=:users_id ORDER BY id DESC";
$result_products = $conn->prepare($query_products);
$result_products->bindParam(":users_id", $users_id, PDO::PARAM_INT);
$result_products->execute();

if ($result_products) {
    if (($result_products->rowCount() != 0)) {
        $products_list = $result_products->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $products_list = [];
    }
} else {
    $products_list = [];
}
echo json_encode($products_list);
http_response_code(200);
