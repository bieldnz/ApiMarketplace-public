<?php

// Restante da query que vai ser utilizada tanto no select_user quanto no select_verify
$query_prepare = $conn->prepare($query);
$query_prepare->bindParam(":login", $login);
$query_prepare->bindParam(":password", $password);
$query_prepare->execute();

if(($query_prepare) and ($query_prepare->rowCount() != 0)){
    extract($query_prepare->fetch(PDO::FETCH_ASSOC));
    $responce = [
        "id" => $id
    ];
}else{
    $responce = ["msg" => "Não funcionou"];
}
echo json_encode($responce);
http_response_code(200)
?>