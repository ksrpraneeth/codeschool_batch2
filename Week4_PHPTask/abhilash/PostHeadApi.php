<?php

if (!array_key_exists('headOfAccount', $_POST) || !isset($_POST['headOfAccount'])) {
    $res = ["status" => false, "message" => "Head Of Account is required"];
    echo json_encode($res);
    return;
}

$headOfAccountDetails = [
    "0853001020002000000NVN" => [
        "Balance" => 1000000,
        "LOC" => 5000
    ],
    "8342001170004001000NVN" => [
        "Balance" => 1008340,
        "LOC" => 4000
    ],
    "2071011170004320000NVN" => [
        "Balance" => 14530000,
        "LOC" => 78000
    ],
    "8342001170004002000NVN" => [
        "Balance" => 1056400,
        "LOC" => 34000
    ],
    "2204000030006300303NVN" => [
        "Balance" => 123465400,
        "LOC" => 5000
    ]
];

if(!array_key_exists(($_POST['headOfAccount']), $headOfAccountDetails)) {
    $res = ["status" => false, "message" => "Invalid head of account."];
    echo json_encode($res);
    return;
}

$res = ["status" => true, "data" => $headOfAccountDetails[($_POST['headOfAccount'])]];
echo json_encode($res);
return;
?>