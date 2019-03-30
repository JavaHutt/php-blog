<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
        $website_title = 'Регистрация на сайте';
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
                <h4>Регистрация</h4>
                <form id='regForm'>
                    <label for="username">Имя</label>
                    <input type="text" name="username" id="username" class="form-control" minlength="3" maxlength="15">
                    <label for="login">Логин</label>
                    <input type="text" name="login" id="login" class="form-control" minlength="3" maxlength="15">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" minlength="5">
                    <label for="password">Пароль</label>
                    <input type="password" name="password" id="password" class="form-control" minlength="8">
                    <div class="alert alert-danger mt-2 hide" id='error'></div>
                    <button type="submit" id='regUser' class="btn btn-success mt-3">Зарегистрироваться</button>
                </form>
            </div>
            <?php
                include 'blocks/aside.php';
            ?>
        </div>
        
    </main>
    <?php
        include 'blocks/footer.php';
    ?>
<script src="js/reg.js"></script>
</body>
</html>