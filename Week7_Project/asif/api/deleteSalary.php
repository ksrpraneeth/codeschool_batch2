<?php

include_once 'dbconnection.php';
include_once 'response.php';

if(!array_key_exists('id', $_POST)) {
    $response['status'] = false;
    $response['message'] = 'Invalid Request';
    echo json_encode($response);
    return;
}

try {
    $query = "DELETE FROM salaries, salary_details USING salaries, salary_details WHERE salary_details.salary_id = salaries.id AND salaries.id = ?";
    
    $statement = $pdo->prepare($query);
    $isQueryExecuted = $statement->execute([$_POST['id']]);
    
    if($isQueryExecuted > 0) {
        $response['status'] = true;
        $response['message'] = 'Salary Details Deleted';
        echo json_encode($response);
        return;
    }

    $response['status'] = false;
    $response['message'] = 'Error Deleting Salary Details!';    

} catch(PDOException $e) {
    $response['status'] = false;
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
return;
?>