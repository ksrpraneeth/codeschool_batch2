<?php
// head of account
$headOfAccountError=["headOf_AccountError"=>""];

$headOfAccount=$_POST['head_Of_Account'];

//array_push($headOfAccountError,'Please Enter Head of Account')

$accountDetails=[
        "0853001020002000000NVN"=>["Balance"=>"1000000","LOC"=>"5000"],
        "8342001170004001000NVN"=>["Balance"=>"1008340","LOC"=>"4000"],
        "2071011170004320000NVN"=>["Balance"=>"14530000","LOC"=>"78000"],
        "8342001170004002000NVN"=>["Balance"=>"1056400","LOC"=>"34000"],
        "2204000030006300303NVN"=>["Balance"=>"123465400","LOC"=>"5000"]
];

if (!array_key_exists($headOfAccount,$accountDetails)){
    $headOfAccountError["headOf_AccountError"]="Please Enter Valid Head of Account";
    $response=["status"=>0,"output"=>$headOfAccountError];
    echo json_encode($response);
    return;

}
$response=["status"=>1,"output"=>$accountDetails[$headOfAccount]];
echo json_encode($response);

?>