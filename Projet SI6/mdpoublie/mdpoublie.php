<?php
include('ajax/verifmdpoublie.php');
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mot de passe oublié</title>
		<link href="css/style.css" rel="stylesheet">
    </head>
    <body>

	<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <a class="navbar-brand" href="../index.php">
            <img class="logo" src="images/téléchargement.jpg" alt="Logo" style="width:40px;">
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

        <div>Mot de passe oublié</div>
        <form method="post">
<?php
if (isset($er_email)){
?>
<div><?= $er_email ?></div>
<?php
}
?>
            <div class="form-group"><input type="email" placeholder="Adresse email" name="email" value="<?php if(isset($email)){ echo $email; }?>" required></div>

            <div class="form-group"><button type="submit" name="oublie">Envoyer</button></div>
        </form>
    </body>
</html>