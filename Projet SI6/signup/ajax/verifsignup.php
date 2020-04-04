<?php
include('../../class/bd.php');

    if (isset($_POST['inscription'])) {
        $email = NULL;
        $email = htmlentities(strtolower(trim($email)));
        $mot_de_passe = NULL;
        $mot_de_passe = trim($mot_de_passe);
        $conf_mot_de_passe = NULL;
        $conf_mot_de_passe = trim($conf_mot_de_passe);


// Vérification du email
        if (empty($email)) {
            $valid = false;
            $er_email = "Le mail ne peut pas être vide";

// On vérifit que le email est dans le bon format
        } elseif (!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $email)) {
            $valid = false;
            $er_email = "Le email n'est pas valide";

        } else {
            // On vérifit que le email est disponible
            $req_email = $DB->query("SELECT email FROM utilisateur WHERE email = ?",
                array($email));

            $req_email = $req_email->fetch();

            if ($req_email['email'] <> "") {
                $valid = false;
                $er_email = "Ce email existe déjà";
            }
        }

// Vérification du mot de passe

        if (empty($mot_de_passe)) {
            $valid = false;
            $er_mot_de_passe = "Le mot de passe ne peut pas être vide";

        } elseif ($mot_de_passe != $conf_mot_de_passe) {
            $valid = false;
            $er_mot_de_passe = "La confirmation du mot de passe ne correspond pas";
        }

// Si toutes les conditions sont remplies alors on fait le traitement
        if ($valid) {
            $mot_de_passe = crypt($mot_de_passe);

// On insert nos données dans la table utilisateur
            $DB->insert("INSERT INTO utilisateur (email, mot_de_passe) VALUES 
                    (?, ?)",
array($email, $mot_de_passe));

header('Location: index.php');
exit;
        }
    }
            ?>
