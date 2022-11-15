<?php
$errors = [];

if (!isset($_POST["ifscCode"])){
    array_push($errors, "Please enter your IFSC CODE");
}
$range =strlen($_POST['ifscCode']);
  if ($range != 11){
    array_push($errors,"IFSC CODE should be 11 characters long");
}
$regex = "[[A-Z]{4}0[A-Z0-9]{6}]";
if (!preg_match($regex, $_POST['ifscCode'])){
    array_push($errors,"IFSC CODE is invalid");
}
$ifscCode= $_POST["ifscCode"];
   $banknamebranchname =[
    "SBIN0123451" => [
        'Bank name'=> 'SBI',
        'Bank branch'=> 'Wanaparthy',
    ],
    "DBSL0123456" => [ 
        'Bank name'=> 'DBS',
        'Bank branch'=> 'Rangareddy',
    ],
    "KARB0123458" => [
        'Bank name'=> 'Karurvyshya',
        'Bank branch'=> 'Nalgonda',
    ]
  ];
  echo json_encode($banknamebranchname[$ifscCode]);


// print_r($errors);
?>
<!-- '^[A-Z]{4}0[A-Z0-9]{6}$' -->