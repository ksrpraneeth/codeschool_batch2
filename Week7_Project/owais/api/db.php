<?php
$dbServer = 'localhost';
$dbDatabase = 'bankdatabase';
$dbPort = '5432';
$dbUsername = 'postgres';
$dbPassword = 'postgres';
$dsn = "pgsql:host=$dbServer;port=5432;dbname=$dbDatabase;";
// make a database connection
$pdo = new PDO($dsn, $dbUsername, $dbPassword, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

if (!$pdo) {
    echo "Could not connect to the database";
    return;
}