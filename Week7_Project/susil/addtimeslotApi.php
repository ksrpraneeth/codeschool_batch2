<?php
include('dbconnect.php');
$response = [
    'status'=>false,
    'message'=>'',
    'data'=>null
];

if(!array_key_exists('startTime',$_POST)){
    $response['status']=false;
    $response['message']="Please enter Start Time";
    echo json_encode($response);
    return;
}
if(!array_key_exists('endTime',$_POST)){
    $response['status']=false;
    $response['message']="Please enter End Time";
    echo json_encode($response);
    return;    
}

if(strlen($_POST['startTime'])==0){
    $response['status']=false;
    $response['message']="Please enter Start Time";
    echo json_encode($response);
    return;
}
if(strlen($_POST['endTime'])==0){
    $response['status']=false;
    $response['message']="Please enter End Time";
    echo json_encode($response);
    return;
}
$statement = $pdo->prepare("INSERT INTO timetable (starttime,endtime,dayid) values (?,?,?)");
$isQueryExecuted = $statement->execute([$_POST['startTime'], $_POST['endTime'],$_POST['dayid']]);
if($isQueryExecuted){
    $response['status']=true;
    $response['message']="Timeslot added successfull";
    echo json_encode($response);
    return;
}
?>