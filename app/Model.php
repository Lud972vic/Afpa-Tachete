<?php
include_once('config.php');

abstract class Model
{    //Information de la base de données
    private $host = DBHOST;
    private $db_name = DBNAME;
    private $username = DBUSERNAME;
    private $password = DBPWD;

    //Propriété contenant la connexion
    protected $connexion;

    //Propriétés contenant les informations de reqûete
    public $table;
    public $id;

    protected function getConnection()
    {
        /*On initialise la connexion*/
        $this->connexion = null;

        try {
            $this->connexion = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name . ';charset=utf8', $this->username, $this->password);
            $this->connexion->exec('set names utf8');
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo 'Oups, petite erreur : ' . $exception->getMessage();
        }
    }

    //Les reqûetes principales
    public function getAll()
    {
        $sql = "SELECT * FROM " . $this->table;
        $query = $this->connexion->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getOne()
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id=" . $this->id;
        $query = $this->connexion->prepare($sql);
        $query->execute();

        return $query->fetch();
    }

    public function pagination($id)
    {
        /*On détermine sur quelle page on se trouve*/
        $currentPage = $id;

        /*Nombre total d'enregistrement*/
        $sql = "SELECT Count(*) As nbLignes FROM " . $this->table;
        $query = $this->connexion->prepare($sql);
        $query->execute();
        $totalEnregistrement = $query->fetch();
        $totalEnregistrement = (int)$totalEnregistrement[0];

        /*Nombre d'enregistrement par page*/
        $parpage = 6;

        /*Calcul le nombre de page total, on arrondie à la page supérieur*/
        $pages = ceil($totalEnregistrement / $parpage);

        /*Calcul du 1er enregistrement de la page*/
        $premier = ($currentPage * $parpage) - $parpage;

        return [$currentPage, $parpage, $pages];
    }
}
