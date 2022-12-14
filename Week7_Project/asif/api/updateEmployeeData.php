<?php

include_once 'dbconnection.php';
include_once 'response.php';

// if(!array_key_exists('id', $_POST)) {
//     $response['status'] = false;
//     $response['message'] = 'Invalid Request';
//     echo json_encode($response);
//     return;
// }

try {
    $query = "UPDATE employees SET surname = ?, firstname = ?, lastname = ?, date_of_joining = ?, date_of_birth = ?, gender = ?, phone = ?, working_status_id = ?, designation_id = ?, location_id = ?, gross_salary = ? WHERE id = ?";


    $statement = $pdo->prepare($query);
    
    $result = $statement->execute([$_POST['surname'], $_POST['firstname'], $_POST['lastname'], $_POST['date_of_joining'], $_POST['date_of_birth'], $_POST['gender'], $_POST['phone'], $_POST['working_status_id'], $_POST['designation_id'], $_POST['location_id'], $_POST['gross_salary'], $_POST['id']]);
    
    if($result) {
        $response['status'] = true;
        $response['message'] = 'Update Success';
        $response['data'] = $result;
        echo json_encode($response);
        return;
    }

    $response['status'] = false;
    $response['message'] = 'Failed to Update';
    $response['data'] = $result;
    

} catch(PDOException $e) {
    $response['status'] = false;
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
return;
?>