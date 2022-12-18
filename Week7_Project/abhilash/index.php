<?php
include 'response.php';

include 'db.php';


// if (!array_key_exists('checkin', $_POST) || isset($_POST['checkin'])) {
//     $response['status'] = false;
//     $response['message'] = "Please Select Checkin Date";
//     echo json_encode($response);
//     return;
// }
// if (!array_key_exists('checkout', $_POST) || isset($_POST['checkout'])) {
//     $response['status'] = false;
//     $response['message'] = "Please select checkout date";
//     echo json_encode($response);
//     return;
// }
// if ($_POST['Checkin']!==""&& $_POST['checkout']!=="") {
//     $response['status'] = false;
//     $response['message'] = "plase select checkin and checkout dates";
//     echo json_encode($response);
//     return;
// } 

// // else { 
// //     $response['status'] = true;
// //     $response['data'] =[($_POST['checkin'])] [($_POST['checkout'])];
// //     echo json_encode($response);


// // }


try {

    $statement = $pdo->prepare("select * from hotels");
    $statement->execute();
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (count($response) == 0) {
        $response['status'] = false;
        $response['message'] = "this is empty";
        echo json_encode($response);
        return;
    } else {
        $response['status'] = true;
        $response['output'] = $resultSet;
        echo json_encode($response);
        return;
    }
} catch (PDOException $e) {
    die($e->getMessage());
} finally {
    if ($pdo) {
        $pdo = null;
    }
}