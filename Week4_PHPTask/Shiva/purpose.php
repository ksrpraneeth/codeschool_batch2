<?php

$errors = [
    "purposeerr"=>[],
];

$data = [];

$purpose = isset($_POST['purpose']) ? $_POST['purpose'] : null;

if (empty($purpose)) {
    array_push($errors["purposeerr"],"Please enter purpose");
} else {
    if (strlen($purpose) < 1 || strlen($purpose) > 500) {
       array_push($errors["purposeerr"] ,"Purpose cannot be empty or above 500 characters");
    }
}
if (count($errors) > 0) {
    echo json_encode(['status' => false, 'errors' => $errors]);
} else {
   echo json_encode(['status' => true, 'data' => $data]);
}
?>