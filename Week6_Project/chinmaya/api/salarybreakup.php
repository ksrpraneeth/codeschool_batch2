<?php


try {
    include "dbconnection.php";
    $employeeid=$_POST['employeeid'];
    


    $statement1=$pdo->prepare("select concat(e.surename,' ',e.firstname,' ',e.lastname),w.status_description,l.district,d.description from employees as e,working_status as w,location as l,designation as d where e.working_status_id=w.id and e.location_id=l.id and e.designation_id =d.id and e.id=?");
    $statement1->execute([$employeeid]);
    $employeedetails=$statement1->fetchAll(PDO::FETCH_ASSOC);

    $statement2=$pdo->prepare("select sc.description ,sd.amount from salary_details as sd ,salary_component as sc,salaries as s where sd.salary_component_id=sc.id and s.id=sd.salary_id and s.employee_id=? and sc.type='earnings' ;");
    $statement2->execute([$employeeid]);
    $earning=$statement2->fetchAll(PDO::FETCH_ASSOC);
    

    $statement3=$pdo->prepare(" select sc.description ,sd.amount from salary_details as sd ,salary_component as sc,salaries as s where sd.salary_component_id=sc.id and s.id=sd.salary_id and s.employee_id=? and sc.type='deduction' ;");
    $statement3->execute([$employeeid]);
    $deduction=$statement3->fetchAll(PDO::FETCH_ASSOC);


    if(count($employeedetails)==0){
        $response=["status"=>false,"message"=>"Data is not found"];
        echo json_encode($response);
        return;
    }
    // $response=["status"=>true,"output"=>$employeedetails,"earning"=>$earning,"deduction"=>$deduction];
    $response=["status"=>true,"message"=>"","Data"=>["output"=>$employeedetails,"earning"=>$earning,"deduction"=>$deduction]];
    echo json_encode($response);


} 


catch (PDOException $e) {
    $response=["status"=>false,"message"=>"data is not found"];
    echo json_encode($response);
    return;


}

