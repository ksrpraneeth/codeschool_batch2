<?php
$dbServer = 'localhost'; 
$dbDatabase = 'shopping';
$dbPort = '5432';
$dbUsername = 'postgres'; 
$dbPassword = 'postgres';
$dsn = "pgsql:host=$dbServer;port=5432;dbname=$dbDatabase;";
// make a database connection
$pdo = new PDO($dsn, $dbUsername, $dbPassword, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

if (!$pdo) {
    echo "Could not connect to the database";
    return;
}
$response = [
    'status'=>false,
    'message'=>'' 
];

$statement = $pdo->prepare("select productimg,productname,price,productid from Products");
$statement->execute();
$result = $statement->fetchall(PDO::FETCH_ASSOC);
if($result){
    $response['status']=True;
    $response['output']=$result;
    echo json_encode($response);
    return;
}