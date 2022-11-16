<?php

if (!array_key_exists('expenditure_type', $_POST) || !isset($_POST['expenditure_type'])) {
    $res = ["status" => false, "message" => "Expenditure Type is required"];
    echo json_encode($res);
    return;
}
$Expenditures = [
    "Capital_Expenditure" => [
        "capE" => "Maintain current levels of operation within the organization",
        "capE2" => "All expenses incurred by the firm to guarantee the smooth operation"
    ],
    "RevenueExpenditure" => [
        "capE" => "Sales costs or All expenses incurred by the firm that are directly tied to the manufacture and selling of its goods or services",
        "capE2" => "All expenses incurred by the firm to guarantee the smooth operation."
    ],
    "Deferred_Revenue_Expenditure" => [
        "capE" => "Exorbitant Advertising Expenditures",
        "capE2" => "Unprecedented Losses",
        "capE3" => "Development and Research Cost"
    ]
];

if(!array_key_exists(($_POST['expenditure_type']), $Expenditures)) {
    $res = ["status" => false, "message" => "Invalid Expenditure Type."];
    echo json_encode($res);
    return;
}

$res = ["status" => true, "data" => $Expenditures[($_POST['expenditure_type'])]];
echo json_encode($res);
return;
?>