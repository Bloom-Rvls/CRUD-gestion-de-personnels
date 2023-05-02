<?php
require_once 'config/connect_db.php';

$error = null;
$success = null;
try {
    if(isset($_POST['name'], $_POST['firstname'], $_POST['post'])) {
        $query = $pdo->prepare('UPDATE info SET nom = :nom, prenom = :prenom, poste = :poste WHERE numero = :numero');
        $query->execute([
            'nom' => $_POST['name'],
            'prenom' => $_POST['firstname'],
            'poste' => $_POST['post'],
            'numero' => $_GET['numero']
        ]);
        $success = 'Renseignements correctement modifiés';
    }
    $query = $pdo->prepare('SELECT * FROM info WHERE numero= :numero');
    $query->execute([
        'numero' => $_GET['numero']
    ]);
    $info = $query->fetch();
} catch (PDOException $e) {
    $error = $e->getMessage();
}
require 'elements/header.php';
?>

<div class="container">
    <h2>Modifier les rensignements</h2>
    <p>
        <a href="/"> << Revenir à la liste </a>
    </p>
    <?php if($success) : ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>
    <?php if ($error) : ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif ?>

    <form action="" method="post" class="border p-5">
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= htmlentities($info->nom) ?>">
        </div>
        <div class="form-group">
            <label for="firstname">Prénom</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?= htmlentities($info->prenom) ?>">
        </div>
        <div class="form-group">
            <label for="name">Poste occupé</label>
            <input type="text" class="form-control" id="post" name="post" value="<?= htmlentities($info->poste) ?>">
        </div>
        <button type="submit" class=" form-control btn btn-success">Modifier</button>
    </form>
</div>

<?php require 'elements/footer.php'; ?>