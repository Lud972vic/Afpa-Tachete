<?php

include_once($_SERVER['DOCUMENT_ROOT'] . 'tachete/config.php');

if (
    (isset($_POST['laDate_start']) && !empty($_POST['laDate_start']))
    ||
    (isset($_POST['laDate_end']) && !empty($_POST['laDate_end']))
) {

//Information de la base de données
    $host = DBHOST;
    $db_name = DBNAME;
    $username = DBUSERNAME;
    $password = DBPWD;

    $result = array();
    $date_start = trim($_POST['laDate_start']);
    $date_end = trim($_POST['laDate_end']);

    $db = new PDO('mysql:host=' . $host . ';dbname=' . $db_name . ';charset=utf8', $username, $password);
    $sql = "SELECT 
                CompanyName, o.OrderDate, od.UnitPrice, od.Quantity, p.ProductName
                FROM customers c
                INNER JOIN orders o
                ON c.CustomerID = o.CustomerID
                INNER JOIN orderdetails od
                ON o.OrderID = od.OrderID
                INNER JOIN products p
                ON od.ProductID = p.ProductID
                WHERE o.OrderDate >= :date_start AND o.OrderDate<= :date_end
                ORDER BY c.CompanyName
            ";

    $query = $db->prepare($sql);
    $query->bindValue(':date_start', $date_start, PDO::PARAM_STR);
    $query->bindValue(':date_end', $date_end, PDO::PARAM_STR);
    $query->execute();

    while ($data = $query->fetch()) {
        $result[] = $data;
    }

    ?>
    <table class="table table-sm table-success my-5">
        <thead>
        <tr>
            <th scope="col">CompanyName</th>
            <th scope="col">OrderDate</th>
            <th scope="col">UnitPrice</th>
            <th scope="col">Quantity</th>
            <th scope="col">ProductName</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($result as $e) {
            ?>

            <tr>
                <td><p><?= $e['CompanyName'] ?></p></td>
                <td><p><?= $e['OrderDate'] ?></p></td>
                <td><p><?= $e['UnitPrice'] ?></p></td>
                <td><p><?= $e['Quantity'] ?></p></td>
                <td><p><?= $e['ProductName'] ?></p></td>
            </tr>

            <?php
        }
        ?>
        </tbody>
    </table>
    <?php
} else {
    echo "Veuillez sélectionner une date de début et de fin, avant de cliquer sur le bouton Rechercher";
}
?>
