<?php
function getDataBase(){
    $dsn = 'mysql:host=localhost;dbname=LP_dev;charset=utf8';
    $result = new PDO($dsn, 'root', '');
    return $result;
}

function getBlock($file, $data = [])
{
    require $file;
}

$racine = "/LP/sil-da2i-td-rappels-web/";
$racineSize = strlen($racine);
$uri = explode("/", substr($_SERVER['REQUEST_URI'], $racineSize));

switch ($uri[0]) {
    case "index":
        require 'Controllers\HomeController.php';
        HomeController::go();
    break;
    
    case "movies":
        require 'Controllers\MovieController.php';
        if(($uri[1])){
            MovieController::go($uri[1]);
        }
        else {
            echo "Id films incorrecte";;
        }
    break;
    
    default:
        echo "Pas bon ça !";
    break;

}