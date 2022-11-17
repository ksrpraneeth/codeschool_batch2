<?php
$errorsArr=[];
if (!isset($_POST['partyNumber'])){
    array_push($errorsArr,'Please Enter Party Number');
}
elseif (!is_numeric($_POST['partyNumber'])){
    array_push($errorsArr,'Party Number Only Contain  Number');
}
elseif((strlen($_POST['partyNumber']))<12 or strlen(strlen($_POST['partyNumber']))>22){
    array_push($errorsArr,'Party Number Should be between 12 and 22 character');
}
//confirm party number
if (!isset($_POST['confirmpartyNumber'])){
    array_push($errorsArr,'Please enter confirm Party Number');
}
elseif (($_POST['confirmpartyNumber'])!=($_POST['partyNumber'])){
    array_push($errorsArr,'Confirm party number should be same as party number'); 
}
//party 
$partyName=$_POST['partyName'];
if (!($partyName)){
array_push($errorsArr,"Please enter Party Name");
}

    if(preg_match("/[^a-zA-Z0-9]+/",$partyName))
    {
    array_push($errorsArr,'Party name should not contain any special character');
    }
    //ifsc validation
 $ifsccode=$_POST['ifscCode'];
 if (!$ifsccode){
    array_push($errorsArr,"Please enter IFSC code");
 }
 elseif(strlen($ifsccode)!=11){
    array_push($errorsArr,"IFSC code should be 11 character ");
 }
 elseif(substr($ifsccode,0,4)!=strtoupper(substr($ifsccode,0,4))){
    array_push($errorsArr,"The first four character of IFSC code should be in upper case");
 }
 elseif($ifsccode[4]!=0){
    array_push($errorsArr," The fifth character ofIFSC code should be zero ");
 }
//head account validation
// $headAccout=$_POST['headAccount']
// if(!$headAccount){
//     array_push($errorsArr,"Please enter head account");
// }
//party ammount valiation
$partyAmmount=$_POST['partyAmmount'];
if(!$partyAmmount){
    array_push($errorsArr,'Please enter party ammount');
}
elseif(!is_numeric($partyAmmount)){
    array_push($errorsArr,'Party ammount should be a number');
}


    if(count($errorsArr)>0){
        //print_r($errorsArr);
        $response=["status"=>false,"output"=>$errorsArr];
        echo json_encode;
        return;
    }

?>



$.ajax({
      type: "POST",
      url: "someaction.do?action=saveData",
      data: {ifsc:ifsc,partyname},
      dataType: "json",
      success: function(resultData){
          alert("Save Complete");
      }
});