<?php
    $result = [
        "status" => false,
        "error" => '',
        "data" => []
    ];

    // if the key head of account isn't received from frontend or isn't selected by the user
    if(!array_key_exists("head_of_account", $_POST) || $_POST["head_of_account"] == "") {
        $result["status"] = false;
        $result["error"] = 'Please Select the Head Of Account';
        echo json_encode($result);
        return;
    }

    // if received
    $headOfAccount = $_POST["head_of_account"];
    
    $headOfAccountsList = [
        "0853001020002000000NVN" => ["headOfAccountBalance"=>"1000000", "headOfAccountLOC"=>"5000"],
        "8342001170004001000NVN" => ["headOfAccountBalance"=>"1008340", "headOfAccountLOC"=>"4000"],
        "2071011170004320000NVN" => ["headOfAccountBalance"=>"14530000", "headOfAccountLOC"=>"78000"],
        "8342001170004002000NVN" => ["headOfAccountBalance"=>"1056400", "headOfAccountLOC"=>"34000"],
        "2204000030006300303NVN" => ["headOfAccountBalance"=>"123465400", "headOfAccountLOC"=>"5000"]
    ];
    
    // return the corresponding values
    $result["status"] = true;
    $result["error"] = '';
    $result["data"] = $headOfAccountsList[$headOfAccount];
    echo json_encode($result);
    return;
?>