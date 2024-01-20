<?php
require_once "../db.php";

if ( !empty($_POST['name']) ) {
    $apppath = dirname(dirname(__FILE__));
    $filepath = '/img' . time() . basename($_FILES['file']['name']);
    $uploadfile = $apppath . '/' . $filepath;

    $uploadfile = $apppath . '/' . $filepath;

    move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
    $stmt = $pdo->prepare("insert into works(name, file_path) values(?,?)");
    $stmt->execute([
       $_POST['name'],
       $filepath
    ]);
 
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление работы в портфолио</title>
</head>
<body>
    <form action="add.php" method="post" enctype="multipart/form-data">
        <input required name="name" type="text" placeholder="Название">
        <input required name="file" type="file">
        <input type="submit" value="Создать">
    </form>
</body>
</html>