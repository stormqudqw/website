<?php

require_once "../db.php";

$stmt = $pdo->query("select * from messages");
$messages = $stmt->fetchAll();

$stmt = $pdo->query("select * from works");
$works = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="dist/css/lightgallery.min.css">
    <link rel="stylesheet" href="dist/css//lg-transitions.min.css">
    <style>

    table 
    {
        border-collapse: collapse;
        width: 100%;
    }

    td,th 
    {
        padding: 10px;
    }

    

</style>
    <title>Админка</title>
</head>
<body>
    <div class="container">
            <h2>Сообщения</h2>
            <table border="1">
                <tr>
                    <th>#</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Текст</th>
                    <th>Дата и время</th>
                </tr>

                <?php foreach ($messages as $key => $message) : ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= htmlspecialchars($message['name']) ?></td>
                        <td><?= htmlspecialchars($message['email']) ?></td>
                        <td><?= htmlspecialchars($message['text']) ?></td>
                        <td><?= $message['created_at'] ?></td>
                    </tr>
                <?php endforeach; ?>           
            </table>
            <h2 id="portfolio">Портфолио</h2> 
            
            <a href="add.php" class="btn-add">Добавить</a> 
            <div id="lightgallery" class="gallery">
              
            <?php foreach($works as $work): ?>
            <div class="admin-img-wrapper">
                <a class="img-wrapper" data-sub-html=<?= $work['name'] ?> href="http://website/<?= $work['file_path']?>">
                    <img src= "http://website/<?= $work['file_path']?>" alt="img" >
                </a>
                <a href="remove.php?id=<?= $work['id'] ?>" class="btn-rem">Удалить</a>
            </div>

            <?php endforeach; ?>

            </div> 
            <br><br><br><br>

        <h2>Сообщения</h2>
    </div>
    
  
</body>
</html>