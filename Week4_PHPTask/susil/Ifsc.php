<?php
 $ifscError=["ifscError"=>[]];
$ifsccode=$_POST['ifscCode']; 
$status=true;
  if(!$ifsccode){
      array_push($ifscError['ifscError'],'Please Enter IFSC Code');
      $response=["staus"=>false,"output"=>$ifscError];
      json_encode($response);
      echo json_encode($response);
      return;
 }
   elseif(strlen($ifsccode)!=11){
    array_push($ifscError['ifscError'],'IFSC Code Should Be Eleven Character');
    $response=["staus"=>0,"output"=>$ifscError];
    json_encode($response);
    echo json_encode($response);
    return;
 }
 elseif(  preg_match("/[^a-zA-Z0-9]+/",$ifsccode)){
  array_push($ifscError['ifscError'],'IFSC Code Should not contain any special character');
  $status=0;
 }
 elseif(substr($ifsccode,0,4)!=strtoupper(substr($ifsccode,0,4))){
  array_push($ifscError['ifscError'],"The first four character of IFSC code should be in upper case");
  
  $status=0;
  }
  elseif(preg_match("/[^a-zA-Z]/",(substr($ifsccode,0,4)))!=0){
    array_push($ifscError['ifscError'],"The first four character of The IFSC Code Alaphabet Only");
    $status=0;
  }
  elseif($ifsccode[4]!=0){
    array_push($ifscError['ifscError'],"The Fifth Character Should Be Zero");
    $status=0;
 }
//  if(count($ifscError)>0){
//     print_r($ifscError);
//     return;
// } 
if(!$status){
  $response=["status"=>0,"output"=>$ifscError];

  echo json_encode($response);
  return;
}

     $bankDetails=[];
    $temporarybankDetails=[
        "CNRB0426544"=>["bankName"=>"CANARA","Loc"=>"CUTTACK"],
        "SBIN0123456"=>["bankName"=>"SBI","Loc"=>"AMMERPET"],
        "UTBIB000008"=>["bankName"=>"AXIS","Loc"=>"HITECH CITY"]
    ];
    if(!array_key_exists($ifsccode,$temporarybankDetails)){
      array_push($ifscError['ifscError'],"Invalid IFSC Code");
      //json_encode($temporarybankDetails[$ifsccode]);
      //echo json_encode($temporarybankDetails[$ifsccode]);
      $response=["status"=>0,"output"=>$ifscError];
      
      echo json_encode($response);
      return;
      
    }
else{
  //echo json_encode($ifscError);
  $response=["status"=>1,"output"=>$temporarybankDetails[$ifsccode]];
  
  echo json_encode($response); 

}

    ?>