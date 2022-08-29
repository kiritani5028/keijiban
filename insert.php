<?php

mb_internal_encoding("utf8");

$pdo = new  PDO("mysql:dbname=php_lesson01; host=localhost;", "root", "");

$pdo->exec("insert into 4each_bulletin_board(handlename,title,comments)
values('".$_POST['handlename']."', '".$_POST['title']."', '".$_POST['comments']."');");

header("Location:http://localhost/4each_bulletin_board/index.php");