<?php
include 'responce.php';
include 'db.php';
 
if(!array_key_exists('organization_id',$_POST)){
    $response['status']=false;
    $response['message']="Select Organization";
    echo json_encode($response);
    return;
}

if(strlen($_POST['organization_id'])==0){
    $response['status']=false;
    $response['message']="Select Organization";
    echo json_encode($response);
    return;
}

if(!array_key_exists('designation',$_POST)){
    $response['status']=false;
    $response['message']="Select designation";
    echo json_encode($response);
    return;
}

if(strlen($_POST['designation'])==0){
    $response['status']=false;
    $response['message']="Select designation";
    echo json_encode($response);
    return;
}

if(!array_key_exists('employee_name',$_POST)){
    $response['status']=false;
    $response['message']="Please enter Name";
    echo json_encode($response);
    return;
}

if(strlen($_POST['employee_name'])==0){
    $response['status']=false;
    $response['message']="Name cannot be blank";
    echo json_encode($response);
    return;
}


if(!array_key_exists('mobile',$_POST)){
    $response['status']=false;
    $response['message']="Please enter Mobile Number";
    echo json_encode($response);
    return;
}

if(strlen($_POST['mobile'])==0){
    $response['status']=false;
    $response['message']="Mobile cannot be blank";
    echo json_encode($response);
    return;
}

if(!array_key_exists('email_id',$_POST)){
    $response['status']=false;
    $response['message']="Please enter email id";
    echo json_encode($response);
    return;
}

if(strlen($_POST['email_id'])==0){
    $response['status']=false;
    $response['message']="Email cannot be blank";
    echo json_encode($response);
    return;
}

if(!array_key_exists('income',$_POST)){
    $response['status']=false;
    $response['message']="Please enter income";
    echo json_encode($response);
    return;
}

if(strlen($_POST['income'])==0){
    $response['status']=false;
    $response['message']="Please provide income details";
    echo json_encode($response);
    return;
}



try {

    $statement = $pdo->prepare("SELECT MAX(employee_id) FROM employees
    WHERE organization_id=?;");
    $statement->execute([$_POST['organization_id']]);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $str = $result[0]['max'];
    // for ($i=0; $i <  ; $i++) { 
    //     # code...
    // }

    $start = substr($str,0,6);
    $end = substr($str,6);
    $end = (int) $end + 1; 
    $employeeid = $start . $end;

    // echo $employeeid;

    // $statement = $pdo->prepare("SELECT employee_name,mobile,email_id ,income 
    // FROM   employees");
    // $statement->execute();
    // $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    // if (count($resultSet) == 0) {
    //     $response['status'] = false;
    //     $response['message'] = "no data found";
    //     echo json_encode($response);
    //     return;
    // }
    
    // $response['status'] = true;
    // $response['message'] = "passed";
    // $response['data'] = $resultSet;

    $statement = $pdo->prepare("INSERT INTO employees (employee_id,organization_id,employee_name,mobile,email_id,income,designation) VALUES (?,?,?,?,?,?,?)");
    $isQueryExecuted = $statement->execute([$employeeid,($_POST['organization_id']),($_POST['employee_name']),($_POST['mobile']),($_POST['email_id']),($_POST['income']),($_POST['designation'])]);
    if($isQueryExecuted){
        $response['status']=true;
        $response['message']="Employee details submitted successfully";
        echo json_encode($response);
        return;
    }

} catch (PDOException $e) {
    die($e->getMessage());
} 
finally {
    if ($pdo) {
        $pdo = null;
    }
}