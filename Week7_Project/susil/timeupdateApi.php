<?php
include('dbconnect.php');


$statement=$pdo->prepare("select status from timetable where timeid=?");
$statement->execute([$_POST['timeid']]);
$result = $statement->fetchall(PDO::FETCH_ASSOC);
print_r($result);
die();

if($result[])