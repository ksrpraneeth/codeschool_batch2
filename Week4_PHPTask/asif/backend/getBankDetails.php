<?php
      $result = [
            "status" => false,
            "error" => '',
            "data" => []
      ];

      // if the ifsc code isn't recieved from the client
      if(!array_key_exists("ifsc_code", $_POST) || strlen($_POST["ifsc_code"]) == 0) {
            $result['status'] = false;
            $result['error'] = "Please enter IFSC code!";
            echo json_encode($result);
            return;
      }

      $ifscCode = $_POST["ifsc_code"];

      // if the ifsc code sent by the client is empty or of insufficient characters
      if(strlen($ifscCode) != 11) {
            $result['status'] = false;
            $result['error'] = "IFSC code should be of 11 characters only!";
            echo json_encode($result);
            return;
      }

      // checking for error in the ifsc code format
      $ifscCode = strtoupper($ifscCode);

      if(!preg_match("/^[A-Z]{4}/", $ifscCode)) {
            $result['status'] = false;
            $result['error'] = "Invalid IFSC code!";
      }

      if($ifscCode[4] != "0") {
            $result['status'] = false;
            $result['error'] = "Invalid IFSC code!";
      }

      if(preg_match("/[^A-Z0-9]/", substr($ifscCode, 5))) {

            $result['status'] = false;
            $result['error'] = "Invalid IFSC code!";
      }

      // return the match for valid ifsc code 
      $bankNamesList = [
            "SBIN0123456"=>["bankName"=>"State Bank Of India", "bankBranch"=>"Mehdipatnam Branch"],
            "IDBI0123456"=>["bankName"=>"IDBI Bank", "bankBranch"=>"Rajendra Nagar Branch"],
            "HDFC0123456"=>["bankName"=>"HDFC Bank", "bankBranch"=>"Attapur Branch"],
            "UBIN0123456"=>["bankName"=>"Union Bank of India", "bankBranch"=>"Shamsheer Gunj Branch"],
            "BARB0123456"=>["bankName"=>"Bank of Baroda", "bankBranch"=>"Film Nagar Branch"],
            "ABIL0123456"=>["bankName"=>"Axis Bank", "bankBranch"=>"Bahadurpura Branch"]
      ];

      if(array_key_exists($ifscCode, $bankNamesList)) {
            $result['status'] = true;
            $result['error'] = '';
            $result['data'] = $bankNamesList[$ifscCode];
      } else {
            $result['status'] = false;
            $result['error'] = "Invalid IFSC code!";
      }
      
      echo json_encode($result);
      return;
?>