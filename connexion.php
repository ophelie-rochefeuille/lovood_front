<?php
//session_start();

include "header.php";
include "config.php";

    if(isset($_POST['formConnexionBtn']))
    {
        $email = htmlspecialchars($_POST['email']);
        $motdepasse = sha1($_POST['motdepasse']);

        if(!empty($email) AND !empty($motdepasse))
        {
            $query = $bdd->prepare("SELECT pseudo FROM usertest WHERE pseudo = :pseudo AND motdepasse = :motdepasse");
            $query->execute([
                "pseudo" => $_POST['pseudo'],
                "motdepasse" => $_POST['motdepasse']
            ]);

            $data = $query->fetch();

            if($data)
            {
                $_SESSION['user'] = $_POST['pseudo'];
            }

            $requser = $bdd->prepare("SELECT * FROM usertest WHERE email = ? AND motdepasse = ?");
            $requser->execute(array($email, $motdepasse));
            $userexist = $requser->rowCount();

        //si l'user existe
        if($userexist == 1){
            $okConnexion = true;
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['nom'] = $userinfo['nom'];
            $_SESSION['prenom'] = $userinfo['prenom'];
            $_SESSION['dateNaissance'] = $userinfo['dateNaissance'];
            $_SESSION['genre'] = $userinfo['genre'];
            $_SESSION['email'] = $userinfo['email'];
            $_SESSION['ville'] = $userinfo['ville'];
            $_SESSION['genreRechercher'] = $userinfo['genreRechercher'];
            $_SESSION['trancheAge'] = $userinfo['trancheAge'];
            $_SESSION['platPref'] = $userinfo['platPref'];
            $_SESSION['typeRelation'] = $userinfo['typeRelation'];
            $_SESSION['pseudo'] = $userinfo['pseudo'];
            $_SESSION['user'] = $data['token'];
            header("Location: profil.php?id=".$_SESSION['id']);
        } else {
            $erreur = "Mauvais identifiants";
        }
        } else {
            $erreur = "Tous les champs doivent être compétés !";
        }
    }
?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <title>Inscription</title>
        </head>
        <body>
        <div class="login-form">
            
        <img src="./assets/pictures/undraw_researching_22gp.png" />
            <form class="formulaire" action="" method="post">
                <h2 class="text-center">Connexion</h2>       
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" name="motdepasse" class="form-control" placeholder="Mot de passe">
                </div>
                <div class="form-group">
                    <button type="submit" name="formConnexionBtn" class="btn btn-primary btn-block">Connexion</button>
                </div>   
            </form>
            <img src="./assets/pictures/undraw_Web_devices_re_m8sc.png" />

            <?php
                if(isset($erreur))
                {
                    echo $erreur;
                }
            ?>
        </div>
        
        
        
        <style>
            body{
                background-color: #FFFEF9;
            }
            .formulaire{
                background-color: #C0BAF5;
                max-width: 340px
            }
            h2{
                font-family:"quicksand-regular";
                color: #353535
            }
            img{
                width: 30%;
            }
            .login-form {
                max-width: 1440px;
                width: 80%;
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-left: auto;
                margin-right: auto;
            }
            .login-form form {
                margin-bottom: 15px;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }
            .login-form h2 {
                margin: 0 0 15px;
            }
            .form-control, .btn {
                min-height: 38px;
                border-radius: 2px;
                font-family:"quicksand-light"
            }
            .btn {        
                font-size: 15px;
                font-weight: bold;
                background-color: #9C9FE2;
                border: none
            }
            .btn:hover{
                background-color: #6568B3
            }
        </style>
        </body>
</html>
