<?php
session_start();
function ()
{
//information de connexion à la base de données
    $host = "localhost"; //adresse du serveur MySQL;
    $user = "root"; //nom d'utilisateur
    $password = ""; //mot de passe
    $database = "espace membre"; //nom de la base de données

    try {
        $db = new PDO("mysql:host=$host;dbname=$database",$user, $password);
        return $db;
    } catch (PDOException $e) {
        echo"Error: ". $e->getMessage();
        die();
    }
}
?>
