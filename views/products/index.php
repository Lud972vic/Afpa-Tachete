<?php
$title = 'Projet PHP MVC avec MySQL';
include_once('config.php');
?>

<?php ob_start(); ?>
<h1>Pouvoir modifier facilement les prix des produits</h1>
    <table class="table table-sm table-striped">
        <thead>
        <tr>
            <th scope="col">Action</th>
            <th scope="col">ProductName</th>
            <th scope="col">QuantityPerUnit</th>
            <th scope="col">UnitPrice</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($products as $e): ?>
            <tr>
                <td><a class="btn btn-outline-primary" href="/<?= RACINE ?>/products/update/<?= $e['ProductID'] ?>">Modifier le prix</a>
                </td>
                <td><p><?= $e['ProductName'] ?></p></td>
                <td><p><?= $e['QuantityPerUnit'] ?></p></td>
                <td><p><?= $e['UnitPrice'] ?></p></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php $content = ob_get_clean(); ?>

<?php require('views/gabarit.php'); ?>
