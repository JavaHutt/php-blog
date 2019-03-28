<?php
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
    $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));

    if (strlen($username) < 3 || strlen($username) > 15) {
        exit();
    } elseif (strlen($email) < 5 || strlen($email) > 15) {
        exit();
    } elseif (strlen($login) < 3 || strlen($login) > 15) {
        exit();
    } elseif (strlen($password) < 8) {
        exit();
    }

    // соль:
    $hash = 'ssdfw1@#t522egfdgsd@a-sd/saddas';
    // кодировка пароля в md5:
    $password = md5($password . $hash);

    $dbuser = 'root';
    $dbpassword = '';
    $db = 'users';
    $host = 'localhost';

    $dsn = 'mysql:host='.$host.';dbname='.$db;
    $pdo = new PDO($dsn, $dbuser, $dbpassword);
    $sql = 'insert into users(username, email, login, password) values(?, ?, ?, ?)';

    $query = $pdo->prepare($sql);
    $query->execute([$username, $email, $login, $password]);
?>