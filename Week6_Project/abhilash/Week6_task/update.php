<?php
include 'response.php';

include 'db.php';

if ((!array_key_exists('booking_id', $_POST)) && (!array_key_exists('status', $_POST))){
    $response['status'] = false;
    $response['message'] = "Keys Not Exist ";
    echo json_encode($response);
    return;
}
if (strlen($_POST['booking_id']) == 0) {
    $response['status'] = false;
    $response['message'] = "Please Enter Booking Id ";
    echo json_encode($response);
    return;
}
if (strlen($_POST['status']) == 0) {
    $response['status'] = false;
    $response['message'] = "status id is not exist ";
    echo json_encode($response);
    return;
  
}
try {
    $statement = $pdo->prepare("select id from users where token=?");
    $resultSet = $statement->execute([($_POST['user_id'])]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    $user_Id = ($resultSet[0]['id']);

    $statement = $pdo->prepare("Update booking_transactions SET status=? where id=?");
    $resultSet = $statement->execute([$_POST['status'],$_POST['booking_id']]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    $status = ($resultSet[0]['id']); 
    
    $statement = $pdo->prepare("select h.name as hotel_name,ht.description as hotel_type,rc.description as room_type, bt.total_amount as price,s.description as status,bt.id as booking_id,bt.check_in as from_Date,check_out as to_Date
    from price p,rooms r,hotels h,hotel_type ht,room_categery rc,users u,booking_transactions bt,status s
    where r.id =p.room_id And r.hotel_id=h.id And u.id=? AND s.id=?
    AND ht.id=h.hotel_type_id and rc.id=r.room_categery_id
    And r.id IN(select user_id from booking_transactions)");
    $statement->execute([$user_Id,$status]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    $response['status'] = true;
    $response['message'] = "ACCEPTED";
    $response['output'] = $resultSet;
    echo json_encode($response);
    return;
} catch (PDOException $e) {
    die($e->getMessage());
} finally {
    if ($pdo) {
        $pdo = null;
    }
}