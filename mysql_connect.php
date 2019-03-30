<?php
    $dbuser = 'root';
    $dbpassword = '';
    $db = 'users';
    $host = 'localhost';

    $dsn = 'mysql:host='.$host.';dbname='.$db;
    $pdo = new PDO($dsn, $dbuser, $dbpassword);
?>