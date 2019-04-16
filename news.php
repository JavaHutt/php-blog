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