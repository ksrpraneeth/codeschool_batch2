<?php
include('dbconnect.php');
$response = [];
$statement = $pdo->prepare("select * from timetable as t,deliveryday as d where t.dayid=d.dayid order by t.dayid");
$statement->execute();
$result = $statement->fetchall(PDO::FETCH_ASSOC);
// print_r($result);
// die();
// if($result){
//     $response['status']=true;
//     $response['output']=$result;
//     echo json_encode($response);
//     return;
// }

$data = [];


for($i=0;$i<count($result);$i++){
	$results = $result[$i]; 
    $groupBy = $results['day']; // 1,2
	if(!isset($data[$groupBy])){
    	$data[$groupBy] = [];
    }
    array_push($data[$groupBy],$results);
}

echo json_encode($data);
