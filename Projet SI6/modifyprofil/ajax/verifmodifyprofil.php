<?php
session_start();
include('../class/bd.php');
 
if (!isset($_SESSION['id'])){
header('Location: ../index.php');
exit;
}

// On récupère les informations de l'utilisateur connecté
$afficher_profil = $DB->query("SELECT * FROM utilisateur WHERE id = ?",
array($_SESSION['id']));
$afficher_profil = $afficher_profil->fetch();

if(!empty($_POST)){
extract($_POST);
$valid = true;

if (isset($_POST['modification'])){
$nom = htmlentities(trim($nom));
$prenom = htmlentities(trim($prenom));
$email = htmlentities(strtolower(trim($email)));
$adresse = htmlentities(trim($adresse));
$ville = htmlentities(trim($ville));
$code_postal = htmlentities(trim($code_postal));

if(empty($nom)){
$valid = false;
$er_nom = "Il faut mettre un nom";
}

if(empty($prenom)){
$valid = false;
$er_prenom = "Il faut mettre un prénom";
}

if(empty($email)){
$valid = false;
$er_email = "Il faut mettre un mail";

}elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $mail)){
$valid = false;
$er_mail = "Le mail n'est pas valide";

}else{
$req_email = $DB->query("SELECT email FROM utilisateur WHERE email = ?",
array($email));
$req_email = $req_email->fetch();

if ($req_email['email'] <> "" && $_SESSION['email'] != $req_email['email']){
$valid = false;
$er_email = "Cet email existe déjà";
}
}

if(empty($adresse)){
$valid = false;
$er_adresse = "Il faut mettre une adresse";
}

if(empty($ville)){
$valid = false;
$er_ville = "Il faut mettre un prénom";
}

if(empty($code_postal)){
$valid = false;
$er_code_postal = "Il faut mettre un prénom";
}

// Avatar
if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']))

{
$tailleMax = 2097152;
$extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
if($_FILES['avatar']['size'] <= $tailleMax)
{
$extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
if(in_array($extensionUpload, $extensionsValides))
{
$chemin = "membres/avatars/".$_SESSION['id'].".".$extensionUpload;
$resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
if($resultat)
{
$updateavatar = $DB->insert('UPDATE utilisateur SET avatar = :avatar WHERE id = :id');
$updateavatar->insert(array('avatar' => $_SESSION['id'].".".$extensionUpload,'id' => $_SESSION['id']));
header('Location: ../modifyprofil.php?id='.$_SESSION['id']);
}
else
{
$erreur = "Erreur durant l'importation de votre photo de profil";
}
}
else
{
$erreur = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
}
}
else
{
$erreur = "Votre photo de profil ne doit pas dépasser 2Mo";
}
}

if ($valid){

$DB->insert("UPDATE utilisateur SET prenom = ?, nom = ?, mail = ?, adresse = ?, ville = ?, code_postal = ? WHERE id = ?",
array($prenom, $nom, $email, $adresse, $ville, $code_postal, $_SESSION['id']));

$_SESSION['nom'] = $nom;
$_SESSION['prenom'] = $prenom;
$_SESSION['email'] = $email;
$_SESSION['adresse'] = $adresse;
$_SESSION['ville'] = $ville;
$_SESSION['code_postal'] = $code_postal;
header('Location:  ../index.php');
exit;
}
}
}
?>