<?php
$pdo = new PDO('mysql:host=localhost:3306;dbname=personnel;charset=utf8','root','',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);