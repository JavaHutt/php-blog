<?php
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $email    = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $login    = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
    $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));

    $error = '';

    if (strlen($username) < 3 || strlen($username) > 15) {
        $error = 'Введите имя';
    } elseif (strlen($email) < 5 || strlen($email) > 15) {
        $error = 'Введите email';
    } elseif (strlen($login) < 3 || strlen($login) > 15) {
        $error = 'Введите login';
    } elseif (strlen($password) < 8) {
        $error = 'Введите пароль';
    }
    if ($error != '') {
        echo $error;
        exit();
    }

    // соль
    $hash = 'ssdfw1@#t522egfdgsd@a-sd/saddas';
    // кодировка пароля в md5
    $password = md5($password . $hash);

    require_once '../mysql_connect.php';

    $sql = 'insert into users(username, email, login, password) values(?, ?, ?, ?)';

    $query = $pdo->prepare($sql);
    $query->execute([$username, $email, $login, $password]);

    echo 'Готово';
?>
