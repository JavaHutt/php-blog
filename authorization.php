<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
        $website_title = 'Авторизация на сайте';
        require 'blocks/head.php';
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
</head>
<body>
    <?php
        include 'blocks/header.php';
    ?>
    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8 mb-3">
                <?php
                    if ($_COOKIE['login'] == ''):
                ?>
                <h4>Авторизация</h4>
                <form id='authForm'>
                    <label for="login">Логин</label>
                    <input type="text" name="login" id="login" class="form-control" minlength="3" maxlength="15">
                    <label for="password">Пароль</label>
                    <input type="password" name="password" id="password" class="form-control" minlength="8">
                    <div class="alert alert-danger mt-2 hide" id='error'></div>
                    <button type="submit" id='authUser' class="btn btn-success mt-3">Войти</button>
                </form>
                <?php
                    else:
                ?>
                <h2><?= $_COOKIE['login'] ?></h2>
                <button type='button' class='btn btn-danger' id='exitUser'>Выход</button>
                <?php
                    endif;
                ?>
            </div>
            <?php
                include 'blocks/aside.php';
            ?>
        </div>
    </main>
    <?php
        include 'blocks/footer.php';
    ?>
<script src="js/auth.js"></script>
</body>
</html>