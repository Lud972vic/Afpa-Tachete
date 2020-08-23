<?php

include_once($_SERVER['DOCUMENT_ROOT'] . 'tachete/config.php');

if (isset($_POST['laRecherche']) && !empty($_POST['laRecherche'])) {

//Information de la base de données
    $host = DBHOST;
    $db_name = DBNAME;
    $username = DBUSERNAME;
    $password = DBPWD;

    $result = array();
    $filtre = trim($_POST['laRecherche']);

    $db = new PDO('mysql:host=' . $host . ';dbname=' . $db_name . ';charset=utf8', $username, $password);
    $sql = "SELECT * FROM vue_visualiser_vente_par_lieux WHERE City= :filtre;";
    $query = $db->prepare($sql);
    $query->bindValue(':filtre', $filtre, PDO::PARAM_STR);
    $query->execute();

    while ($data = $query->fetch()) {
        $result[] = $data;
    }

    ?>
    <table class="table table-sm table-success my-5">
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

        <?php
        foreach ($result as $e) {
            ?>

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

            <?php
        }
        ?>
        </tbody>
    </table>
    <?php
} else {
    echo "Veuillez sélectionner une valeur dans la liste, avant de cliquer sur le bouton Rechercher";
}
?>
