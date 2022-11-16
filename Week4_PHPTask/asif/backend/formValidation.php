<?php
    $result = [
        "status" => true,
        "errors" => [
            "partyAccountNumberError" => '',
            "confirmPartyAccountNumberError" => '',
            "partyNameError" => '',
            "purposeError" => '',
            "partyAmountError" => '',
            "ifscCodeError" => '',
            "headOfAccountError" => '',
            "expenditureTypeError" => '',
            "purposeTypeError" => ''
        ]
    ];

    // "ifscCode" => [],
    // "headOfAccount" => [],
    // "expenditureType" => [],
    // "purposeType" => [],
    





    // for party account number
    if(!array_key_exists("partyAccountNumber", $_POST) || strlen($_POST["partyAccountNumber"]) == 0) {
        $result["errors"]["partyAccountNumberError"] = "Please enter party account number";
        $result["status"] = false;
    }
    else {
        if(!is_numeric($_POST["partyAccountNumber"])) {
            $result["errors"]["partyAccountNumberError"] = "Account number should contain only numbers";
            $result["status"] = false;
        }
        if(strlen($_POST["partyAccountNumber"]) < 12 || strlen($_POST["partyAccountNumber"]) > 22) {
            $result["errors"]["partyAccountNumberError"] = "Account number should be min 12 and max 22 digits";
            $result["status"] = false;
        }
    }


    // for confirm party account number 
    if(!array_key_exists("confirmPartyAccountNumber", $_POST) || strlen($_POST["confirmPartyAccountNumber"]) == 0) {
        $result["errors"]["confirmPartyAccountNumberError"] = "Please confirm party account number";
        $result["status"] = false;
    }
    else if(strcmp($_POST["partyAccountNumber"], $_POST["confirmPartyAccountNumber"])) {
        $result["errors"]["confirmPartyAccountNumberError"] = "Account numbers doesn't match";
        $result["status"] = false;
    }


    // for party name
    if(!array_key_exists("partyName", $_POST) || strlen($_POST["partyName"]) == 0) {
        $result["errors"]["partyNameError"] = "Please enter party name";
        $result["status"] = false;
    }
    else if(preg_match("/[^A-Za-z0-9]/", $_POST["partyName"])) {
        $result["errors"]["partyNameError"] = "Party name should not contain any special characters";
        $result["status"] = false;
    }


    // for purpose
    if(!array_key_exists("purpose", $_POST) || strlen($_POST["purpose"]) == 0) {
        $result["errors"]["purposeError"] = "Please enter purpose";
        $result["status"] = false;
    }
    else if(strlen($_POST["purpose"]) > 500) {
        $result["errors"]["purposeError"] = "Purpose should be of max 500 characters";
        $result["status"] = false;
    }


    // for party amount
    if(!array_key_exists("partyAmount", $_POST) || strlen($_POST["partyAmount"]) == 0) {
        $result["errors"]["partyAmountError"] = "Please enter party amount";
        $result["status"] = false;
    }
    else if(preg_match("/[^0-9]/", $_POST["partyAmount"])) {
        $result["errors"]["partyAmountError"] = "Party amount should be in numbers only and should not be decimals also";
        $result["status"] = false;
    }


    // for ifsc code
    if($_POST["bankName"] == "XXXXXX") {
        $result["errors"]["ifscCodeError"] = "Invalid IFSC Code!";
        $result["status"] = false;
    }

    

    echo json_encode($result);
    return;
?>