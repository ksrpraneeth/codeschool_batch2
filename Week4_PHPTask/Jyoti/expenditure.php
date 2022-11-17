 <?php
$expenditureType=$_POST['expenditure_type'];
$expenditureTypeError=['expenditure_Type_Error'=>''];





$purposeType=["Capital Expenditure"=>['Maintain current levels of operation within the organization','Expenses to permit future expansion'],
"Revenue Expenditure"=>['Sales costs or All expenses incurred by the firm that are directly tied to the manufacture and selling of its goods or services','All expenses incurred by the firm to guarantee the smooth operation'],
"Deferred Revenue Expenditure"=>['Exorbitant Advertising Expenditures','Unprecedented Losses','Development and Research Cost']];

if (!$expenditureType){
    $expenditureTypeError["expenditure_Type_Error"]="Please Select Expenditure Type";
    $response=["status"=>0,"output"=>$expenditureTypeError];
    echo json_encode($response);
    return;
}
$response=["status"=>1,"output"=>$purposeType[$expenditureType]];
 echo json_encode($response);

 ?>