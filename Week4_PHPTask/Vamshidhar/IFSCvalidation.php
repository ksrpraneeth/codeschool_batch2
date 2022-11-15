<?php

$errors = [
    "IFSCcode_error" => [],
    "bankDetails" => []
];
$doesErrorExist = false;


if(!array_key_exists('IFSCcode',$_POST)){
    $errors["IFSCcode_error"]="IFSC code key doesn't exist";
    $doesErrorExist = true;

}

if($doesErrorExist){
    echo json_encode($errors);
    return;
}

//if key exists
$IFSCcode = $_POST['IFSCcode'];

if(strlen($IFSCcode)!=11){
    $errors["IFSCcode_error"]="IFSC code should be 11 characters";
    $doesErrorExist = true;
}

if(!preg_match("/^[A-Z]{4}0[A-Z0-9]{6}$/",$IFSCcode)){
    $errors["IFSCcode_error"]="Invalid IFSC code";
    $doesErrorExist = true;
}



$bankDetails = [
    "SBIN0123456" => [
        "bankName" => "SBI Bank",
        "bankBranch" => "Filmnagar"
    ],

    "KKBK0123456" => [
        "bankName" =>  "Kotak Mahindra Bank",
        "bankBranch" =>  "Mehdipatnam"
    ],

    "ICIC0123456" => [
        "bankName" =>  "ICICI Bank",
        "bankBranch" =>  "Kukatpally"
    ],

    "HDFC0123456" => [
        "bankName" =>  "HDFC Bank",
        "bankBranch" =>  "Karmanghat"
    ]
    ];

if(!array_key_exists($IFSCcode,$bankDetails)){
    $errors["IFSCcode_error"]="IFSC code doesn't exist";
    $doesErrorExist = true;
}

if($doesErrorExist){
    echo json_encode($errors);
    return;
}

$errors["bankDetails"] = $bankDetails[$IFSCcode];

echo json_encode($errors);



?>
