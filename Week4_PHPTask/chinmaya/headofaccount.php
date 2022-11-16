<?php
$headofAccount=$_POST['head_Of_Account'];
$headaccountError=["headaccountError"=>""];
$headofaccountBalance=array(
    "0853001020002000000NVN"=>["Balance"=>1000000,"LOC"=>5000],
    "8342001170004001000NVN"=>["Balance"=>1008340,"LOC"=>4000],
    "2071011170004320000NVN"=>["Balance"=>14530000,"LOC"=>78000],
    "8342001170004002000NVN"=>["Balance"=>1056400,"LOC"=>34000],
    "2204000030006300303NVN"=>["Balance"=>123465400,"LOC"=>5000]
);
if(strcmp($headofAccount,'options')==0){
    $headaccountError['headaccountError']="Enter Head Of Account";
    $response=["status"=>false,"output"=>$headaccountError];
    json_encode($response);
    echo json_encode($response);
    return;
}
if(!array_key_exists($headofAccount,$headofaccountBalance)){
    $headaccountError['headaccountError']="Invalid Head Of Account";
    $response=["status"=>false,"output"=>$headaccountError];
    json_encode($response);
    echo json_encode($response);
    return;
}
$response=["status"=>true,"output"=>$headofaccountBalance[$headofAccount]];
json_encode($response);
echo json_encode($response);

