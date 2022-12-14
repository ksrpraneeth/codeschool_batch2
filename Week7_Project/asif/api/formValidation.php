<?php

include 'dbconnection.php';

$response = [
    "status" => true,
    "message" => "",
    "errors" => [
        "firstNameError" => '',
        "lastNameError" => '',
        "dateOfJoiningError" => '',
        "dateOfBirthError" => '',
        "mobileNumberError" => '',
        "grossSalaryError" => ''
    ]
];


// check for validations
if(!array_key_exists("firstName", $_POST) || strlen($_POST["firstName"]) == 0) {
    $response["errors"]["firstNameError"] = "Please enter first name";
    $response["status"] = false;
}
else if(!preg_match("/^[A-Z]+$/i", $_POST["firstName"])) {
    $response["errors"]["firstNameError"] = "Invalid first name";
    $response["status"] = false;
}


if(!array_key_exists("lastName", $_POST) || strlen($_POST["lastName"]) == 0) {
    $response["errors"]["lastNameError"] = "Please enter last name";
    $response["status"] = false;
}
else if(!preg_match("/^[A-Z]+$/i", $_POST["lastName"])) {
    $response["errors"]["lastNameError"] = "Invalid last name";
    $response["status"] = false;
}


if(!array_key_exists("dateOfJoining", $_POST) || $_POST["dateOfJoining"] == "") {
    $response["errors"]["dateOfJoiningError"] = "Please select date of joining";
    $response["status"] = false;
}
if($_POST["dateOfJoining"] < '2000-01-01' || $_POST["dateOfJoining"] > date("y-m-d") || $_POST["dateOfJoining"] < $_POST["dateOfBirth"]) {
    $response["errors"]["dateOfJoiningError"] = "Please select valid date of joining";
    $response["status"] = false;
}

if(!array_key_exists("dateOfBirth", $_POST) || $_POST["dateOfBirth"] == "") {
    $response["errors"]["dateOfBirthError"] = "Please enter date of birth";
    $response["status"] = false;
}
else if($_POST["dateOfBirth"] < '1930-01-01' || $_POST["dateOfBirth"] > date("y-m-d") || $_POST["dateOfBirth"] > $_POST["dateOfJoining"]) {
    $response["errors"]["dateOfBirthError"] = "Please select valid date of birth";
    $response["status"] = false;
}


if(!array_key_exists("mobileNumber", $_POST) || strlen($_POST["mobileNumber"]) == 0) {
    $response["errors"]["mobileNumberError"] = "Please enter mobile number";
    $response["status"] = false;
}
else if(!preg_match("/^[0-9]+$/", $_POST["mobileNumber"]) || strlen($_POST["mobileNumber"]) != 10) {
    $response["errors"]["mobileNumberError"] = "Mobile number should be 10 digits number only!";
    $response["status"] = false;
}


if(!array_key_exists("grossSalary", $_POST) || strlen($_POST["grossSalary"]) == 0) {
    $response["errors"]["grossSalaryError"] = "Please enter gross salary";
    $response["status"] = false;
}
else if(!preg_match("/^[0-9]+$/", $_POST["grossSalary"]) || $_POST["grossSalary"] > 5000000) {
    $response["errors"]["grossSalaryError"] = "Enter correct salary amount";
    $response["status"] = false;
}


// if errors, return error messages
if($response["status"] == false) {
    $response["message"] = "Please Enter Correct Form Details!";
    echo json_encode($response);
    return;
}


// else insert the data into database
include_once 'response.php';

try {
    $query = "INSERT INTO employees(surname, firstname, lastname, date_of_joining, date_of_birth, gender, phone, working_status_id, designation_id, location_id, gross_salary) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $statement = $pdo->prepare($query);
    
    $isQueryExecuted = $statement->execute([$_POST['surname'], $_POST['firstName'], $_POST['lastName'], $_POST['dateOfJoining'], $_POST['dateOfBirth'], $_POST['gender'], $_POST['mobileNumber'], $_POST['workingStatus'], $_POST['designation'], $_POST['location'], $_POST['grossSalary']]);
    
    if($isQueryExecuted) {
        $response['status'] = true;
        $response['message'] = 'New Employee Added Successfully';
        echo json_encode($response);
        return;
    }

    $response['status'] = false;
    $response['message'] = 'Error Adding New Employee!';

} catch(PDOException $e) {
    $response['status'] = false;
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
return;
?>