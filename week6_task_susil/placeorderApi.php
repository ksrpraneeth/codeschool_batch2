<?php

include "dbconnect.php";
$id=$_POST['id']['id'];

for($i=0;$i<$_POST['item'];$i++){
    $statement=$pdo->prepare("insert into orders (id,orderdate,productid,quantity) values(?,GETDATE(),?,?)");
$statement->execute([$id,$_POST[$i]['productid'],$_POST[$i]['quantity']]);
}

$result=$statement->fetchAll(PDO::FETCH_ASSO);
echo json_encode($result);