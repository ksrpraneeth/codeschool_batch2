<?php
 $ifscError=["ifscError"=>""];
$ifsccode=$_POST['ifscCode']; 
  if(!$ifsccode){
      $ifscError['ifscError']='Please Enter IFSC Code';
 }
   elseif(strlen($ifsccode)!=11){
    $ifscError['ifscError']='IFSC Code Should Be Eleven Character';
 }
 elseif((!preg_match("/[a-zA-Z0-9]+/",($ifsccode)))){
  $ifscError['ifscError']='IFSC Code Should not contain any special character';
 }
 elseif(substr($ifsccode,0,4)!=strtoupper(substr($ifsccode,0,4))){
  $ifscError['ifscError']="The first four character of IFSC code should be in upper case";
  }
  elseif(!preg_match("/[a-zA-Z]+/",(substr($ifsccode,0,4)))){
    $ifscError['ifscError']="The first four character of The IFSC Code Alaphabet Only";
  }
  elseif($ifsccode[4]!=0){
    $ifscError['ifscError']="The Fifth Character Should Be Zero";
 }
//  if(count($ifscError)>0){
//     print_r($ifscError);
//     return;
// } 

     $bankDetails=[];
    $temporarybankDetails=[
        "CNRB0426544"=>["CANARA","CUTTACK"],
        "SBIN0123456"=>["SBI","AMMERPET"],
        "UTBIB000008"=>["AXIS","HITECH CITY"]
    ];
    if(array_key_exists($ifsccode,$temporarybankDetails)){
      json_encode($temporarybankDetails[$ifsccode]);
      echo json_encode($temporarybankDetails[$ifsccode]);
      
    }
else{
  echo json_encode($ifscError);
}

    ?>