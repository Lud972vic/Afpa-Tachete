<?php $title = 'Projet PHP MVC avec MySQL'; ?>

<?php ob_start(); ?>
<h1>Permettre de visualiser quel employé a passé quelles commandes et à quels clients</h1>

<table class="table table-sm table-striped">
    <thead>
    <tr>
        <!--<th scope="col">Action</th>-->
        <th scope="col">EmLastName</th>
        <th scope="col">EmFirstName</th>
        <th scope="col">OrderDate</th>
        <th scope="col">CompanyName</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($employees as $e): ?>
        <tr>
            <!--<td><a class="btn btn-outline-primary" href="/employees/detail/<? /*= $e['EmployeeID'] */ ?>">Voir détails</a>
            </td>-->
            <td><p><?= $e['EmLastName'] ?></p></td>
            <td><p><?= $e['EmFirstName'] ?></p></td>
            <td><p><?= $e['OrderDate'] ?></p></td>
            <td><p><?= $e['CompanyName'] ?></p></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php $content = ob_get_clean(); ?>

<?php require('views/gabarit.php'); ?>
