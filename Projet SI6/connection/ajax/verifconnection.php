<?php
session_start();
include('../class/bd.php');

// S'il y a une session alors on ne retourne plus sur cette page  
if (isset($_SESSION['id'])){
header('Location: ../index.php');
exit;
}

if(!empty($_POST)){
extract($_POST);
$valid = true;

if (isset($_POST['connexion'])){
$email = htmlentities(strtolower(trim($email)));
$mot_de_passe = trim($mot_de_passe);

if(empty($email)){ // Vérification qu'il y est bien un mail de renseigné
$valid = false;
$er_email = "Il faut mettre un mail";
}
 
if(empty($mot_de_passe)){ // Vérification qu'il y est bien un mot de passe de renseigné
$valid = false;
$er_mot_de_passe = "Il faut mettre un mot de passe";
}
 
// On fait une requête pour savoir si le couple mail / mot de passe existe
$req = $DB->query("SELECT * 
FROM utilisateur 
WHERE email = ? AND mot_de_passe = ?",
array($email, crypt($mot_de_passe)));
$req = $req->fetch();

// Si on a pas de résultat alors c'est qu'il n'y a pas d'utilisateur correspondant au couple mail / mot de passe
if ($req['id'] == ""){
$valid = false;
$er_email = "Le mail ou le mot de passe est incorrecte";
}

if($req['token'] <> NULL){
$valid = false;
$er_email = "Le compte n'a pas été validé";

}elseif($req['n_mdp'] == 1){ // On remet à zéro la demande de nouveau mot de passe s'il y a bien un couple mail / mot de passe
$DB->insert("UPDATE utilisateur SET n_mdp = 0 WHERE id = ?",
array($req['id']));
}

if ($valid){
$_SESSION['id'] = $req['id'];
$_SESSION['email'] = $req['email'];
$_SESSION['nom'] = $req['nom'];
$_SESSION['prenom'] = $req['prenom'];
$_SESSION['adresse'] = $req['adresse'];
$_SESSION['ville'] = $req['ville'];
$_SESSION['code_postal'] = $req['code_postal'];

header('Location:  ../index.php');
exit;
}
}
}
?>