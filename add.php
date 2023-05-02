<?php
require_once 'config/connect_db.php';

$error = null;
$success = null;
try {
    if(isset($_POST['name'], $_POST['firstname'], $_POST['post'])) {
        $query = $pdo->prepare('INSERT INTO info (nom, prenom, poste) VALUES (:nom, :prenom, :poste)');
        $query->execute([
            'nom' => $_POST['name'],
            'prenom' => $_POST['firstname'],
            'poste' => $_POST['post']
        ]);
        header('Location: /index.php?id=' . $pdo->lastInsertId());
        exit();
    }
} catch (PDOException $e) {
    $error = $e->getMessage();
}
require 'elements/header.php';
?>

<div class="container">
    <h2>Ajouter un(e) nouvel(le) employé(e)</h2>

    <form action="" method="post" class="border p-5">
    <a href="/" class="my-3"> << Annuler</a>
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="firstname">Prénom</label>
            <input type="text" class="form-control" id="firstname" name="firstname" required>
        </div>
        <div class="form-group">
            <label for="name">Poste occupé</label>
            <input type="text" class="form-control" id="post" name="post" required>
        </div>
        <button type="submit" class="mb-3 form-control btn btn-primary">Ajouter</button>
    </form>
</div>

<?php require 'elements/footer.php'; ?>