<?php
$title = 'Projet PHP MVC avec MySQL';
include_once('config.php');
?>

<?php ob_start(); ?>
    <div class="container col-4 mt-5">
        <h1>Le prix du produit est modifié</h1>
        <img src='/<?= RACINE ?>/assets/img/updateOk.gif' class='img-fluid' alt='Update valid'>
        <a class="btn btn-outline-primary" href="/<?= RACINE ?>/products/page/1">Retour aux produit</a>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('views/gabarit.php'); ?>
