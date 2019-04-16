<?php
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $email    = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $message    = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));

    $error = '';

    if (strlen($username) < 3 || strlen($username) > 15) {
        $error = 'Введите имя';
    } elseif (strlen($email) < 5 || strlen($email) > 15) {
        $error = 'Введите email';
    } elseif (strlen($message) < 3 || strlen($message) > 250) {
        $error = 'Не менее 3 и не более 250 символов!';
    } 
    if ($error != '') {
        echo $error;
        exit();
    }
    $my_email = 'test@mail.ru';
    $subject = '=?utf-8?B?'.base64_encode('Новое сообщение с сайта').'?=';
    $headers = "From: $email\r\nReply-to: $email\r\nContent-type: text/html; charset='utf-8'\r\n";

    mail($my_email, $subject, $message, $headers);

    echo 'Готово';
?>
