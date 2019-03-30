<?php
    $login    = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
    $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));

    $error = '';

    if (strlen($login) < 3 || strlen($login) > 15) {
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

    $sql = 'select `id` from `users` where `login` = :login &&  `password` = :password';

    $query = $pdo->prepare($sql);
    $query->execute(['login' => $login, 'password' => $password]);

    $user = $query->fetch(PDO::FETCH_OBJ);

    if ($user->id == 0) {
        echo 'Такого пользователя не существует';
    } else {
        setcookie('login', $login, time() + 3600 * 24 * 30, '/');
        echo 'Готово';
    }
?>
