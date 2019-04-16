<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
        $website_title = 'Контакты';
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
                <h4>Обратная связь</h4>
                <form id='feedbackForm'>
                    <label for="username">Имя</label>
                    <input type="text" name="username" id="username" class="form-control" minlength="3" maxlength="15">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" minlength="5">
                    <label for="message">Сообщение</label>
                    <textarea name="message" id="message" class="form-control"></textarea>
                    <div class="alert alert-danger mt-2 hide" id='error'></div>
                    <button type="submit" id='feedbackSend' class="btn btn-success mt-3">Отправить сообщение</button>
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
<script src="js/feedback.js"></script>
</body>
</html>