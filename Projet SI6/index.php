<?php
session_start();

include('class/bd.php');
?>

<!DOCTYPE html>
<html lang="fr">
  ﻿<head>
      ﻿<meta charset="utf-8"/>
      ﻿<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    ﻿  <title>Accueil</title>
  <link href="css/style.css" rel="stylesheet">
    </head>

  ﻿<body>
  <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <a class="navbar-brand" href="index.php">
            <img class="logo" src="images/téléchargement.jpg" alt="Logo" style="width:40px;">
        </a>
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="signup/signup.php">Inscription</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="connection/connection.php">Connexion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="modifyprofil/modifyprofil.php">Espace membre</a>
            </li>
        </ul>
    </nav>

    ﻿
<div class="col-lg-offset-4 col-lg-4 col-lg-offset-4">
﻿    <?php
if(!isset($_SESSION['id'])){ // Si on ne détecte pas de session alors :
  ?>

        <div class="form-group"><a href="signup/signup.php">Inscription</a></div>
        <div class="form-group"><a href="connection/connection.php">Connexion</a></div>
      <?php
}else{ // Sinon s'il y a une session alors :
  ?>
        ﻿<div class="form-group"><a href="modifyprofil/modifyprofil.php">Modifier mon profil</a></div>
        <div class="form-group"><a href="deconexion/deconexion.php">Déconnexion</a></div>
      ﻿<?php
}
?>
</div>
  </body>
</html>