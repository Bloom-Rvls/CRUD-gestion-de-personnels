<?php 
require_once 'config/connect_db.php';

$error = null;
$success = null;
try {
    $query = $pdo->query('SELECT * FROM info');
    $infos = $query->fetchAll(PDO::FETCH_OBJ);
} catch (PDOException $e) {
    $error = $e->getMessage();
}

require 'elements/header.php';
?>

<div class="container">
    <?php if($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php else : ?>
        <h2 class="">Liste du personnel</h2>
        <table class="table">
            <thead class="thead-light">
                <th scope="col">Numero</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Poste</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </thead>
            <tbody>
                <?php foreach($infos as $info): ?>
                    <tr>
                        <th scope="row"><?= $info->numero ?></th>
                        <td><?= $info->nom ?></td>
                        <td><?= $info->prenom ?></td>
                        <td><?= $info->poste ?></td>
                        <td><a href="modify.php" class=" text-success"><i class="fas fa-edit"></i></a></td>
                        <td><a href="delete.php" class=" text-danger"><i class="fas fa-trash"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="add.php" type="button" class="btn btn-primary btn-lg fa fa-plus"> Nouveau</a>
       
    <?php endif; ?>
</div>
<?php require 'elements/footer.php';?>