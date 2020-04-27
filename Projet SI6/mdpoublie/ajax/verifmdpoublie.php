<?php
session_start();
include('../class/bd.php');

if (isset($_SESSION['id'])){
header('Location: ../index.php');
exit;
}

if(!empty($_POST)){
extract($_POST);
$valid = true;

if (isset($_POST['oublie'])){
$email = htmlentities(strtolower(trim($email))); // On récupère le mail afin d envoyer le mail pour la récupèration du mot de passe 

// Si le mail est vide alors on ne traite pas
if(empty($email)){
$valid = false;
$er_email = "Il faut mettre un email";
}

if($valid){
$verification_email = $DB->query("SELECT nom, prenom, email, adresse, ville, code_postal n_mdp FROM utilisateur WHERE email = ?",
array($email));
$verification_email = $verification_email->fetch();

if(isset($verification_email['email'])){
if($verification_email['n_mdp'] == 0){
// On génère un mot de passe
$new_pass = rand();

$new_pass_crypt = crypt($new_pass);


$objet = 'Nouveau mot de passe';
$to = $verification_email['email'];

//===== Création du header du mail.
$header = "From: NOM_DE_LA_PERSONNE <no-reply@test.com> \n";
$header .= "Reply-To: ".$to."\n";
$header .= "MIME-version: 1.0\n";
$header .= "Content-type: text/html; charset=utf-8\n";
$header .= "Content-Transfer-Encoding: 8bit";

//===== Contenu du message
$contenu = 
"<html>".
"<body>".
"<p style='text-align: center; font-size: 18px'><b>Bonjour Mr, Mme".$verification_email['nom']."</b>,</p><br/>".
"<p style='text-align: justify'><i><b>Nouveau mot de passe : </b></i>".$new_pass."</p><br/>".
"</body>".
"</html>";

//===== Envoi du mail
email($to, $objet, $contenu, $header);
$DB->insert("UPDATE utilisateur SET mot_de_passe = ?, n_mdp = 1 WHERE email = ?",
array($new_pass_crypt, $verification_email['email']));
}
}    
header('Location: ../connection/connection.php');
exit;
}
}
}
?>