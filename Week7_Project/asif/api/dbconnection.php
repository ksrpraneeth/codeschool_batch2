<?php

$dbServer = 'localhost';
$dbDatabase = 'organization';
$dbPort = '3306';
$dbUsername = 'root';
$dbPassword = '';
$dsn = "mysql:host=$dbServer;dbname=$dbDatabase;port=$dbPort;";

// make a database connection using pdo
try {
    $pdo = new PDO($dsn, $dbUsername, $dbPassword, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch(PDOException $e) {
    die($e->getMessage());
}

?>