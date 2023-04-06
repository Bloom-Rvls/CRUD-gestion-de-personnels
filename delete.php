<?php
require_once 'config/connect_db.php';

try {
    if(isset($_GET['numero'])) {
        $query = $pdo->prepare('DELETE FROM info WHERE numero = :numero');
        $query->execute([
            'numero' => $_GET['numero']
        ]);
        header('Location: /index.php?numero='.$pdo->lastInsertId());
        exit();
    }
} catch (PDOException $e) {
    $e->getMessage();
}


