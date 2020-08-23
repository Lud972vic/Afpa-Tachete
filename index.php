<?php
include_once('config.php');

//On charge nos modèles et le controlleur principal
require_once(ROOT . 'app/Model.php');
require_once(ROOT . 'app/Controller.php');

//On sépare les paramètres
$params = explode('/', filter_var($_GET['lud972vic'], FILTER_SANITIZE_URL));

//Est-ce qu'un paramètre existe
if ($params[0] != "") {
    /*On récupère le nom du contrôller*/
    $controller = ucfirst($params[0]);

    //S'il existe un paramètre, on le récupère, sinon on redirige l'utilisateur sur index
    $action = isset($params[1]) ? $params [1] : 'index';


    //On récupère automatique le bon controller dans le dossier controllers, par rapport à l'url
    require_once(CONTROLLER . $controller . '.php');

    //On crée une variable pour le contrôleur -> test : http://tachete.test/employees/index
    $controller = new $controller();

    //On vérifie que la méthode appellée dans le controlleur existe, pour éviter les erreurs
    if (method_exists($controller, $action)) {
        //unset pour retirer un parametre d'un tableau, afin de recuperer l'id de l'url
        unset($params[0]);
        unset($params[1]);

        call_user_func_array([$controller, $action], $params);
        //$controller->$action();
    } else {
        http_response_code(404);
        echo "Oups, la page demandée n'éxiste pas :-(";
    }
} else {
    header('Location: http://' . HOST . 'products/page/1');
    exit();
}
