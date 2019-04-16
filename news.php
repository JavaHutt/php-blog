<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
        require_once 'mysql_connect.php';

        $sql = 'select * from `articles` where `id` = :id';
        $id  = $_GET['id'];
        $query = $pdo->prepare($sql);
        $query->execute(['id' => $id]);
        $article = $query->fetch(PDO::FETCH_OBJ);


        $website_title = $article->title;
        require 'blocks/head.php';
    ?>
</head>
<body>
    <?php
        include 'blocks/header.php';
    ?>
    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8 mb-3">
                <div class="jumbotron">
                    <h1><?=$article->title?></h1>
                    <p><b>Автор статьи: </b><mark><?=$article->author?></mark></p>
                    <?php
                        $date = date('d ', $article->date);
                        $array = ['Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря'];
                        $date .= $array[date('n', $article->date) - 1];
                        $date .= date(' H:i', $article->date);
                    ?>
                    <p><b>Время публикации: </b><u><?=$date?></u></p>
                    <strong><?=$article->intro?></strong>
                    <p><?=$article->text?></p>
                </div>
                <h3 class='mt-5'>Комментарии</h3>
                <form action="/news.php?id=<?=$id?>" method='post'>
                    <label for="username">Имя</label>
                    <input type="text" name="username" value="<?=$_COOKIE['login'] ?>" id="username" class="form-control" minlength="3" maxlength="15">
                    <label for="message">Сообщение</label>
                    <textarea name="message" id="message" class="form-control"></textarea>
                    <button type="submit" id='messageSend' class="btn btn-success mt-3 mb-5">Добавить комментарий</button>
                </form>
                <?php
                    if ($_POST['username'] != '' && $_POST['message'] != '') {
                        $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
                        $message  = trim(filter_var($_POST['message'], FILTER_SANITIZE_STRING));

                        $sql = 'insert into comments(name, message, article_id) values(?, ?, ?)';
                        $query = $pdo->prepare($sql);
                        $query->execute([$username, $message, $id]);
                    }
                    $sql = 'select * from `comments` where `article_id` = :id order by `id`';
                    $query = $pdo->prepare($sql);
                    $query->execute(['id' => $id]);
                    $comments = $query->fetchAll(PDO::FETCH_OBJ);

                    foreach ($comments as $comment) {
                        echo "<div class='alert alert-info mb-20'>
                            <h4>$comment->name</h4>
                            <p>$comment->message</p>
                        </div>";
                    }
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
</div>
</body>
</html>