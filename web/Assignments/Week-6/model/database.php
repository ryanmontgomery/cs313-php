<?php

// Connecting to database (localhost)
/*
try {
    $dsn = 'pgsql:host=localhost;dbname=postgres';
    $user = 'postgres';
    $password = 'monkeytoo2';
    
    $db = new PDO('pgsql:host=localhost;dbname=postgres', $user, $password);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo $e . "Doesn't work...";
    exit();
}
*/


// Connecting to database (Heroku)
$dbUrl = getenv('DATABASE_URL');

$dbopts = parse_url($dbUrl);

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);