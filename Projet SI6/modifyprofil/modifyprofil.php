<?php
include('ajax/verifmodifyprofil.php');
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Espace membre</title>
		<link href="../css/style.css" rel="stylesheet">
    </head>
    <body>    

	<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <a class="navbar-brand" href="../index.php">
            <img class="logo" src="../images/téléchargement.jpg" alt="Logo" style="width:40px;">
        </a>
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="../signup/signup.php">Inscription</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../connection/connection.php">Connexion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../modifyprofil/modifyprofil.php">Espace membre</a>
            </li>
        </ul>
    </nav>
      

        <div class="container">
        <br/>
        <div class
        "row">
        <div class="col-lg-offset-4 col-lg-4 col-lg-offset-4">
            <form action="modifyprofil.php" method="post" class="well">
                <h4 class="head">Mon profil</h4>
// nom
<div class="form-group">
<?php
if (isset($er_nom)){
?>
<div><?= $er_nom ?></div>
<?php
}
?>
            <input type="text" placeholder="Votre nom" name="nom" value="<?php if(isset($nom)){ echo $nom; }else{ echo $afficher_profil['nom'];}?>" required>
</div>

// prenom
<div class="form-group">
<?php
if (isset($er_prenom)){
?>
<div><?= $er_prenom ?></div>
<?php
}
?>
            <input type="text" placeholder="Votre prénom" name="prenom" value="<?php if(isset($prenom)){ echo $prenom; }else{ echo $afficher_profil['prenom'];}?>" required>
</div>

 
// Email
<div class="form-group">
<?php
if (isset($er_email)){
?>
<div><?= $er_email ?></div>
<?php
}
?>
            <input type="email" placeholder="Adresse email" name="email" value="<?php if(isset($email)){ echo $email; }else{ echo $afficher_profil['mail'];}?>" required>
</div>

// Adresse
<div class="form-group">
<?php
if (isset($er_adresse)){
?>
<div><?= $er_adresse ?></div>
<?php
}
?>
            <input type="adresse" placeholder="Adresse " name="adresse" value="<?php if(isset($adresse)){ echo $adresse; }else{ echo $afficher_profil['adresse'];}?>" required>
</div>

// Ville
<div class="form-group">
<?php
if (isset($er_ville)){
?>
<div><?= $er_ville ?></div>
<?php
}
?>
            <input type="ville" placeholder="Ville" name="ville" value="<?php if(isset($ville)){ echo $ville; }else{ echo $afficher_profil['ville'];}?>" required>
</div>

// Code postal
<div class="form-group">
<?php
if (isset($er_code_postal)){
?>
<div><?= $er_code_postal ?></div>
<?php
}
?>
            <input type="codepostal" placeholder="Code postal" name="code_postal" value="<?php if(isset($code_postal)){ echo $code_postal; }else{ echo $afficher_profil['codepostal'];}?>" required>
</div>

			<div class="form-group">
			<label>Avatar :</label>
			<input type="file" name="avatar"><br /></div>

            <div class="form-group"><a href="../delete/delete.php">Suppprimer mon compte</a>
        </div>

			<div class="form-group">
            <button type="submit" name="modification">Modifier</button>
			</div>

        		</form>
			</div>
    	</div>
    </body>
</html>