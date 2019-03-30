<?php
    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
    $intro = trim(filter_var($_POST['intro'], FILTER_SANITIZE_STRING));
    $text  = trim(filter_var($_POST['text'], FILTER_SANITIZE_STRING));

    $error = '';

    if (strlen($title) < 3) {
        $error = 'Введите название статьи';
    } elseif (strlen($intro) < 15) {
        $error = 'Введите интро статьи';
    } elseif (strlen($text) < 20) {
        $error = 'Введите текст статьи';
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

    $sql = 'insert into articles(title, intro, text, date, author) values(?, ?, ?, ?, ?)';

    $query = $pdo->prepare($sql);
    $query->execute([$title, $intro, $text, time(), $_COOKIE['login']]);

    echo 'Готово';
?>
