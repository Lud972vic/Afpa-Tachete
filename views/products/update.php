<?php
$title = 'Projet PHP MVC avec MySQL';
include_once('config.php');
?>

<?php ob_start(); ?>
    <h1>Mise à jour du prix</h1>

    <table class="table table-sm table-striped">
        <thead>
        <tr>
            <th scope="col">ProductName</th>
            <th scope="col">QuantityPerUnit</th>
            <th scope="col">UnitPrice</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($products as $e): ?>
            <tr>
                <td><p><?= $e['ProductName'] ?></p></td>
                <td><p><?= $e['QuantityPerUnit'] ?></p></td>
                <td><p><?= $e['UnitPrice'] ?></p></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <form action="/<?= RACINE ?>/products/save" method="post">
        <div class="container col-md-4 form-group">
            <label for="id">Référence produit : </label>
            <input class="form-control mb-2" type="int" name="id" id="id" readonly="true" value="<?= $e['ProductID'] ?>">
            <label for="prix">Nouveau prix :</label>
            <input class="form-control mb-2" type="float" name="prix" class="form-control" id="prix"
                   value="<?= $e['UnitPrice'] ?>">

            <button type="submit" class="btn btn-outline-danger">Valider</button>
            <a class="btn btn-outline-primary" href="/tachete/products/page/1">Annuler</a>
        </div>
    </form>
<?php $content = ob_get_clean(); ?>

<?php require('views/gabarit.php'); ?>
