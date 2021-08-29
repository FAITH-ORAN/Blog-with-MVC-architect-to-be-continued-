<?php
//le fichier .htaccess est met sur place pour que tous se pointe sur la page principal
//autload il faut le mettre dan le fichier index.php pour charger les différentes dépendances
require 'vendor/autoload.php';

/*$url="";

if(isset($_GET["url"])){
   $url=explode("/",$_GET["url"]);//PHP explode vous permet de prendre une chaîne et la couper en petits morceaux,
   var_dump($url);//var_dump affiche les informations structurées d'une variable, y compris son type et sa valeur. Les tableaux et les objets sont explorés récursivement, 

}
if($url ==""){
    require "app/views/indexView.php";
}else{
    require "app/views/404.view.php";
}
//de la ligne 5 à la ligne 14 c des conditions pour pouvoir afficher les views

-En général on va chercher à rediriger toutes les requêtes vers un fichier index.php 
qui servira de carrefour, et qui inclura les bons fichiers en fonction de l'URL.
 Cette logique peut être écrite à la main où on peut se reposer sur 
une librairie comme altorouter pour gérer les fichiers à inclure en fonction du chemin.

altorouter est PHP routing class (POO). librairie téléchargé

-whoops est une librairie pour gérer les erreurs

*/
//active debug whoops

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

//start Altorouter
$router = new AltoRouter();

//Map routes 

$router->map("GET","/","index", "index");
$router->map("GET","/contact","contact", "contact");
$router->map("GET","/404","404", "404");


//match routers
$match = $router->match();
if(is_array($match)){
    if( is_callable( $match['target'] ) ) {
        call_user_func_array( $match['target'], $match['params'] ); 
    } else {
        $params = $match['params'];
        //match target with view
        include "app/views/{$match['target']}.view.php";
        
    }
}else{
    include "app/views/404.view.php";
}


?>