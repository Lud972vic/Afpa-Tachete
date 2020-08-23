<?php


class Product extends Model
{
    public function __construct()
    {
        $this->table = "products";
        $this->getConnection();
    }

    public function index($id)
    {
        $var = $this->pagination($id);
        $currentPage = $var[0];
        $parpage = $var[1];
        $pages = $var[2];

        $sql = "SELECT ProductID, ProductName, QuantityPerUnit, UnitPrice  FROM products 
                ORDER BY ProductName
                DESC LIMIT :currentPage, :parpage;";
        $query = $this->connexion->prepare($sql);
        $query->bindValue(':currentPage', $currentPage, PDO::PARAM_INT);
        $query->bindValue(':parpage', $parpage, PDO::PARAM_INT);
        $query->execute();

        return [$query->fetchAll(), $currentPage, $pages];
    }

    public function update($id)
    {
        $sql = "SELECT ProductID, ProductName, QuantityPerUnit, UnitPrice  FROM products WHERE ProductID = $id;";
        $query = $this->connexion->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function save()
    {
        try {
            $id = $_POST['id'];
            $prix = $_POST['prix'];
            $sql = "UPDATE products SET UnitPrice = :prix WHERE ProductID = :id;";
            $query = $this->connexion->prepare($sql);
            $query->bindValue(":id", $id, PDO::PARAM_INT);
            $query->bindValue(":prix", $prix, PDO::PARAM_STR);
            $query->execute();
            $query->closeCursor();
        } catch (PDOException $e) {
            echo "<h1>Oups, il y'a une coquille ton prix, non !</h1><br>" . $e->getMessage() . "";
            exit();
        }
    }
}
