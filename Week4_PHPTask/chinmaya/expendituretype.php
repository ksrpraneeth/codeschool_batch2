<?php
$expenditureType=$_POST['expenditureType'];
$expendituretypeError=['expenditureeroor'=>""];
$purposetype=["Capital Expenditure"=>["Maintain current levels of operation within the organization"," Expenses to permit future expansion."],
"Revenue Expenditure"=>["Sales costs or All expenses incurred by the firm that are directly tied to the manufacture and selling of its goods or services.","All expenses incurred by the firm to guarantee the smooth operation."],
"Deferred Revenue Expenditure"=>["Exorbitant Advertising Expenditures","Unprecedented Losses","Development and Research Cost"]
];
if($expenditureType=='option'){
    $expendituretypeError['expenditureeroor']="Expenditure type can not be empty";
    $response=["status"=>false,"output"=>$expendituretypeError];
   
    echo json_encode($response);
    return;
}
$response=["status"=>true,"output"=>$purposetype[$expenditureType]];

echo json_encode($response);