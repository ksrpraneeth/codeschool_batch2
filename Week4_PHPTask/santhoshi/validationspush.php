<?php
$errors = [];
// party account number
if(array_key_exists("partyAccountnumber", $_POST)){
    // echo "key exists"; 
    if (!isset($_POST["partyAccountnumber"])){
        array_push($errors,"please enter party account number");
    }
    else if(!is_numeric($_POST["partyAccountnumber"])){
        array_push($errors, "Enter only numbers");
    }
    $range =strlen($_POST["partyAccountnumber"]);
     if(($range < 12)|| ($range >22) ){
        array_push($errors,"Account number should be between 12 and 22");
    }
 }   if(array_key_exists("confirmAccountnumber", $_POST)){
    // echo "key exists"; 
    if(!isset($_POST['confirmAccountnumber'])){
        array_push($errors, 'Confirm the party account number');
    
    }
    else if($_POST["partyAccountnumber"] != $_POST["confirmAccountnumber"]){
    
        array_push($errors,'Account number doesnot match');
    }
 }else {
    // echo "key doesnot exists"; 
 }
//  else {
//     echo "key doesnot exists"; 
//  }

 // partyname
 if(array_key_exists("partyname", $_POST)){
    // echo "key exists"; 
 $partyname =$_POST["partyname"];
if (!isset ($partyname)){
    array_push($errors,"Enter party Name");
}
if (preg_match("/[^a-z0-9A-Z]/",$partyname)){
    array_push($errors,"Party name shouldnot contain special characters");
}
 }else {
    // echo "key doesnot exists"; 
 } 


// purpose
if(array_key_exists("purpose",$_POST)){
    // echo "key exists";
if (!isset($_POST["purpose"])){
    array_push($errors, "Please enter your purpose");
}
$range = strlen($_POST["purpose"]);
 if(($range < 0)|| ($range >10) ){
    array_push($errors,"Purpose should be between 0 and 10 characters");
}
} else {
    // echo "key doesnot exists";
}

// partyamount
// if(!isset($_POST['partyAmount'])){
//     array_push($errors,"Please enter Party Amount");
// }
// $amount = $_POST['partyAmount'];
// die(var_dump($amount));
//  if(!is_int($amount)){
//      array_push($errors,"Amount should not be in fractions");
//  }

if(count($errors)>0){
    $response = ["status"=>false,"message"=>$errors];
    echo json_encode($response);
    return;

}else {
    $response = ["status"=>true,"message"=>"Success"];
    echo json_encode($response);
    return;
    
}

// print_r($errors);
