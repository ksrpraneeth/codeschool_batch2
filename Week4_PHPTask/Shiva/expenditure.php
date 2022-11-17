<?php
$expenditure = [
    "Capital Expenditure" => [
        "Maintain current levels of operation within the organization",
        "Expenses to permit future expansion"
    ],
    "Revenue Expenditure" => [
        "Sales costs or All expenses incurred by the firm that are directly tied to the manufacture and selling of its goods or services",
        "All expenses incurred by the firm to guarantee the smooth operation"
    ],
    "Deferred Revenue Expenditure" => [
        "Exorbitant Advertising Expenditure",
        "Unprecedented Losses",
        "Development and Research Cost"
    ]
];
$expenditureType = $_POST['expenditureType'];
if (array_key_exists($expenditureType, $expenditure)) {
    $message = $expenditure[$expenditureType];
    echo json_encode(['status' => true, 'data' => $message]);
} else {
    echo json_encode(['status' => false, 'error' => 'Not found']);
}
?>