<?php


include "db.php";

$result = [
    "status" => true,
    "errors"=>[
        "accountNumber"=>"",
        "amountError"=>""
    ],
    "message"=>"",
    "data"=>""
];

//for account number
if(!array_key_exists("accountNumber", $_POST) || strlen($_POST["accountNumber"]) == 0) {
    $result['status'] = false;
    $result['errors']["accountNumber"] = "Please enter Account Number";
}

//for amountError
if(!array_key_exists("amountError",$_POST)||strlen($_POST["amountError"])==0){
    $result['status'] = false;
    $result['errors']["amountError"] = "Please enter amount";
}


// echo json_encode($result);
// return;


try{
    $statement = $pdo->prepare("select * from beneficiary_details where id = ?");
    $statement->execute([$_POST['id']]);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if(count($result)>0){
        $result['status']=true;
        $result['message']="Money is Transfered";
        echo json_encode($result);
        return;
    }

    else{
        $result['status'] = false;
        $result['message'] = "Invalid Account Number";
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