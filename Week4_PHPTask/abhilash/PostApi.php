<?php

$errorarray = [
  "partyAccountError"=>[],
  "confirmAccountError"=>[],
  "partyNameError"=>[],
  "purposeError"=>[]
];

if (!array_key_exists('partyAccount', $_POST)) {
   $errorarray["partyAccountError"] = " partyAccount Number is required";
   echo json_encode($errorarray);
   return;
}

if (!isset($_POST['partyAccount'])) {
   $errorarray["partyAccountError"]="Please Enter Account No";

}
if (empty($_POST['partyAccount'])) {
   $errorarray["partyAccountError"][]="Party  account Number is empty";
}
$length = strlen($_POST['partyAccount']);

if (($length < 12) || ($length > 22)) {
   $errorarray["partyAccountError"][]="A/C no  be between 12 and 22 digits";

}
// echo $partyAccount = $_POST['partyAccount'];

if (!is_numeric($_POST['partyAccount'])) {
   $errorarray["partyAccountError"][]="A/c number should be numbers only";
   return;
}


// confirm account

if (!array_key_exists('confirmAccount', $_POST)) {
   $errorarray["confirmAccountError"] = " confirm Account Number is required";
   echo json_encode($errorarray);
   return;
}

if (!isset($_POST['confirmAccount'])) {
   $errorarray["confirmAccountError"]="Please enter confirm Account Number";
}
if (empty($_POST['confirmAccount'])) {
   $errorarray["confirmAccountError"][]="Confirm  account Number is empty";
}
if ($_POST['confirmAccount'] != $_POST['partyAccount']) {
   $errorarray["confirmAccountError"][]="confirmAccount should match with partyAccount ";

}

// partyname
if (!array_key_exists('partyName', $_POST)) {
   $errorarray["partyNameError"] = " Party Name is required";
   echo json_encode($errorarray);
   return;
}
if (!isset($_POST['partyName'])) {

   $errorarray["partyNameError"]= "Please Enter Party Name";
}
if (empty($_POST['partyName'])) {
   $errorarray["partyNameError"]="partyName is empty";
}
if (preg_match_all("/^[a-zA-Z0-9]{2,30}/i", ($_POST['partyName']))) {

   $errorarray["partyNameError"] =" Party Name should not be Special Charaters";

}
// purpose

if (!array_key_exists('purpose', $_POST)) {
   $errorarray["purposeError"] = " purpose is required";
   echo json_encode($errorarray);
   return;
}
if (!isset($_POST['purpose'])) {

   $errorarray["purposeError"]="Please Enter purpose";
}
if (empty($_POST['purpose'])) {
   $errorarray["purposeError"][]="purpose is empty";
}
$length = strlen($_POST['purpose']);

if (($length > 500)) {
   $errorarray["purposeError"][]="Maximum Characters shuld be in 500";

}

//  Array calling
if (count($errorarray) > 0) {
   $response = ["status" => false, "message" => $errorarray];
   echo json_encode($response);
   return;
}














// // $partyAccount= ($_POST['partyAccount']);

//  if (preg_match("/[0-9]/",$partyAccount)){
//  echo"A/c number should be numbers only";

//  }
// //if (array_key_exists('partyAccount', $_POST)){ { && array_key_exists('confirmAccount',$_POST) && array_key_exists('partyName', $_POST) ) { else{
//    echo" keys does not exist";
// }
