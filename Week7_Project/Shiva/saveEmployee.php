<?php
include 'responce.php';
include 'db.php';

try {

    $statement = $pdo->prepare("update employees set employee_name=? ,mobile=?,email_id=?,income=?,designation=? where id=?");
    $isexecute = $statement->execute([$_POST['name'], $_POST['mobile'], $_POST['email'], $_POST['income'], $_POST['designation'], $_POST['tid']]);

    if(!$isexecute){
        $response['status']=false;
        $response['message']="Can not update";
        echo json_encode($response);
        return;
    }
    $response['status']=true;
    $response['message']="Updated succesfully";
    echo json_encode($response);
    
}
catch (PDOException $e) {
echo json_encode([
    'status'=>false,
    'message'=>$e->getMessage(),
]);
}

?>