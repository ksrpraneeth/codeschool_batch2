<?php
include('dbconnect.php');
$response = [
    'status'=>false,
    'message'=>'',
    'data'=>null
];

if(!array_key_exists('productName',$_POST)){
    $response['status']=false;
    $response['message']="Please enter product name";
    echo json_encode($response);
    return;
}

if(!array_key_exists('categoryId',$_POST)){
    $response['status']=false;
    $response['message']="Please enter category Id";
    echo json_encode($response);
    return;
}

if(!array_key_exists('productImg',$_POST)){
    $response['status']=false;
    $response['message']="Please enter product image";
    echo json_encode($response);
    return;
}
if(!array_key_exists('Description',$_POST)){
    $response['status']=false;
    $response['message']="Please enter Description";
    echo json_encode($response);
    return;    
}
if(!array_key_exists('price',$_POST)){
    $response['status']=false;
    $response['message']="Please enter price";
    echo json_encode($response);
    return;    
}
if(strlen($_POST['productName'])==0){
    $response['status']=false;
    $response['message']="Please enter Product name";
    echo json_encode($response);
    return;
}
if(strlen($_POST['categoryId'])==0){
    $response['status']=false;
    $response['message']="Please enter category Id";
    echo json_encode($response);
    return;
}
if(strlen($_POST['productImg'])==0){
    $response['status']=false;
    $response['message']="Please enter Product Image";
    echo json_encode($response);
    return;
}
if(strlen($_POST['Description'])==0){
    $response['status']=false;
    $response['message']="Please enter description";
    echo json_encode($response);
    return;
}
if(strlen($_POST['price'])==0){
    $response['status']=false;
    $response['message']="Please enter Price";
    echo json_encode($response);
    return;
}
$statement = $pdo->prepare("INSERT INTO products(productname,categoryid ,  productimg ,description,price) values (?,?,?,?,?)");
$isQueryExecuted = $statement->execute([$_POST['productName'], $_POST['categoryId'],$_POST['productImg'],$_POST['Description'],$_POST['price']]);
if($isQueryExecuted){
    $response['status']=true;
    $response['message']="Product added successfull";
    echo json_encode($response);
    return;
}

 