<?php
include('dbconnect.php');
$response = [];
$statement = $pdo->prepare("select status from deliveryday where dayid=?");
$statement->execute([$_POST['allowtimeid']]);
$result = $statement->fetchall(PDO::FETCH_ASSOC);
//  print_r($result);
//  die();
//  echo($result[0]['status']);
if($result[0]['status']==0){
    $statement1 = $pdo->prepare("update deliveryday set status =1 where dayid=?");
    $statement1->execute([$_POST['allowtimeid']]);
    $result1 = $statement->fetchall(PDO::FETCH_ASSOC);
    // print_r($result1);
    // die();
}
else{
    $statement2 = $pdo->prepare("update deliveryday set status =0 where dayid=?");
    $statement2->execute([$_POST['allowtimeid']]);
    $result2 = $statement->fetchall(PDO::FETCH_ASSOC);
}