<?php
include '../api/db.php';

//validations

$result = [
    "status" => true,
    "errors" => [
        "accountType"=>"",
        "title"=>"",
        "firstName"=>"",
        "lastName"=>"",
        "dateOfBirth"=>"",
        "gender"=>"",
        "mobileNumber"=>"",
        "accountNumber"=>"",
        "eMailId"=>"",
        "streetAddress"=>"",
        "city"=>"",
        "state"=>"",
        "pinCode"=>"",
        "country"=>"",
        "aadharNumber"=>"",
        "panNumber"=>""
    ],
    "message" => "",
    "data" => []
];

// for Account Type
if(!array_key_exists("accountType",$_POST)||strlen($_POST["accountType"])=="" ) {
    $result['status'] = false;
    $result['errors']["accountType"] = "Please select account type"; 
}

//for title
if(!array_key_exists("title",$_POST)||strlen($_POST["title"])=="" ) {
    $result['status'] = false;
    $result['errors']["title"] = "Please select a title"; 
}

// for first name
if(!array_key_exists("firstName",$_POST)||strlen($_POST["firstName"])==0){
    $result['status'] = false;
    $result['errors']["firstName"] = "Please enter first name";
}
elseif(!preg_match("/^[a-zA-Z-']*$/",$_POST["firstName"])){
    $result['status'] = false;
    $result['errors']["firstName"] = "Only letters are allowed";

}

//for last name
if(!array_key_exists("lastName",$_POST)||strlen($_POST["lastName"])==0){
    $result['status'] = false;
    $result['errors']["lastName"] = "Please enter last name";
}
elseif(!preg_match("/^[a-zA-Z-']*$/",$_POST["lastName"])){
    $result['status'] = false;
    $result['errors']["lastName"] = "Only letters are allowed";
}

// for dob
if(empty($_POST["dateOfBirth"])){
    $result['status'] = false;
    $result['errors']["dateOfBirth"] = "Please enter date of birth";
}

//for gender
if(empty($_POST["gender"])){
    $result['status'] = false;
    $result['errors']["gender"] = "Please select gender";
}

//for mobile number
if(!array_key_exists("mobileNumber",$_POST)||strlen($_POST["mobileNumber"])==0){
    $result['status'] = false;
    $result['errors']["mobileNumber"] = "Please enter mobile number";
} 
elseif(!preg_match('/^[0-9]{10}$/',$_POST["mobileNumber"])){
    $result['status'] = false;
    $result['errors']["mobileNumber"] = "Please enter a valid mobile number";
}

//for account number
if(!array_key_exists("accountNumber",$_POST)||strlen($_POST["accountNumber"])==0){
    $result['status'] = false;
    $result['errors']["accountNumber"] = "Please enter account number";
} 
else if(strlen($_POST["mobileNumber"])!=strlen($_POST["accountNumber"])){
    $result['status'] = false;
    $result['errors']["accountNumber"] = "Should be same as Mobile Number";
}

//for mail id
if(!array_key_exists("eMailId",$_POST)||strlen($_POST["eMailId"])==0){
    $result['status'] = false;
    $result['errors']["eMailId"] = "Please enter e-mail id";
}
elseif(!filter_var($_POST["eMailId"],FILTER_VALIDATE_EMAIL)){
    $result['status'] = false;
    $result['errors']["eMailId"] = "Please enter a valid e-mail id";
}
//for street address
if(!array_key_exists("streetAddress",$_POST)||strlen($_POST["streetAddress"])==0) {
    $result['status'] = false;
    $result['errors']["streetAddress"] = "Please enter street address"; 
}

//for city
if(!array_key_exists("city",$_POST)||strlen($_POST["city"])==0) {
    $result['status'] = false;
    $result['errors']["city"] = "Please enter name of the city"; 
}

//for state
if(!array_key_exists("state",$_POST)||strlen($_POST["state"])==0) {
    $result['status'] = false;
    $result['errors']["state"] = "Please enter state"; 
}

//for pinCode
if(!array_key_exists("pinCode",$_POST)||strlen($_POST["pinCode"])==0) {
    $result['status'] = false;
    $result['errors']["pinCode"] = "Please enter pin code"; 
}

else if(!preg_match('/^[0-9]{6}$/',$_POST["pinCode"])){
    $result['status'] = false;
    $result['errors']["pinCode"] = "Please enter  a valid pin code"; 
}

//for country
if(!array_key_exists("country",$_POST)||strlen($_POST["country"])==0) {
    $result['status'] = false;
    $result['errors']["country"] = "Please enter name of the country"; 
}

//for aadhar number
if(!array_key_exists("aadharNumber",$_POST)||strlen($_POST["aadharNumber"])==0){
    $result['status'] = false;
    $result['errors']["aadharNumber"] = "Please enter aadhar number";
}
elseif (!preg_match('/^[0-9]{12}$/', $_POST["aadharNumber"])) {
    $result['status'] = false;
    $result['errors']["aadharNumber"] = "Please enter a valid aadhar number";
}    

//for pan number
if(!array_key_exists("panNumber",$_POST)||strlen($_POST["panNumber"])==0){
    $result['status'] = false;
    $result['errors']["panNumber"] = "Please enter pan number";
}
elseif(!preg_match('/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/',$_POST["panNumber"])){
    $result['status'] = false;
    $result['errors']["panNumber"] = "Please enter a valid pan number";
}




//for printing errors
if($result['status'] == false){
     echo json_encode($result);
     return;
}




//for inserting values in data base tables



try{
    $statement = $pdo->prepare("select mobilenumber from customer_details where mobileNumber = ?");
    $statement->execute([$_POST['mobileNumber']]);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if(count($result)>0){
        $result['status']=false;
        $result['message']="Customer Already exists";
        echo json_encode($result);
        return;
    }

    $statement = $pdo->prepare("INSERT INTO customer_details(accountType,title,firstName,lastName,dateOfBirth,gender,mobileNumber,accountNumber,eMailId,streetAddress,city,state,pinCode,country,aadharNumber,panNumber) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $isQueryExecuted = $statement->execute([$_POST['accountType'],$_POST['title'],$_POST['firstName'],$_POST['lastName'],$_POST['dateOfBirth'],$_POST['gender'],$_POST['mobileNumber'],$_POST['accountNumber'],$_POST['eMailId'],$_POST['streetAddress'],$_POST['city'],$_POST['state'],$_POST['pinCode'],$_POST['country'],$_POST['aadharNumber'],$_POST['panNumber']]);



    // if($isQueryExecuted){

        $statement = $pdo->query("select id from customer_details order by id desc limit 1");
        $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

        $result['status']=true;
        $result['message']="Details Uploaded";
        $result['data'] = $resultSet[0]['id'];
        echo json_encode($result);
        return;
    // }
}
catch (PDOException $e) {
    die($e->getMessage());
}
 finally {
    if ($pdo) {
        $pdo = null;
    }
}


     // select id from last updated row
        // insert data in user_crdentials by using id
        // insert data in account_details by using id 
        //select * from account_details where id=accounts_id
?>