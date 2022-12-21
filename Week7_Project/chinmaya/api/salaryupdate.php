<?php
 include "dbconnection.php";
 try{

    $statement3=$pdo->prepare("select * from salaries where employee_id=? and month=? and year=?");
    $statement3->execute([$_POST['employeeid'],$_POST['month'],$_POST['year1']]);
    $result2=$statement3->fetchAll(PDO::FETCH_ASSOC);

    if(count($result2)!=0){
        $response=["status"=>false,"message"=>"Data already exist"];
        echo json_encode($response);
        return;
    }

   $statement2=$pdo->prepare("insert into salaries (employee_id,month,year,paid_on,gross,deduction,net)values(?,?,?,?,?,?,?)");
   $isqueryexecute= $statement2->execute([$_POST['employeeid'],$_POST['month'],$_POST['year1'],$_POST['paid_on'],$_POST['gross'],$_POST['deduction'],$_POST['netsalary']]);

   if(!$isqueryexecute){
    $response=["status"=>false,"message"=>"Failed to add salary"];
        echo json_encode($response);
        return;
   }

   $statement=$pdo->prepare("select id from salaries order by id desc limit 1");
   $statement->execute();
   $result=$statement->fetchAll(PDO::FETCH_ASSOC);
   


   $statement3=$pdo->prepare("insert into salary_details (employee_id,salary_id,salary_component_id,amount) values(?,?,?,?),(?,?,?,?),(?,?,?,?),(?,?,?,?),(?,?,?,?),(?,?,?,?),(?,?,?,?),(?,?,?,?)");
   $isexecute=$statement3->execute([$_POST['employeeid'],$result[0]['id'],1,$_POST['baisc'],$_POST['employeeid'],$result[0]['id'],2,$_POST['da'],$_POST['employeeid'],$result[0]['id'],3,$_POST['hra'],$_POST['employeeid'],$result[0]['id'],4,$_POST['ca'],$_POST['employeeid'],$result[0]['id'],5,$_POST['ma'],$_POST['employeeid'],$result[0]['id'],6,$_POST['bonus'],$_POST['employeeid'],$result[0]['id'],7,$_POST['tds'],$_POST['employeeid'],$result[0]['id'],8,$_POST['pf']]);

   if(!$isexecute){
    $response=["status"=>false,"message"=>"Failed to add salarydetails"];
    echo json_encode($response);
    return;
   }


   
  

   
   $response=["status"=>true,"message"=>"Salary added succesfully"];
   echo json_encode($response);


 }
 catch (PDOException $e) {
    
    $response=["status"=>false,"message"=>"Can not login"];
    echo json_encode($response);
    return;

}