<?php
    setcookie('login', $login, time() - 3600 * 24 * 30, '/');
    echo true;
?>