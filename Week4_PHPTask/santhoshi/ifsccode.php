<?php
$errors = [];

if(!isset($_POST['ifscCode'])){
    array_push($errors, "Please enter your IFSC CODE");
    echo json_encode([
        'status' => false,
        'error' => $errors
    ]);
    return;
}

$ifscCode = $_POST['ifscCode'];

if(array_key_exists("ifscCode",$_POST))
{
    $range = strlen($_POST["ifscCode"]);
    if ($range != 11){
        array_push($errors,"IFSC CODE should be 11 characters long");
    }
    $regex = "[[A-Z]{4}0[A-Z0-9]{6}]";
    if (!preg_match($regex, $_POST["ifscCode"])){
        array_push($errors,"IFSC CODE is invalid");
    } 
}

$banknamebranchname =[
    "SBIN0123451" => [
        'bankName'=> 'SBI',
        'bankBranch'=> 'Wanaparthy',
    ],
    "DBSL0123456" => [ 
        'bankName'=> 'DBS',
        'bankBranch'=> 'Rangareddy',
    ],
    "KARB0123458" => [
        'bankName'=> 'Karurvyshya',
        'bankBranch'=> 'Nalgonda',
    ]
];

if(count($errors) || !array_key_exists($ifscCode, $banknamebranchname)) {
    echo json_encode([
        'status' => false,
        'error' => $errors
    ]);
}

else {
    echo json_encode([
        'status' => true,
        'bankDetails' => $banknamebranchname[$ifscCode]
    ]);
}
?>
