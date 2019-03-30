<?php
    if ($_COOKIE['login'] == '') {
        header('Location: /authorization');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
        $website_title = 'Добавление статьи';
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
                <h4>Добавление статьи</h4>
                <form id='articleForm'>
                    <label for="login">Заголовок статьи</label>
                    <input type="text" name="title" id="title" class="form-control">
                    <label for="intro">Интро статьи</label>
                    <textarea name="intro" id="intro" class="form-control"></textarea>
                    <label for="text">Текст статьи</label>
                    <textarea name="text" id="text" class="form-control"></textarea>
                    <div class="alert alert-danger mt-2 hide" id='error'></div>
                    <button type="submit" id='addArticle' class="btn btn-success mt-3">Добавить статью</button>
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
<script src="js/article.js"></script>
</body>
</html>