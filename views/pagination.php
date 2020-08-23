<?php
include_once('config.php');
?>

<nav class="master mb-5">
    <ul class="pagination pagination-sm justify-content-center">
        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?> ">
            <a href="/<?= RACINE ?>/<?= $table ?>/page/<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
        </li>

        <?php for ($page = 1; $page <= $pages / 10; $page++): ?>
            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                <a href="/<?= RACINE ?>/<?= $table ?>/page/<?= $page ?>" class="page-link"><?= $page ?></a>
            </li>
        <?php endfor ?>

        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?> ">
            <a href="/<?= RACINE ?>/<?= $table ?>/page/<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
        </li>
    </ul>
</nav>
