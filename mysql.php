<?php

    define('DB_HOST', 'localhost');
    define('DB_DATABASE', 'back_end_course');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');

    try{
        $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE, DB_USER, DB_PASSWORD);

    }catch(Exception $e){
        die('Fatal Error trying to connect to database: ' . $e->getMessage());

    };

?>
