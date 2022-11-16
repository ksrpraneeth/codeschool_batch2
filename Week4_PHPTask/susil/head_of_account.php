<?php
$headAccount=$_POST['headAccount'];
$headAccoutError=["headaccountError"=>""];
$headofaccountBalance=array(
    "0853001020002000000NVN"=>["Balance"=>100000,"Loc"=>5000],
    "8342001170004001000NVN"=>["Balance"=>1008340,"Loc"=>4000],
    "2071011170004320000NVN"=>["Balance"=>134556,"Loc"=>8000],
    "8342001170004002000NVN"=>["Balance"=>188444,"Loc"=>34000],
    "2204000030006300303NVN"=>["Balance"=>154545,"Loc"=>50000]
);
if(!$headAccount){
    $headAccoutError['headaccountError']='Enter Head of Account';
    $respose=["status"=>0,"output"=>$headAccoutError];
    json_encode($respose);
    echo json_encode($respose);
    return;
}
if(!array_key_exists($headAccount,$headofaccountBalance)){
    $headAccoutError['headaccountError']="Invalid Head Of Account";
    json_encode($headAccoutError);
    echo json_encode($headAccoutError);
    return;
}
$respose=["status"=>1,"output"=>$headofaccountBalance[$headAccount]];
json_encode($respose);
echo json_encode($respose);
?>  