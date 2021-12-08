<?php
    include_once 'header.php';
?>

<?php
include_once 'config.php'; 

if(isset($_POST['formInscriptionBtn']))
{
    // Patch XSS
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $dateNaissance = htmlspecialchars($_POST['dateNaissance']);
    $genre = htmlspecialchars($_POST['genre']);
    $email = htmlspecialchars($_POST['email']);
    $ville = htmlspecialchars($_POST['ville']);
    $genreRechercher = htmlspecialchars($_POST['genreRechercher']);
    $trancheAge = htmlspecialchars($_POST['trancheAge']);
    $platPref = htmlspecialchars($_POST['platPref']);
    $typeRelation = htmlspecialchars($_POST['typeRelation']);
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $motdepasse = sha1($_POST['motdepasse']);
    $motdepasse_retype = sha1($_POST['motdepasse_retype']);

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['nom']) && 
    !empty($_POST['prenom']) && 
    !empty($_POST['dateNaissance']) &&
    !empty($_POST['genre']) &&
    !empty($_POST['email']) &&
    !empty($_POST['ville']) &&
    !empty($_POST['genreRechercher']) &&
    !empty($_POST['trancheAge']) &&
    !empty($_POST['platPref']) &&
    !empty($_POST['typeRelation']) &&
    !empty($_POST['pseudo']) &&
    !empty($_POST['motdepasse']) &&
    !empty($_POST['motdepasse_retype']))
    {
        //verifications
        $nomlength = strlen($nom);
            if($nomlength <= 100)
        {
        $prenomlength = strlen($prenom);
            if($prenomlength <= 100)
        {
        $emaillength = strlen($email);
            if($emaillength <= 100)
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            if($motdepasse == $motdepasse_retype)
        {
            $reqmail = $bdd->prepare("SELECT * FROM usertest WHERE email = ?");
            $reqmail->execute(array($email));
            $mailexist = $reqmail->rowCount();
            if($mailexist == 0)
            {
                //on insere en bdd
                $insert = $bdd->prepare('INSERT INTO usertest
                            (nom, prenom, dateNaissance, genre, email, ville, genreRechercher, trancheAge, platPref, typeRelation, pseudo, motdepasse, token)
                            VALUES(:nom, :prenom, :dateNaissance, :genre, :email, :ville, :genreRechercher, :trancheAge, :platPref, :typeRelation, :pseudo, :motdepasse, :token) ');
     
                $insert->execute(array(
                'nom' => $nom,
                'prenom' => $prenom,
                'dateNaissance' => $dateNaissance,
                'genre' => $genre,
                'email' => $email,
                'ville' => $ville,
                'genreRechercher' => $genreRechercher,
                'trancheAge' => $trancheAge,
                'platPref' => $platPref,
                'typeRelation' => $typeRelation,
                'pseudo' => $pseudo,
                'motdepasse' => $motdepasse,
                'token' => bin2hex(openssl_random_pseudo_bytes(64))
                ));
                
                $erreur = "compte créer";
        } else {
            $erreur = "compte déjà existant";
        }
        } else {
            $erreur = "Les mots de passes sont differents !";
        }
        } else {
            $erreur = "Email non valide !";
        }
        } else {
            $erreur = "Email trop long !";
        }
        } else {
            $erreur = "Prenom trop long !";
        }
        } else {
            $erreur = "Nom trop long !";
        }

    } else {
        $erreur = "Tous les champs doivent être complétés !";
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
            
        
            <form class="formulaire-insc" action="" method="post">
                <h2 class="text-center title-form">Inscription</h2>   
                
                <div class="first-div-insc div-insc">
                <div class="form-group">
                    <label class="label-insc" for="nom">Nom</label>
                    <input type="text" name="nom" class="form-control" placeholder="Nom" value="<?php if(isset($nom)){echo $nom;}?>" >
                </div>
                <div class="form-group">
                <label class="label-insc" for="Prénom">Prénom</label>
                    <input type="text" name="prenom" class="form-control" placeholder="Prenom" value="<?php if(isset($prenom)){echo $prenom;}?>">
                </div>
                <div class="form-group">
                <label class="label-insc" for="date">Date de naissance</label>
                    <input type="date" name="dateNaissance" class="form-control" placeholder="Date AAAA-MM-JJ" value="<?php if(isset($dateNaissance)){echo $dateNaissance;}?>">
                </div>
                </div>

                <div class="second-div-insc div-insc">
                <div class="form-group">
                <label class="label-insc" for="genre">Ton genre</label>
                    <select class="select-insc" value="genre" name="genre">
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                        <option value="Autre">Autre</option>
                    </select>
                </div>
                <div class="form-group">
                <label class="label-insc" for="mail">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php if(isset($email)){echo $email;}?>">
                </div>
                <div class="form-group">
                <label class="label-insc" for="ville">Ville</label>
                    <input type="text" name="ville" class="form-control" placeholder="Ville"  value="<?php if(isset($ville)){echo $ville;}?>">
                </div>
            </div>

            <div class="third-div-insc div-insc">
                <div class="form-group">
                <label class="label-insc" for="genre">Quel genre cherches-tu ?</label>
                    <select class="select-insc" value="genreRechercher" name="genreRechercher">
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                        <option value="Autre">Autre</option>
                    </select>
                </div>
                <div class="form-group">
                <label class="label-insc" for="age">Dans quelle tranche d'âge ?</label>
                    <select class="select-insc" value="trancheAge" name="trancheAge">
                        <option value="18 - 21">18 - 21</option>
                        <option value="22 - 25">22 - 25</option>
                        <option value="26 - 30">26 - 30</option>
                    </select>
                </div>
                <div class="form-group">
                <label class="label-insc" for="plat">Ton plat préféré</label>
                    <input type="text" name="platPref" class="form-control" placeholder="Plat pref" value="<?php if(isset($platPref)){echo $platPref;}?>">
                </div>
            </div>

            <div class="fourth-div-insc div-insc">
                <div class="form-group">
                <label class="label-insc" for="nom">Quel type de relation cherches-tu?</label>
                    <select class="select-insc" value="typeRelation" name="typeRelation">
                        <option value="1">Sucré</option>
                        <option value="2">Salé</option>
                        <option value="3">Super-mix</option>
                    </select>
                </div>
                <div class="form-group">
                <label class="label-insc" for="nom">Ton pseudo</label>
                    <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" value="<?php if(isset($pseudo)){echo $pseudo;}?>">
                </div>
                <div class="form-group">
                <label class="label-insc" for="nom">Ton mot de passe</label>
                    <input type="password" name="motdepasse" class="form-control" placeholder="Mot de passe" autocomplete="off">
                </div>
                <div class="form-group">
                <label class="label-insc" for="nom">Encore une fois.. </label>
                    <input type="password" name="motdepasse_retype" class="form-control" placeholder="Re-tapez le mot de passe" autocomplete="off">
                </div>
            </div>
                <div class="form-group final-div-insc">
                    <button type="submit" name="formInscriptionBtn" class="btn btn-primary btn-block">Inscription</button>
                </div>   
            </form>

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
            .login-form {
                width: 60%;
                margin: 50px auto;
            }
            .login-form form {
                margin-bottom: 15px;
                background: #C0BAF5;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }
            .login-form h2 {
                margin: 0 0 15px;
            }
            .form-control, .btn {
                min-height: 38px;
                border-radius: 2px;
            }
            .btn {        
                font-size: 15px;
                font-weight: bold;
                max-width: 150px;
                background-color: #9C9FE2;
                border: none;
                font-family: "quicksand-light";
                border-radius: 4px;
            }
            .btn:hover{
                background-color: #6568B3
            }
            .form-group{
                display: flex;
                flex-direction: column
            }
            .form-control{
                border:none;
                border-radius: 4px;
                font-family:"quicksand-light";
                font-size: 14px;
            }
            .label-insc{
                font-family:"quicksand-light"
            }
            .div-insc{
                padding: 10px;
                box-shadow: 2px 3px 6px rgba(0, 0, 0, 0.1);
                background-color: #CDC8FB;
                border-radius: 8px
            }
            .select-insc{
                font-family:"quicksand-light";
                border: none;
                color: grey;
                outline: none
            }
        </style>
        </body>
</html>
