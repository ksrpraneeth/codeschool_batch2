<?php
include('dbconnect.php');
$response = [
    'status'=>false,
    'message'=>'',
    'data'=>null
];

if(!array_key_exists('categoryName',$_POST)){
    $response['status']=false;
    $response['message']="Please enter category name";
    echo json_encode($response);
    return;
}
if(!array_key_exists('Description',$_POST)){
    $response['status']=false;
    $response['message']="Please enter Description";
    echo json_encode($response);
    return;    
}

if(strlen($_POST['categoryName'])==0){
    $response['status']=false;
    $response['message']="Please enter Category name";
    echo json_encode($response);
    return;
}
if(strlen($_POST['Description'])==0){
    $response['status']=false;
    $response['message']="Please enter description";
    echo json_encode($response);
    return;
}
$statement = $pdo->prepare("INSERT INTO categories (categoryname, description) values (?,?)");
$isQueryExecuted = $statement->execute([$_POST['categoryName'], $_POST['Description']]);
if($isQueryExecuted){
    $response['status']=true;
    $response['message']="Category added successfull";
    echo json_encode($response);
    return;
}
?>