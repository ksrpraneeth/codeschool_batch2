<?php

$errors = [];
$data = [];
$ifscCode = isset($_POST['ifscCode']) ? $_POST['ifscCode'] : null;
if (empty($ifscCode)) {
    $errors["ifscCode"] = "Please enter ifsccode";
} else{
    if (!preg_match("/[A-Z]{4}0[0-9A-Z]{6}/", $ifscCode)) {
        $errors["ifscCode"] = "Invalid ifsc code";
    } else {
        $banks = [
           "HDFC0123456" =>["bank" => "HDFC","branch" =>"HASTHINAPUR"],
           "SBIN0123456" =>["bank" => "SBI","branch" =>"LB NAGAR"],
           "AXIS0123456" =>["bank" => "AXIS","branch" =>"ATTAPUR"],
           "SBHY0123456" =>["bank" => "SBH", "branch" => "MALAKPET"]
        ];
        if (array_key_exists($ifscCode, $banks)) {
            $data = $banks[$ifscCode];
        } else {
            $errors["ifscCode"] = "ifscCode data not found";
        }
     }
}
if (count($errors) > 0) {
    echo json_encode(['status' => false, 'message' => $errors]);
} else {
    echo json_encode(['status' => true, 'data' => $data]);
}

//$bankDetails=[];
//$bankBranchDetails=[
  //"HDFC0123456" =>["HDFC","HASTHINAPUR"],
  //"SBIN0123456" =>["SBI","LB NAGAR"],
  //"AXIS0123456" =>["AXIS","ATTAPUR"]
//];
//if(array_key_exists($ifscerr,$bankBranchDetails)){
  //json_encode($bankBranchDetails[$ifscerr]);
  //echo json_encode($bankBranchDetails[$ifscerr]);
//}

?>