<?php
include "dbconnection.php";


$status=true;
 if(!array_key_exists('productName',$_POST)){
     $status=false;

 }
 if(!array_key_exists('category',$_POST)){
     $status=false;
 }
 if(!array_key_exists('brand',$_POST)){
    $status=false;
}
if(!array_key_exists('rating',$_POST)){
    $status=false;
}
if(!array_key_exists('productPrice',$_POST)){
    $status=false;
}
if(!array_key_exists('offerPrice',$_POST)){
    $status=false;
}
if(!array_key_exists('imageLink',$_POST)){
    $status=false;
}
if(!array_key_exists('description',$_POST)){
    $status=false;
}


if (!$status){
    $response=["status"=>false,"output"=>"Please Enter all the fields."];
    echo json_encode($response);
    return;
}


$productName=$_POST['productName'];
$category=$_POST['category'];
$brand=$_POST['brand'];
$rating=$_POST['rating'];
$productPrice=$_POST['productPrice'];
$offerPrice=$_POST['offerPrice'];
$imageLink=$_POST['imageLink'];
$description=$_POST['description'];

if (!$productName){
    $status=false;
}

if (!$category){
    $status=false;
}

if (!$brand){
    $status=false;
}
if (!$rating){
    $status=false;
}
if (!$productPrice){
    $status=false;
}
if (!$offerPrice){
    $status=false;
}
if (!$imageLink){
    $status=false;
}
if (!$description){
    $status=false;
}

if(!$status){
    $response=["status"=>false,"output"=>"Please Enter all the fields."];
    echo json_encode($response);
    return;
}



if (!is_numeric($rating)){
    $response=["status"=>false,"output"=>"Please Enter number in rating."];
    echo json_encode($response);
    return;
}

if (!is_numeric($productPrice)){
    $response=["status"=>false,"output"=>"Please Enter Numeric value in Product Price."];
    echo json_encode($response);
    return;
}


if (!is_numeric($offerPrice)){
    $response=["status"=>false,"output"=>"Please Enter Numeric value in Product Price."];
    echo json_encode($response);
    return;
}


if (strlen($description)>128){
    $response=["status"=>false,"output"=>"Please write Descriptionsss within 128 characters."];
    echo json_encode($response);
    return;
}


$statement=$pdo->prepare("INSERT INTO products (productname,category,brand,rating,productprice,offerprice,imagelink,productdescription) VALUES (?,?,?,?,?,?,?,?)");
$statement->execute([$productName,$category,$brand,$rating,$productPrice,$offerPrice,$imageLink,$description]);
$response=["status"=>true,"output"=>"Suceesfully added"];
echo json_encode($response);





