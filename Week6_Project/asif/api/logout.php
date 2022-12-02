<?php

include 'dbconnection.php';
include 'response.php';

try {
    // fetch token from database
    $query = "SELECT id, token FROM users WHERE token = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([$_POST['token']]);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    // if not found
    if($result[0]['token'] != $_POST['token']) {
        $response['status'] = false;
        $response['message'] = 'Unable to Logout';
        echo json_encode($response);
        return;
    }
    
    
    // if valid token, update database
    $id = $result[0]['id'];
    $query = "UPDATE users SET status = 0, token = NULL WHERE id = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([$id]);

    $response['status'] = true;
    $response['message'] = 'Logout Success!';
    
} catch(PDOException $e) {
    $response['status'] = false;
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
return;

?>