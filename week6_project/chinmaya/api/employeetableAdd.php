<?php
include "dbconnection.php";

$status=true;
if(!array_key_exists('firstname',$_POST) || !$_POST['firstname']){
    $status=false;
}

if(!array_key_exists('lastname',$_POST) || !$_POST['lastname']){
    $status=false;
}

if(!array_key_exists('surename',$_POST) || !$_POST['surename']){
    $status=false;
}

if(!array_key_exists('doj',$_POST) || !$_POST['doj']){
    $status=false;
}

if(!array_key_exists('dob',$_POST) || !$_POST['dob']){
    $status=false;
}

if(!array_key_exists('gender',$_POST) || !$_POST['gender']){
    $status=false;
}

if(!array_key_exists('working_status',$_POST) || !$_POST['working_status']){
    $status=false;
}

if(!array_key_exists('designation',$_POST) || !$_POST['designation']){
    $status=false;
}

if(!array_key_exists('location',$_POST) || !$_POST['location']){
    $status=false;
}

if(!array_key_exists('grosssalary',$_POST) || !$_POST['grosssalary']){
    $status=false;
}

if(!$status){
    $response=["status"=>false,"message"=>"Please fill all the above details"];
    echo json_encode($response);
    return;
}

if(strlen($_POST['firstname'])>15){
    $status=false;
}

else if(preg_match('/[\'^£$%&*()}@{#~?><>,|=_+¬-]/',$_POST['firstname'])){
    $status=false;

}

if(strlen($_POST['lastname'])>15){
    $status=false;
}

else if(preg_match('/[\'^£$%&*()}@{#~?><>,|=_+¬-]/',$_POST['lastname'])){
    $status=false;
    
}
 

if(!$status){
    $response=["status"=>false,"message"=>"Cheack the above fields"];
    echo json_encode($response);
    return;
}




try{
    $statement=$pdo->prepare("insert into employees(firstname,lastname,surename,date_of_joining ,dob,gender,working_status_id ,designation_id,location_id,gross)values(?,?,?,?,?,?,?,?,?,?)");
    $isqueryexecuted=$statement->execute([$_POST['firstname'],$_POST['lastname'],$_POST['surename'],$_POST['doj'],$_POST['dob'],$_POST['gender'],$_POST['working_status'],$_POST['designation'],$_POST['location'],$_POST['grosssalary']]);


    if(!$isqueryexecuted){
        $response=["status"=>false,"message"=>"Can not add employee"];
        echo json_encode($response);
        return;
    }

    $response=["status"=>true,"message"=>"Employee added sucessfully"];
    echo json_encode($response);

}
catch(PDOException $e){
    $response=["status"=>false,"message"=>$e->getMessage()];
    echo json_encode($response);
}