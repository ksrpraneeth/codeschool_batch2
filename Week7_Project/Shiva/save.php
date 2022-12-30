<?php
include 'responce.php';
include 'db.php';

// if(!array_key_exists('employee_id',$_POST)){
//     $response['status']=false;
//     $response['message']="Employee id cannot be blank";
//     echo json_encode($response);
//     return;
// }

// if(strlen($_POST['employee_id'])==0){
//     $response['status']=false;
//     $response['message']="Employee id cannot be blank";
//     echo json_encode($response);
//     return;
// }

// if(!array_key_exists('designation',$_POST)){
//     $response['status']=false;
//     $response['message']="Select designation";
//     echo json_encode($response);
//     return;
// }

// if(strlen($_POST['designation'])==0){
//     $response['status']=false;
//     $response['message']="Select designation";
//     echo json_encode($response);
//     return;
// }

// if(!array_key_exists('employee_name',$_POST)){
//     $response['status']=false;
//     $response['message']="Please enter Name";
//     echo json_encode($response);
//     return;
// }

// if(strlen($_POST['employee_name'])==0){
//     $response['status']=false;
//     $response['message']="Name cannot be blank";
//     echo json_encode($response);
//     return;
// }


// if(!array_key_exists('mobile',$_POST)){
//     $response['status']=false;
//     $response['message']="Please enter Mobile Number";
//     echo json_encode($response);
//     return;
// }

// if(strlen($_POST['mobile'])==0){
//     $response['status']=false;
//     $response['message']="Mobile cannot be blank";
//     echo json_encode($response);
//     return;
// }

// if(!array_key_exists('email_id',$_POST)){
//     $response['status']=false;
//     $response['message']="Please enter email id";
//     echo json_encode($response);
//     return;
// }

// if(strlen($_POST['email_id'])==0){
//     $response['status']=false;
//     $response['message']="Email cannot be blank";
//     echo json_encode($response);
//     return;
// }

// if(!array_key_exists('income',$_POST)){
//     $response['status']=false;
//     $response['message']="Please enter income";
//     echo json_encode($response);
//     return;
// }

// if(strlen($_POST['income'])==0){
//     $response['status']=false;
//     $response['message']="Please provide income details";
//     echo json_encode($response);
//     return;
// }


try {

    $statement = $pdo->prepare("select * from employees where organization_id=? and id=?");
    $statement->execute([$_POST['orgid'], $_POST['tableid']]);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);



    if(count($result)==0){
        $response['status']=false;
             $response['message']="Can't find the data";
             echo json_encode($response);
             return;
    }

    $statement2 = $pdo->prepare("select * from designations");
    $statement2->execute();
    $result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);


    $response2 = ["status" => true, "output1" => $result, "output2" => $result2];
    echo json_encode($response2);
}
catch (PDOException $e) {
    echo json_encode([
        'status'=>false,
        'message'=>$e->getMessage(),
    ]);
}
?>