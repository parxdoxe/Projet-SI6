<?php
include('ajax/verifconnection.php'); 
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../css/style.css" rel="stylesheet">
        <title>Connection</title>
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
                <a class="nav-link" href="connection.php">Connexion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../modifyprofil/modifyprofil.php">Espace membre</a>
            </li>
        </ul>
    </nav>   

<div class="col-lg-offset-4 col-lg-4 col-lg-offset-4">
        <form method="post">
	<?php
	if (isset($er_email)){
	?>
	<div><?= $er_email ?></div>
	<?php
}
?>
            <div class="form-group"><input type="email" placeholder="Adresse mail" name="email" value="<?php if(isset($email)){ echo $email; }?>"required>
	<?php
	if (isset($er_mot_de_passe)){
	?>
	<div><?= $er_mot_de_passe ?></div>
	<?php
}
?>
</div>
            
            <div class="form-group"><input type="password" placeholder="Mot de passe" name="mot_de_passe" value="<?php if(isset($mot_de_passe)){ echo $mot_de_passe; }?>" required></div>

<div class="form-group"><a href="../mdpoublie/mdpoublie.php">Mot de passe oublié ?</a>
        </div>

            <div class="form-group"><button type="submit" name="connexion">Se connecter</button>
            </form></div>
        </div>
    </body>
</html>