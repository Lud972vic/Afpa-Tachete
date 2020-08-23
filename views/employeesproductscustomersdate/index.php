<?php $title = 'Projet PHP MVC avec MySQL'; ?>

<?php ob_start(); ?>
<h1>Pouvoir modifier facilement les prix des produits</h1>

<form class="form-group formulaireRecherche" method="post">
    <h4>Choisir une date de début et de fin</h4>
    <div class="form-control">
        <label for="laDate_start">Date de ébut:</label>
        <input type="date" id="laDate_start" name="laDate_start"
               value="1998-03-23"
               min="1990-01-01" max="2020-12-31">

        <label for="laDate_end">Date de fin:</label>
        <input class="" type="date" id="laDate_end" name="laDate_end"
               value="1998-03-25"
               min="1990-01-01" max="2020-12-31">
    </div>
    <input class="form-control btn btn-outline-dark" type="submit" value="Rechercher...">
</form>

<!--Resultat de la requête Ajax-->
<div class="afficher form-control text-success text-center text"></div>

<table class="master table table-sm table-striped">
    <thead>
    <tr>
        <th scope="col">CompanyName</th>
        <th class="text-success" scope="col">OrderDate</th>
        <th scope="col">UnitPrice</th>
        <th scope="col">Quantity</th>
        <th scope="col">ProductName</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($employeesproductscustomersdate as $e): ?>
        <tr>
            <td><p><?= $e['CompanyName'] ?></p></td>
            <td class="btn btn-success"><p><?= $e['OrderDate'] ?></p></td>
            <td><p><?= $e['UnitPrice'] ?></p></td>
            <td><p><?= $e['Quantity'] ?></p></td>
            <td><p><?= $e['ProductName'] ?></p></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php $content = ob_get_clean(); ?>

<?php require('views/gabarit.php'); ?>

