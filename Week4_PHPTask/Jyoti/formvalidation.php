<?php
$error=[];
$partyaccount=$_POST['partyaccount'];
if(!$partyaccount){
    $error['partyaccountError']="Party Amount  Should not be kept blank";
}
else if(is_numeric($partyaccount)!=1){
    $error['partyaccountError']="Party Amount should be Number only";
}
elseif(strlen($partyaccount)<12 or strlen($partyaccount)>22){
    $error['partyaccountError']="Party Amount should be minimum  12 and maximum 22 characters";
}
$confirmpartyaccount=$_POST['confirmPartyAmount'];
if(!$confirmpartyaccount){
    $error['confirmpartyerror']="Confirm Party Account Number  Should not be kept blank";
}
elseif($partyaccount!=$confirmpartyaccount){
    $error['confirmpartyerror']="Confirm Party Account should be same as the Party Account Number";
}
$partyname=$_POST['partyName'];
if(!$partyname){
    $error['partynamer']="Party Name  Should not be kept blank";
}
elseif(is_numeric($partyname)==1){
    $error['partynamer']="Numbers are not allowed";
}
elseif(preg_match("/[^a-zA-Z]/",$partyname)==1){
    $error['partynamerror']="Special characters are not allowed";
}
$ifsccode=$_POST['ifsccode'];
if(!$ifsccode){
    $error['ifscerror']="IFSC code  Should not be kept blank";
}
$headaccount=$_POST['headaccount'];
if($headaccount=='Select Here'){
    $error['headacountError']="Please select Head of Account";
}
if($_POST['expenditure']=="Select Here"){
    $error['expenditurerror']="Please select  Expenditure Type";
}
if($_POST['purpose']==""){
    $error['purposeerror']="Please write the Purpose here";
}
if(!($_POST['partyamount'])){
    $error['partyamounterror']="Party Amount Should not be kept blank";
}
echo json_encode($error);