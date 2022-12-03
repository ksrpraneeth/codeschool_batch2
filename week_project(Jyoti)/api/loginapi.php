<?php

include "dbconnection.php";


$status=true;
 if(!array_key_exists('mobilenumber',$_POST)){
     $status=false;

 }
 if(!array_key_exists('password',$_POST)){
     $status=false;
 }


if (!$status){
    $response=["status"=>false,"output"=>"Please Enter correct Phone Number and Password"];
    echo json_encode($response);
    return;
}

// die('aa');
$phoneNumber=$_POST['mobilenumber'];
$password=$_POST['password'];

if (!$phoneNumber){
    $status=false;
}

if (!$password){
    $status=false;
}
if (!$status){
    $response=["status"=>false,"output"=>"Please Enter correct Phone Number and Password"];
    echo json_encode($response);
    return;
}


$statement=$pdo->prepare("SELECT * FROM users where phonenumber = ? and password= ?");
$statement->execute([$phoneNumber,$password]);

$result= $statement->fetchAll(PDO::FETCH_ASSOC);
if(count($result)==0){
    $response['status']=false;
    $response['message']="Mobile Number or Password is wrong";
    echo json_encode($response);
    return;

}


$bytes = random_bytes(5);
$token=  bin2hex($bytes);


$statement2=$pdo->prepare("update users set token=? where id=?");
$statement2->execute([$token,$result[0]['id']]);




$statement3=$pdo->prepare("select * from users where token=?");
$statement3->execute([$token]);
$result2=$statement3->fetchAll(PDO::FETCH_ASSOC);




$response=["status"=>true,"output"=>$result2];
echo json_encode($response);

