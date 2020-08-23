<?php


class EmployeeProductCustomerDate extends Model
{
    public function __construct()
    {
        $this->table = "vue_visualiser_commandes_produits_filtre_date";
        $this->getConnection();
    }

    public function index($id)
    {
        $var = $this->pagination($id);
        $currentPage = $var[0];
        $parpage = $var[1];
        $pages = $var[2];

        $sql = "SELECT 
                CompanyName, o.OrderDate, od.UnitPrice, od.Quantity, p.ProductName
                FROM customers c
                INNER JOIN orders o
                ON c.CustomerID = o.CustomerID
                INNER JOIN orderdetails od
                ON o.OrderID = od.OrderID
                INNER JOIN products p
                ON od.ProductID = p.ProductID
                ORDER BY c.CompanyName 
                DESC LIMIT :currentPage, :parpage;";
        $query = $this->connexion->prepare($sql);
        $query->bindValue(':currentPage', $currentPage, PDO::PARAM_INT);
        $query->bindValue(':parpage', $parpage, PDO::PARAM_INT);
        $query->execute();

        return [$query->fetchAll(), $currentPage, $pages];
    }
}
