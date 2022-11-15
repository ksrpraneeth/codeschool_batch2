<?php

include 'postResponse.php';

$firstName = $_POST['firstName'];
//$lastName = $_POST['lastName'];
$email = $_POST['email'];
//$password = $_POST['password'];

$errorArray = [];

if (strlen($firstName) == 0) {
    array_push($errorArray, "Please enter First Name");
}

if (strlen($email) == 0) {//
    array_push($errorArray,  "Please enter Email");
}

$errorObject = new PostResponse(false,$errorArray);
echo json_encode($errorObject);