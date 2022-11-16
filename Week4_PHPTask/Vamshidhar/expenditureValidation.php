<?php

$errors = [
    "expenditureType_error" => [],
    "expenditureType_menu" => []
];

$selectedExpenditureType = isset($_POST['expenditureType']) ? $_POST['expenditureType'] : null;
// echo $selectedExpenditureType ;
$doesErrorExist = false;

if(!$selectedExpenditureType){
    $errors["expenditureType_error"] = "Select an option";
    $doesErrorExist = true;
}

if($doesErrorExist){
    echo json_encode($errors["expenditureType_error"]);
    return;
}

$expenditureType_menu = [
    "Capital Expenditure" => [ 
        "purposeType" => ["Maintain current levels of operation within the organization" , "Expenses to permit future expansion"],        
    ],
    
    "Revenue Expenditure" => [
        "purposeType" => ["Sales costs or All expenses incurred by the firm that are directly tied to the manufacture and selling of its goods or services" , "All expenses incurred by the firm to guarantee the smooth operation"]
    ],
    "Deferred Revenue Expenditure" => [
        "purposeType" => [ "Exorbitant Advertising Expenditures", "Unprecedented Losses", "Development and Research Cost"]

    ]
];

if(!in_array($selectedExpenditureType, array_keys($expenditureType_menu))) {
    $errors["expenditureType_error"]="Option doesn't exist";
    $doesErrorExist = true; 
}
    
  
if($doesErrorExist){
    echo json_encode($errors["expenditureType_error"]);
    return;
}
    
$errors["expenditureType_menu"] = $expenditureType_menu[$selectedExpenditureType];
    
echo json_encode($errors["expenditureType_menu"]);


?>
