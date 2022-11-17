<?php
$errors = [
    "headOfAccount_error" => [],
    "hoaDetails" => []
];

$selectedHoa = isset($_POST['headOfAccount']) ? $_POST['headOfAccount'] : null;
$doesErrorExist = false;

if(!$selectedHoa){
    $errors["headOfAccount_error"] = "Select an option";
    $doesErrorExist = true;
}

if($doesErrorExist){
    return echo json_encode($errors);
}

$hoaDetails = [
    "0853001020002000000NVN" => [
        "balance" => "1000000 ",
        "LOC" => "5000"
    ],

    "8342001170004001000NVN" => [
        "balance" => "1008340",
        "LOC" => "4000"
    ],

    "2071011170004320000NVN" => [
        "balance" => "14530000",
        "LOC" => "78000"
    ],

    "8342001170004002000NVN" => [
        "balance" => "1056400",
        "LOC" => "34000"

    ],

    "2204000030006300303NVN" => [
        "balance" => "123465400",
        "LOC" => "5000"

    ],
    "undefined" =>[
        "balance" => " ",
        "LOC" => " "

    ]

    ];


if(!in_array($selectedHoa, array_keys($hoaDetails))) {
        $errors["headOfAccount_error"]="Option doesn't exist";
        $selectedHoa = "undefined";
        $errors["hoaDetails"] = $hoaDetails[$selectedHoa];
        $doesErrorExist = true; 
}
    
  
if($doesErrorExist){
    return echo json_encode($errors);
}
    
$errors["hoaDetails"] = $hoaDetails[$selectedHoa];
    
echo json_encode($errors);
    
    
?>
