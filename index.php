<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
        $website_title = 'PHP блог';
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
                <?php
                    require_once 'mysql_connect.php';

                    $sql = 'select * from `articles` order by `date` desc';

                    $query = $pdo->prepare($sql);
                    $query->execute();

                    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                        echo   "<article class='mb-5'>
                                    <h2>$row->title</h2>
                                    <p>$row->intro</p>
                                    <p><b>Автор статьи: </b><mark>$row->author</mark></p>
                                    <button class='btn btn-warning'>Читать больше...</button>
                                </article>";
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