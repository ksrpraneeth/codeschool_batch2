<?php
    $result = [
        "status" => false,
        "error" => '',
        "data" => []
    ];

    // if expenditure type isn't received from frontend or the user didn't select the value  
    if(!array_key_exists("expenditure_type", $_POST) || $_POST["expenditure_type"] == ""){
        $result["status"] = false;
        $result["error"] = 'Please Select Expenditure Type';
        echo json_encode($result);
        return;
    }

    // if received
    $expenditureType = $_POST["expenditure_type"];

    $purposeTypeValues = [
        "Capital Expenditure" => ["Maintain current levels of operation within the organization", "Expenses to permit future expansion"],
        "Revenue Expenditure" => ["Sales costs or All expenses incurred by the firm that are directly tied to the manufacture and selling of its goods or services", "All expenses incurred by the firm to guarantee the smooth operation"],
        "Deferred Revenue Expenditure" => ["Exorbitant Advertising Expenditures", "Unprecedented Losses", "Development and Research Cost"]
    ];

    // return corresponding values
    $result["status"] = true;
    $result["error"] = '';
    $result["data"] = $purposeTypeValues[$expenditureType];
    echo json_encode($result);
    return;
?>