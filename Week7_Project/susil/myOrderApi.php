<?php
include "dbconnect.php";
$response = [];
 
$statement = $pdo->prepare("select o.orderid,p.productname,p.productimg,od.quantity  from orders as o join orderdetails as od on o.orderid=od.orderid join products as p on p.productid=od.productid;");
$statement->execute();
$result = $statement->fetchall(PDO::FETCH_ASSOC);

//$response['output']=$result;
 //json_encode($result)


$data = [];


for($i=0;$i<count($result);$i++){
	$results = $result[$i]; 
    $groupBy = $results['orderid']; // 1,2
	if(!isset($data[$groupBy])){
    	$data[$groupBy] = [];
    }
    array_push($data[$groupBy],$results);
}

echo json_encode($data);
