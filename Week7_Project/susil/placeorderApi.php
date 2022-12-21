<?php

include "dbconnect.php";
$userid=$_POST['user_id'];
$addressId=$_POST['address_id'];
// print_r($_POST['items']);
// die()

$statement=$pdo->prepare("INSERT INTO orders (id,orderdate,addressid) values(?,?,?)");
$statement->execute([$_POST['user_id'],date("Y-m-d"),$_POST['address_id']]);
$orderId = $pdo->lastInsertId();


for($i=0;$i<count($_POST['items']);$i++){
   $statement3=$pdo->prepare("insert into orderdetails (orderid,productid,quantity)values(?,?,?)");
   $statement3->execute([$orderId,$_POST['items'][$i]['productid'],$_POST['items'][$i]['quantity']]);
}

//}=
//$result=$statement->fetchAll(PDO::FETCH_ASSO);
//echo json_encode($result);
