<?php
//IFSC Code

// var_dump($_POST);
//  die();


$ifscError=["ifscCodeError"=>[]];
$ifscCode=$_POST['IFSC_Code'];
// var_dump($ifscCode);die();
$status=1;
if (!($ifscCode)){
array_push($ifscError["ifscCodeError"]," Please Enter the IFSC Code");
    $response=["status"=>0,"output"=>$ifscError];
    echo json_encode($response);
    return;

}
if(strlen($ifscCode)!=11){
    array_push($ifscError["ifscCodeError"],"IFSC Code schould be Eleven characters");
    $response=["status"=>0,"output"=>$ifscError];
    echo json_encode($response);
    return;
}

if (preg_match("/[^a-zA-Z0-9]+/",$ifscCode)!=0){
    array_push($ifscError["ifscCodeError"],"IFSC Code schould not contain any Special character");
    $status=0;
}


elseif (preg_match("/[^a-zA-Z]/",(substr($ifscCode,0,4)))!=0){
    array_push($ifscError["ifscCodeError"],"First Four Characters of IFSC Code should be Alphabet only.");
    $status=0;
}
if (substr($ifscCode,0,4)!=strtoupper(substr($ifscCode,0,4))){
    array_push($ifscError["ifscCodeError"],"First Four Characters of IFSC Code should be in  Upper case.");
    $status=0;
}
if ((substr($ifscCode,4,1))!=0){
    array_push($ifscError["ifscCodeError"],"Fifth Character of IFSC Code should be 0.");
    $status=0;  
}
if($status==0){
    $response=["status"=>0,"output"=>$ifscError];
    echo json_encode($response);
    return;
}


//bank & branch name


  $temporaryBankDetails= 
   ["SBIN0111111"=>["Bankname"=>"SBI","BranchName"=>"AMEERPET"],
    "ICIC0111111"=>["Bankname"=>"ICICI","BranchName"=>"HITECH CITY"],
    "HDFC0111111"=>["Bankname"=>"HDFC","BranchName"=>"LB NAGAR"],
    "PUNB0111111"=>["Bankname"=>"PNB","BranchName"=>"RAIDURG"]];
     if(!array_key_exists($ifscCode,$temporaryBankDetails)){
        array_push($ifscError["ifscCodeError"],"Invalid IFSC code");
    $response=["status"=>0,"output"=>$ifscError];
    echo json_encode($response);
return;
     }

  $response=["status"=>1,"output"=>$temporaryBankDetails[$ifscCode]];
  echo json_encode($response);





  
?>