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
    </head>
  ﻿<body>
    ﻿<h1>Mon site</h1>
﻿    <?php
if(!isset($_SESSION['id'])){ // Si on ne détecte pas de session alors on verra les liens ci-dessous
  ?>
        <a href="signup/signup.php">Inscription</a>
                                                  ﻿
       
      <?php
}else{ // Sinon s'il y a une session alors on verra les liens ci-dessous
  ?>
        ﻿<a href="">Mon profil</a>
        ﻿<a href="">Modifier mon profil</a>
        <a href="">Déconnexion</a>
      ﻿<?php
}
?>
  </body>
</html>