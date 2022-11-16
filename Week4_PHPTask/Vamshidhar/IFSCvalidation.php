<?php

$errors = [
    "IFSCcode_error" => [],
    "bankDetails" => []
];

$IFSCcode = isset($_POST['IFSCcode']) ? $_POST['IFSCcode']:null ;
$doesErrorExist = false;


if(!$IFSCcode){
    $errors["IFSCcode_error"]="IFSC code is required";
    $doesErrorExist = true;
}else{
        
    if(strlen($IFSCcode)!=11){
        $errors["IFSCcode_error"]="IFSC code should be 11 characters";
        $doesErrorExist = true;
    }

    if(!preg_match("/^[A-Z]{4}0[A-Z0-9]{6}$/",$IFSCcode)){
        $errors["IFSCcode_error"]="Invalid IFSC code";
        $doesErrorExist = true;
    }


}

if($doesErrorExist){
    echo json_encode($errors["IFSCcode_error"]);
    return;
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
    echo json_encode($errors["IFSCcode_error"]);
    return;
}

$errors["bankDetails"] = $bankDetails[$IFSCcode];

echo json_encode($errors);



?>
