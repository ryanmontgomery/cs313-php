<?php
    //localhost
    $dsn = 'pgsql:host=localhost;dbname=mydb';
    $username = 'postgres';
    $password = 'monkeytoo2';
    
    //Remote host settings
    //$dsn = 'pgsql:host=localhost;dbname=hobby-dev';
    //$username = 'postgres';
    //$password = 'monkeytoo2';

    try {
        $db = new PDO('pgsql:host=localhost;dbname=mydb;user=postgres;password=monkeytoo2');
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "So Bad.";
        exit();
    }