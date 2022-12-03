<?php

include "dbconnection.php";



$statement=$pdo->prepare("SELECT  id, productname , category , brand , rating , productprice , offerprice , productdescription,imagelink  FROM products");
$statement->execute();


$result= $statement->fetchAll(PDO::FETCH_ASSOC);


$response=["status"=>true,"output"=>$result];
echo json_encode($response);
return;

