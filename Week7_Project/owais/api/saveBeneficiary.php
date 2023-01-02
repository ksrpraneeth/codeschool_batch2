<?php

include 'db.php';

$result = [
    "status" => true,
    "error"=>[
        "beneficiaryName"=>"",
        "ifscCode"=>"",
        "beneficiaryAccountNumber"=>"",
        "confirmAccountNumber"=>""
    ],
    "message"=>"",
    "data"=>""
];

//for Beneficiary Name

if(array_key_exists("beneficiaryName",$_POST) || strlen($_POST["beneficiaryName"]==0)){
    $result['status'] =false;
    $result['error']["beneficiaryName"] = "Please enter the Beneficiary Name";
}

//for IFSC Code

if(array_key_exists("ifscCode",$_POST) || strlen($_POST["ifscCode"]==0)){
    $result['status'] =false;
    $result['error']["ifscCode"] = "Please enter the IFSC Code";
}

//for account number

if(array_key_exists("beneficiaryAccountNumber",$_POST) || strlen($_POST["beneficiaryAccountNumber"]==0)){
    $result['status'] =false;
    $result['error']["beneficiaryAccountNumber"] = "Please enter the Beneficiary Account Number";
}


//for confirm account number

if(array_key_exists("confirmAccountNumber",$_POST) || strlen($_POST["confirmAccountNumber"]==0)){
    $result['status'] =false;
    $result['error']["confirmAccountNumber"] = "Please enter Confirm Account Number";
}

if ($result["status"] = false) {
    echo json_encode($result);
    return;
}




// $statement = $pdo->prepare('select id from customer_details where id =?');

// $statement->execute([$_POST['id']]);

// $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC)[0];

// if(!$resultSet){
//     $result['status']=false;
//     $result['message']="Beneficiary is invalid";
//     echo json_encode($result);
//     return;
// }
try{

$statement = $pdo->prepare("INSERT INTO beneficiary_details (beneficiaryname,ifsccode,beneficiaryaccountnumber,beneficiaryid) values (?,?,?,?)");

$isQueryExecuted = $statement->execute([$_POST['beneficiaryName'],$_POST['ifscCode'],$_POST['beneficiaryAccountNumber'],$_POST['id']]);


        if($isQueryExecuted){
            $result['status']=true;
            $result['message']="Beneficiary Added Successfully";
            echo json_encode($result);
            return;
        }

}
catch(PDOException $e){
    die($e->getMessage());
}
finally {
    if ($pdo) {
        $pdo = null;
    }
}