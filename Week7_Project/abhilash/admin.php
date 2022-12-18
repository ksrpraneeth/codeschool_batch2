<?php
include 'response.php';

include 'db.php';


try {
     $statement = $pdo->prepare("SELECT bt.id as booking_id,
            u.name,
            u.mobile,
            r.room_no,h.name as hotel_name,bt.total_amount,
            bt.check_in as from_date,
            bt.check_out as to_date,s.description as status
        FROM booking_transactions bt,
            users as u,rooms as r, hotels h,status s
        where u.id = bt.user_id
            and bt.room_id = r.id and r.hotel_id=h.id and bt.status = s.id");
            $statement->execute();
            $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
            $response['status'] = true;
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