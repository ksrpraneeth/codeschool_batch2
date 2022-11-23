 <?php
$error=[];
$partyaccount=$_POST['partyaccount'];
if(!$partyaccount){
    $error['partyaccountError']="Party Account Number can not be blank";
}
else if(is_numeric($partyaccount)!=1){
    $error['partyaccountError']="Party Account number should be number";
}
elseif(strlen($partyaccount)<12 or strlen($partyaccount)>22){
    $error['partyaccountError']="Party Account minimum12 and maximum 22 character";
}
$confirmpartyaccount=$_POST['confirmPartyamlount'];
if(!$confirmpartyaccount){
    $error['confirmpartyerror']="Confirm party account number can not be blank";
}
elseif($partyaccount!=$confirmpartyaccount){
    $error['confirmpartyerror']="Confirm party account should be same as the party account number";
}
$partyname=$_POST['partyName'];
if(!$partyname){
    $error['partynamer']="Party name can not be blank";
}
elseif(is_numeric($partyname)==1){
    $error['partynamer']="Number are not allowed";
}
elseif(preg_match("/[^a-zA-Z]/",$partyname)==1){
    $error['partynamer']="Special character are not allowed";
}
$ifsccode=$_POST['ifsccode'];
if(!$ifsccode){
    $error['ifscerror']="IFSC code can not be blank";
}
$headaccount=$_POST['headaccount'];
if($headaccount=='Select Here'){
    $error['headacounterror']="Head account can not be blank";
}
if($_POST['expenditure']=="Select Here"){
    $error['expenditurerror']="Head account can not be blank";
}
if($_POST['purpose']==""){
    $error['purposeerror']="Head account can not be blank";
}
if(!($_POST['partyamount'])){
    $error['partyamounterror']="Party ammount can not be blank";
}
elseif(preg_match("/[^0-9]/",$_POST['partyamount'])==1){
    $error['partyamounterror']="Party ammount should be number only";
}
echo json_encode($error);