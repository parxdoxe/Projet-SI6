<?php
include('ajax/verifsignup.php');
?>

<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Inscription</title>

        <link href="../css/style.css" rel="stylesheet">

    </head>
    <body>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <a class="navbar-brand" href="../index.php">
            <img class="logo" src="../images/téléchargement.jpg" alt="Logo" style="width:40px;">
        </a>
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="signup.php">Inscription</a>
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
            <form action="signup.php" method="post" class="well">
                <h4 class="head">Créer votre compte</h4>


                <div class="form-group">
                    <label for="email">Email : </label>
                    <input type="text" name="email" value="<?php if(isset($email)){echo $email;}?>" class="form-control input-sm" required>

                    <?php
                    if (isset($er_email)) {
                        ?>
                                           
                        <div><?= $er_email ?></div>
                        <?php
                    }
                    ?>
                </div>


                <div class="form-group">
                    <label for="mot_de_passe">Mot de passe : </label>
                    <input type="password" name="mot_de_passe" value="<?php if (isset($mot_de_passe)) {
                        echo $mot_de_passe;
                    } ?>" class="form-control  input-sm" required>

                    <?php
                    if (isset($er_mot_de_passe)) {
                        ?>
                                           
                        <div><?= $er_mot_de_passe ?></div>
                                        <?php
                    }
                    ?>

                </div>

                <div class="form-group">
                    <label for="confirm_mot_de_passe">Confirmation de mot de passe : </label>
                    <input type="password" name="conf_mot_de_passe" value="" class="form-control  input-sm" required>
                </div>

                <div class="form-group">
                    <input type="submit" name="inscription" value="Valider" class="btn btn-sm btn-primary btn-block">
                </div>

            </form>
        </div>
    </div>
    </body>
</html>