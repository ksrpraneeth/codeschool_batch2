<?php
include 'db.php';
include 'responce.php';


try {
    $statement = $pdo->query("select * from menus");
    $response = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode([
        'status'=>true,
        'data'=>$response,
    ]);
}
catch (PDOException $e) {
    echo json_encode([
        'status'=>false,
        'message'=>$$e->getMessage(),
    ]);
}
?>
