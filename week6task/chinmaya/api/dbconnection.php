<?php
$servername='localhost';
$databasename='employee';
$dbport='5432';
$dbUsername='postgres';
$dbPassword='postgres';
$dsn = "pgsql:host=$servername;port=$dbport;dbname=$databasename;";
$pdo = new PDO($dsn, $dbUsername, $dbPassword, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
if(!$pdo){
    echo "connection failed";
    return;
}
