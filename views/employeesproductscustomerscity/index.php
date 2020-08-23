<?php $title = 'Projet PHP MVC avec MySQL'; ?>

<?php ob_start(); ?>
<h1>Affichez les sociétés clients qui ont commandé un produit précis qu’on aura spécifié, trié sur le nom de la
    société</h1>

<form class="form-group formulaireRecherche" method="post">
    <h4>Choisir une ville</h4>
    <select class="form-control btn btn-outline-dark my-2" id="maRecherche">
        <option value=""></option>
        <?php foreach ($filtres as $e): ?>
            <option value= <?= $e['City'] ?>>
                <?= $e['City'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    <input class="form-control btn btn-outline-dark" type="submit" value="Rechercher...">
</form>

<!--Resultat de la requête Ajax-->
<div class="afficher form-control text-success text-center text"></div>

<table class="master table table-sm table-striped">
    <thead>
    <tr>
        <th scope="col">LastName</th>
        <th scope="col">FirstName</th>
        <th scope="col">CompanyName</th>
        <th scope="col">OrderDate</th>
        <th scope="col">UnitPrice</th>
        <th scope="col">Quantity</th>
        <th scope="col">ProductName</th>
        <th scope="col">City</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($employeeproductcustomercity as $e): ?>
        <tr>
            <td><p><?= $e['LastName'] ?></p></td>
            <td><p><?= $e['FirstName'] ?></p></td>
            <td><p><?= $e['CompanyName'] ?></p></td>
            <td><p><?= $e['OrderDate'] ?></p></td>
            <td><p><?= $e['UnitPrice'] ?></p></td>
            <td><p><?= $e['Quantity'] ?></p></td>
            <td><p><?= $e['ProductName'] ?></p></td>
            <td><p><?= $e['City'] ?></p></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php $content = ob_get_clean(); ?>

<?php require('views/gabarit.php'); ?>
