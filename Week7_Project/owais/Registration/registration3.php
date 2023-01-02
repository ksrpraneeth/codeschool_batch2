<?php
include '../api/db.php';

//for user credentials

$result = [
    "status" => true,
    "errors" => [
        "userName"=>"",
        "password"=>"",
        "confirmPassword"=>""
    ],
    "message" => "",
    "data" => []
];


//for user name
if(!array_key_exists("userName",$_POST)||strlen($_POST["userName"])==0){
    $result['status'] = false;
    $result['errors']["userName"] = "Please enter user Name";
}

//for password

// $uppercase = preg_match('/^[A-Z]$/',$_POST["password"]);
// $lowercase = preg_match('/^[a-z]$/',$_POST["password"]);
// $number = preg_match('/^[0-9]$/',$_POST["password"]);
// $specialchar = preg_match('/^[^w]$/',$_POST["password"]);

// '/^[A-Za-z0-9^w]{8}$/'

if(!array_key_exists("password",$_POST)||strlen($_POST["password"])==0){
    $result['status'] = false;
    $result['errors']["password"] = "Please enter password";
}

// else if(!preg_match('/^[A-Za-z0-9]{8-12}$/',$_POST["password"])){
//         $result['status'] = false;
//         $result['errors']["password"] = "Password must contain atleast 8 characters and should inculde 1 upper case letter, 1 lower case letter,1 number and 1 special character";
//     }

// else if(!$uppercase && !$lowercase && !$number && !$specialchar && strlen($_POST["password"]< 8)){
//     $result['status'] = false;
//     $result['errors']["password"] = "Password must contain atleast 8 characters and should inculde 1 upper case letter, 1 lower case letter,1 number and 1 special character";
// }

//for confirm password
if(!array_key_exists("confirmPassword",$_POST)||strlen($_POST["confirmPassword"])==0){
    $result['status'] = false;
    $result['errors']["confirmPassword"] = "Please confirm password";
}
else if(strlen($_POST["password"])!=strlen($_POST["confirmPassword"])){
    $result['status'] = false;
    $result['errors']["confirmPassword"] = "Should be same as password";
}

//for printing errors
if( $result['status'] == false){
    echo json_encode($result);
    return;
}


//for inserting values into database table




try{
    $statement = $pdo->prepare("INSERT INTO user_credentials(userName,password,userId) values(?,?,?)");
    $isQueryExecuted = $statement->execute([$_POST['userName'],md5($_POST['password']), $_POST['id']]);

    $statement = $pdo->prepare("INSERT INTO dashboard(balance,saving,credited,debited,user_id) values(1000,1000,1000,0,?)");
    $isQueryExecuted = $statement->execute([$_POST['id']]);
    
    if($isQueryExecuted){
        $result['status'] = true;
        $result['message'] = "Registration Successful";
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


?>