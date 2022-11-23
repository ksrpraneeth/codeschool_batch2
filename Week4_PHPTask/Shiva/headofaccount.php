<?php
$errors = [];
$data = [];
$hoa = isset($_POST['hoa']) ? $_POST['hoa'] : null;
if (empty($hoa)) {
    $errors["hoa"] = "Please select head of account";
} else {
    
    $accounts = [
        "0853001020002000000NVN" => ["Balance" => "1000000", "Loc" => "5000"],
        "8342001170004001000NVN" => ["Balance" => "1008340", "Loc" => "4000"],
        "2071011170004320000NVN" => ["Balance" => "14530000", "Loc" => "78000"],
        "8342001170004002000NVN" => ["Balance" => "1056400",  "Loc" => "34000"],
        "2204000030006300303NVN" => ["Balance" => "123465400", "Loc" => "5000"]
    ];
    if (array_key_exists($hoa, $accounts)) {
        $data = $accounts[$hoa];
    } else {
        $errors["hoa"] = "account doesn't match";
    }
}
if (count($errors) > 0) {
    echo json_encode(['status' => false, 'errors' => $errors]);
} else {
    echo json_encode(['status' => true, 'data' => $data]);
}
?>