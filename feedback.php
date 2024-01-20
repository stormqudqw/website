<?php
    require "db.php";
    if( !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['text']) )
    {
        $stmt = $pdo->prepare("INSERT INTO `Messages`(name, email, text) values(?,?,?)");   
        $stmt->execute([
        $_POST['name'],
        $_POST['email'],
        $_POST['text']
    ]);
    
    }
    header("Location: index.php");
