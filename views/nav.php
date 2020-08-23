<?php
include_once('config.php');
?>

<link href="/<?= RACINE ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="/<?= RACINE ?>/js/jquery.min.js"></script>
<script src="/<?= RACINE ?>/js/script.js"></script>
<script src="/<?= RACINE ?>/js/bootstrap.bundle.min.js"></script>
<script src="/<?= RACINE ?>/js/fontawesome.all.min.js"></script>

<style>
    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #555 !important;
        color: white;
        text-align: center;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <img src="/<?= RACINE ?>/assets/img/Ludo@Petit.png" class="rounded float-right" alt="Lud972vic"
         style="width: 100px">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/<?= RACINE ?>/employees/page/1">Tachete</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown"><a
                            class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">Les requêtes</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/<?= RACINE ?>/employees/page/1">Permettre de visualiser quel
                            employé a
                            passé
                            quelles commandes et à quels clients.</a>
                        <a class="dropdown-item" href="/<?= RACINE ?>/products/page/1">Pouvoir modifier facilement les
                            prix
                            des
                            produits.</a>
                        <a class="dropdown-item" href="/<?= RACINE ?>/productscustomers/page/1">Affichez les sociétés
                            clients
                            qui ont
                            commandé un produit précis qu’on aura spécifié, trié sur le nom de la société.</a>
                        <a class="dropdown-item" href="/<?= RACINE ?>/employeesproductscustomerscity/page/1">Affichez le
                            nom,
                            prénom
                            et la société cliente pour les employés qui ont effectué une vente pour les clients dans un
                            lieu précis qu’on aura spécifié, trié sur le nom de la société</a>
                        <a class="dropdown-item" href="/<?= RACINE ?>/employeesproductscustomersdate/page/1">Afficher
                            les
                            commandes et
                            les produits commandés dans un interval de temps qu’on aura à choisir</a>
                        <a class="dropdown-item" href="/<?= RACINE ?>/emails/page/1"><br><span style="color: orangered">Contacter moi</span>
                            <img src="/<?= RACINE ?>/assets/img/secured_letter_100px.png" style="width: 25px"></a>
                    </div>
                </li>
            </ul>
        </div>
        </li>
        </ul>
        </div>
    </nav>
</nav>
