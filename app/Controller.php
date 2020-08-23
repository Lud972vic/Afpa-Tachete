<?php
include_once('config.php');

abstract class Controller
{
    //Pour charger le modèle qu'on a besoin
    public function loadModel(String $model)
    {
        //par exemple models/Employee
        require_once(MODEL . $model . '.php');

        $this->$model = new $model();
    }

    //Appel des vues avec les datas, sinon un tableau vide si pas de data envoyé
    public function render(String $fichier, array $data = [])
    {
        // strtolower(get_class($this)) -> nom du controller en minuscule controllemployees
        // $fichier -> index.php par exemple
        // resultat jur_tachete/views/employees/index.php

        //extract permet de créer une variable à partir du tableau data ['employees' => $employees]
        extract($data);
        require_once(ROOT . 'views/' . strtolower(get_class($this)) . '/' . $fichier . '.php');
    }
}
