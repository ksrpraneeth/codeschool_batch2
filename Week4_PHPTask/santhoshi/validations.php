<?php
if(!isset($_POST["partyAccountNumber"])){
    echo "Please Enter Account Number";
    return;
}
 $range =strlen($_POST["partyAccountNumber"]);
 if (($range < 12)|| ($range >22) ){
    echo "account number should be between 12 and 22";
    return;
 }

 if(!isset($_POST["confirmPartyAccountNumber"])){
    echo "Please Enter Account Number";
    return;
}
 $range =strlen($_POST["confirmPartyAccountNumber"]);
 if (($range < 12)|| ($range >22) ){
    echo "Should be same as account number entered above";
    return;
 }
 if(!isset($_POST["bankIFSCcode"])){
    echo "IFSC code should be 11 characters";
    return;
 }
 $bankIFSCcode =strlen($_POST["bankIFSCcode"]);
 if ($bankIFSCcode != 11){
    echo "IFSC code should be 11 characters" ;
    return;
 }

 if(!isset($_POST["purpose"])){
    echo "Enter your purpose here";
    return;
 }
 $purpose =strlen($_POST["purpose"]);
 if (($purpose < 0)|| ($purpose >500) ){
    echo "Enter your purpose here in limits of 0-500";
    return;
 }
 ?>