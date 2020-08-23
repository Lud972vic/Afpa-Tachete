<?php


class ProductCustomer extends Model
{
    public function __construct()
    {
        $this->table = "vue_chercher_produit_commander_par_societe";
        $this->getConnection();
    }

    public function index($id)
    {
        $var = $this->pagination($id);
        $currentPage = $var[0];
        $parpage = $var[1];
        $pages = $var[2];

        $sql = "SELECT * FROM vue_chercher_produit_commander_par_societe  
                ORDER BY CompanyName
                DESC LIMIT :currentPage, :parpage;";
        $query = $this->connexion->prepare($sql);
        $query->bindValue(':currentPage', $currentPage, PDO::PARAM_INT);
        $query->bindValue(':parpage', $parpage, PDO::PARAM_INT);
        $query->execute();

        return [$query->fetchAll(), $currentPage, $pages];
    }

    public function listeFiltre()
    {
        $sql = "SELECT DISTINCT ProductName FROM vue_chercher_produit_commander_par_societe ORDER BY ProductName;";
        $query = $this->connexion->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}
