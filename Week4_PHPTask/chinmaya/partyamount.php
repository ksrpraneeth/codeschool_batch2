<?php
$partyamount=$_POST['party_Amount'];
$partyamountError=['partyamountError'=>[]];
$status=true;
if($partyamount==""){
   array_push( $partyamountError['partyamountError'],"Party amount can not be blank");
    $response=["status"=>false,"output"=>$partyamountError];
    
    echo json_encode($response);
    return;
}
if($partyamount<0){
    array_push( $partyamountError['partyamountError'],"Party amount can not be negative");
    $response=["status"=>false,"output"=>$partyamountError];
    
    echo json_encode($response);
    return;
}
if(is_numeric($partyamount)!=1){
    array_push( $partyamountError['partyamountError'],"Special Character are not allowed");
    $status=false;
}
if(round($partyamount)!=$partyamount){
    array_push( $partyamountError['partyamountError'],"Party amount can not be fraction");
    $status=false;
}
if(!$status){
    $response=["status"=>false,"output"=>$partyamountError];
    
    echo json_encode($response);
    return;
}
$partyamountInword=['Partyamountinword'=>""];
$partyamount=(string)$partyamount;
if(strlen($partyamount)>10){
    array_push( $partyamountError['partyamountError'],"Amount Overflow");
    $response=["status"=>false,"output"=>$partyamountError];
    
    echo json_encode($response);
    return;
}
$partyamount="000000000".$partyamount;
if((int)$partyamount==0){
    $partyamountInword['Partyamountinword']='ZERO';
    $response=["status"=>true,"output"=>$partyamountInword];
  
    echo json_encode($response);
    return;
}
$last3=substr($partyamount,-3,3);
$thousand=substr($partyamount,-5,2);
$lakh=substr($partyamount,-7,2);
$crore=substr($partyamount,-10,3);

if((int)$crore!=0){
    $partyamountInword['Partyamountinword']= $partyamountInword['Partyamountinword'].convertHUndredtoword($crore).'Crore'." ";
};
if((int)$lakh!=0){
    $partyamountInword['Partyamountinword']=$partyamountInword['Partyamountinword'].convertTenthtoword($lakh).'Lakh'.' ';

};
if((int)$thousand!=0){
    $partyamountInword['Partyamountinword']=$partyamountInword['Partyamountinword'].convertTenthtoword($thousand)."Thousand";
};
if((int)$last3!=0){
    $partyamountInword['Partyamountinword']=$partyamountInword['Partyamountinword'].convertHUndredtoword($last3).'Only';
};
//function for hundreed to word
function convertHUndredtoword($parameter1){
    $One=['','One','Two','Three','Four','Five','Six','Seven','Eight','Nine','Ten','Eleven','Twelve','Thrteen','Fourteen','Fifteen','Sixteen','Seventen','Eighteen','Ninteen'];
             
$Ten=['','','Twenty','Thirty','Fourty','Fifty','Sixty','Seventy','Eighty','Ninty'];
$hundred="";
$tenth=0;
if((int)$parameter1[0]!=0){
    $hundred=$hundred.$One[(int)$parameter1[0]]." "."Hundred"." ";
}
if((int)$parameter1[1]<2){
    $tenth=(int)($parameter1[1].$parameter1[2]);
    $hundred=$hundred.$One[$tenth];
    return $hundred;
}
$hundred=$hundred.$Ten[(int)$parameter1[1]].$One[(int)$parameter1[2]];
return $hundred;
};
//function to convert two number to word
function convertTenthtoword($parameter2)
{
    $One=['','One','Two','Three','Four','Five','Six','Seven','Eight','Nine','Ten','Eleven','Twelve','Thrteen','Fourteen','Fifteen','Sixteen','Seventen','Eighteen','Ninteen'];
             
$Ten=['','','Twenty','Thirty','Fourty','Fifty','Sixty','Seventy','Eighty','Ninty'];
    $ten="";
    $tenth=0;
    if((int)$parameter2[0]<2){
        $tenth=$tenth+(int)($parameter2[0].$parameter2[1]);
        $ten=$One[$tenth];
        return $ten;
    }
    $ten=$ten.$Ten[(int)$parameter2[0]].$One[(int)$parameter2[1]];
    return $ten;
};
//json encode form
$response=["status"=>true,"output"=>$partyamountInword];

echo json_encode($response);
return;



