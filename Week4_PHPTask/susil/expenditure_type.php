
<?php
$expenditureType=$_POST['expenditureType'];
$expenditureError=["expenditureError"=>""];
$purposeType=["capital Expenditure"=>[" Maintain current levels of operation within the organization",'Expenses to permit future expansion.' ],
"Revenue Expenditure"=>[" Sales costs or All expenses incurred by the firm that are directly tied to the manufacture and selling of its goods or services.",'All expenses incurred by the firm to guarantee the smooth operation.'],
"Deferred Revenue Expenditure"=>["Exorbitant Advertising Expenditures ",'Unprecedented Losses'," Development and Research Cost" ]
];
if(!$expenditureType){
    $expenditureError['expenditureError']='Please Select Expenditure Type';
    $response=["status"=>0,"output"=>$expenditureError];
    json_encode( $expenditureError);
    echo json_encode( $expenditureError);
    return;
}
$response=["status"=>1,"output"=>$purposeType[$expenditureType]];
json_encode($response);
echo json_encode($response);
?>