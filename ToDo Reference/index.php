<?php

try {
    $dbServer = 'localhost';
    $dbDatabase = 'softwarehub';
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


    $statement = $pdo->prepare("Insert into organization (organization_id,name) values (?,?)");
    $isQueryExecuted = $statement->execute(['8436', 'HCL']);

    if ($isQueryExecuted) {
        $statement = $pdo->query("select * from organization");

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);

    }


} catch (PDOException $e) {
    die($e->getMessage());
} finally {
    if ($pdo) {
        $pdo = null;
    }
}