<?php
 include "dbconnection.php";




 try{

$query="select concat(e.surename,' ',e.firstname,' ',e.lastname),s.id,s.month,s.year,to_char(s.paid_on,'DD-MM-YYYY')as paid_on,to_char(s.gross,'fm999G999D99')as gross,to_char(s.deduction,'fm999G999D99')as deduction,to_char(s.net,'fm999G999D99')as net,s.employee_id from employees as e,salaries as s where e.id=s.employee_id";

if($_POST['employeeId']!=''){
    $query .= ' and s.employee_id='.$_POST['employeeId'].'';
  
   
}
if($_POST['month']!=''){
    $query .=' and s.month='.$_POST['month'].'';
  
   
}
if($_POST['salaryyear']!=''){
    $query.=' and s.year='.$_POST['salaryyear'].'';
}

if($_POST['limitoption']==1){
    $query.=' and s.gross <'.$_POST['box1'].'';
}

if($_POST['limitoption']==2){
    $query.=' and s.gross>'.$_POST['box1'].'';
}

if($_POST['limitoption']==3){
    $query.=' and s.gross between '.$_POST['box1'].' and '.$_POST['box2'].'';
  
}

$statement=$pdo->prepare($query);
$statement->execute();
$result=$statement->fetchAll(PDO::FETCH_ASSOC);


if(count($result)==0){
    $response=["status"=>false,"message"=>"data not found"];
echo json_encode($response);
return;

}
$response=["status"=>true,"message"=>"data found","Data"=>$result];
echo json_encode($response);




 }
 catch (PDOException $e) {
    
    $response=["status"=>false,"message"=>"Can not login"];
    echo json_encode($response);
    return;

}