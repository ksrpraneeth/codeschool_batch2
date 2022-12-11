<?php
include 'response.php';

include 'db.php';

$hotel_id = $_GET['id'];

try {

    $statement = $pdo->prepare(" select h.hotels_images,h.name as hotel_name,ht.description as hotel_type,r.id as available_room,rc.description as room_type,rc.room_images,p.price from price p,rooms r,hotels h,hotel_type ht,room_categery rc where r.id =p.room_id And r.hotel_id=h.id And h.id=? AND ht.id=h.hotel_type_id and rc.id=r.room_categery_id and r.id not in(select room_id from booking_transactions)");
    $statement->execute([$hotel_id]);
    $roomset = $statement->fetchAll(PDO::FETCH_ASSOC);

    $response['status'] = true;
    $response['output'] = $roomset;
    echo json_encode($response);
    return;

} catch (PDOException $e) {
    die($e->getMessage());
} finally {
    if ($pdo) {
        $pdo = null;
    }
}