<?php


class Employee extends Model
{
    public function __construct()
    {
        $this->table = "vue_visualiser_employee_commande_client";
        $this->getConnection();
    }

    public function index($id)
    {
        $var = $this->pagination($id);
        $currentPage = $var[0];
        $parpage = $var[1];
        $pages = $var[2];

        $sql = "SELECT e.EmployeeID, e.LastName AS EmLastName, e.FirstName AS EmFirstName, o.OrderDate, c.CompanyName
                FROM employees e
                INNER JOIN
                orders o
                ON e.EmployeeID = o.EmployeeID
                INNER JOIN customers c
                ON o.CustomerID = c.CustomerID
                ORDER BY EmployeeID
                DESC LIMIT :currentPage, :parpage;";
        $query = $this->connexion->prepare($sql);
        $query->bindValue(':currentPage', $currentPage, PDO::PARAM_INT);
        $query->bindValue(':parpage', $parpage, PDO::PARAM_INT);
        $query->execute();

        return [$query->fetchAll(), $currentPage, $pages];
    }
}
