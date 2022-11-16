<?php
if (!array_key_exists('bankIFSC', $_POST) || !isset($_POST['bankIFSC'])) {
    $res = ["status" => false, "message" => "Head Of Account is required"];
    echo json_encode($res);
    return;
}


$length = strlen($_POST['bankIFSC']);
if ($length != 11) {
    $res = ["status" => false, "message" => "IFSC should be 11 characters only"];
    echo json_encode($res);
    return;
}
$ptr = !preg_match_all("/^[A-Z]{4}0[0-9]{6}$/", ($_POST['bankIFSC']));
if ($ptr) {
    $res = ["status" => false, "message" => "Enter valid IFSC code in valid format **ABCD0012458"];
    echo json_encode($res);
    return;

}
$bankDetails = [
    "KKBK0074700" => [
        "bankName" => "KOTAK",
        "Branch" => "NACHARAM"
    ],
    "SBIN0123456" => [
        "bankname" => "SBI",
        "Branch" => "JUBLIHILLS"
    ]
];

if (!array_key_exists(($_POST['headOfAccount']), $headOfAccountDetails)) {
    $res = ["status" => false, "message" => "Invalid IFSC code."];
    echo json_encode($res);
    return;
}


?>