<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include('../class/bd.php');

// S'il y a une session alors on ne retourne plus sur cette page
if (isset($_SESSION['id'])){
header('Location: ../index.php');
exit;
}

if(!empty($_POST)){
extract($_POST);
$valid = true;

if (isset($_POST['inscription'])){
    $email = htmlentities(strtolower(trim($email)));
    $mot_de_passe = trim($mot_de_passe);
    $conf_mot_de_passe = trim($conf_mot_de_passe);

// Vérification du mail
if(empty($email)){
    $valid = false;
    $er_email = "L'email ne peut pas être vide";

// On vérifit que l'email est dans le bon format
}elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $email)){
    $valid = false;
    $er_email = "L'email n'est pas valide";
}else{

// On vérifit que l'email est disponible
$req_email = $DB->query("SELECT 'email' FROM 'utilisateur' WHERE 'email' = ?",array($email));
$req_email = $req_email->fetchs();

if ($req_email['email'] <> ""){
    $valid = false;
    $er_email = "Cet email existe déjà";
}
}

// Vérification du mot de passe
if(empty($mot_de_passe)) {
    $valid = false;
    $er_mot_de_passe = "Le mot de passe ne peut pas être vide";

}elseif($mot_de_passe != $conf_mot_de_passe){
    $valid = false;
    $er_mot_de_passe = "La confirmation du mot de passe ne correspond pas";
}

// Si toutes les conditions sont remplies alors on fait le traitement
if($valid){
$mot_de_passe = crypt($mot_de_passe);

// On insert nos données dans la table utilisateur
$id= $DB->insert("INSERT INTO utilisateur (email, mot_de_passe, nom, prenom, adresse, ville, code_postal) VALUES (:email, :mot_de_passe, :nom, :prenom, :adresse, :ville, :code_postal)",
array($email, $mot_de_passe, $nom, $prenom, $adresse, $ville, $code_postal));

$_SESSION['id'] = $id;
$_SESSION['email'] = $email;
$_SESSION['mot_de_passe'] = $mot_de_passe;
$_SESSION['nom'] = $nom;
$_SESSION['prenom'] = $prenom;
$_SESSION['adresse'] = $adresse;
$_SESSION['ville'] = $ville;
$_SESSION['code_postal'] = $code_postal;

header('Location: ../index.php');
exit;
}
}
}
?>