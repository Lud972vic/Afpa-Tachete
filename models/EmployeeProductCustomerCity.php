<?php


class EmployeeProductCustomerCity extends Model
{
    public function __construct()
    {
        $this->table = "vue_visualiser_vente_par_lieux";
        $this->getConnection();
    }

    public function index($id)
    {
        $var = $this->pagination($id);
        $currentPage = $var[0];
        $parpage = $var[1];
        $pages = $var[2];

        $sql = "SELECT 
                e.LastName, e.FirstName, c.CompanyName, o.OrderDate, od.UnitPrice, od.Quantity, p.ProductName, c.City
                FROM customers c
                INNER JOIN orders o
                ON c.CustomerID = o.CustomerID
                INNER JOIN orderdetails od
                ON o.OrderID = od.OrderID
                INNER JOIN products p
                ON od.ProductID = p.ProductID
                INNER JOIN employees e
                ON e.EmployeeID = o.EmployeeID
                ORDER BY c.CompanyName 
                DESC LIMIT :currentPage, :parpage;";
        $query = $this->connexion->prepare($sql);
        $query->bindValue(':currentPage', $currentPage, PDO::PARAM_INT);
        $query->bindValue(':parpage', $parpage, PDO::PARAM_INT);
        $query->execute();

        return [$query->fetchAll(), $currentPage, $pages];
    }

    public function listeFiltre()
    {
        $sql = "SELECT DISTINCT City FROM vue_visualiser_vente_par_lieux ORDER BY City ;";
        $query = $this->connexion->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}
