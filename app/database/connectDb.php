<?php

$serveur="localhost";
$login="root";
$pass="";

try{
    $connexion= new PDO ("mysql:host=$serveur;dbname=blog_ttbd",$login,$pass);//j'utilise les bloc try and catch pour la gestion des erreurs
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "connexion à la base de donnée blog _ttbd reusii";
}catch(PDOException $e){
    echo'echec : ' . $e->getMessage();

}


?>