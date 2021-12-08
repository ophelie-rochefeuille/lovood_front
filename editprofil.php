<?php

include 'config.php';
include 'header.php';

if(isset($_SESSION['id']))
{
    $requser = $bdd->prepare("SELECT * FROM usertest WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();


    //requêtes de modification
    if(isset($_POST['newemail']) AND !empty($_POST['newemail']) AND $_POST['newemail'] != $user['email'])
    {
        $newemail = htmlspecialchars($_POST['newemail']);
        $insertnewemail = $bdd->prepare("UPDATE usertest set email = ? WHERE id = ?");
        $insertnewemail->execute(array($newemail, $_SESSION['id']));
        header("Location: profil.php?id=".$_SESSION['id']);
    }
    if(isset($_POST['newville']) AND !empty($_POST['newville']) AND $_POST['newville'] != $user['ville'])
    {
        $newville = htmlspecialchars($_POST['newville']);
        $insertville = $bdd->prepare("UPDATE usertest set ville = ? WHERE id = ?");
        $insertville->execute(array($newville, $_SESSION['id']));
        header("Location: profil.php?id=".$_SESSION['id']);
    }
    if(isset($_POST['newgenreRechercher']) AND !empty($_POST['newgenreRechercher']) AND $_POST['nenewgenreRechercherwville'] != $user['genreRechercher'])
    {
        $newgenreRechercher = htmlspecialchars($_POST['newgenreRechercher']);
        $insertnewgenreRechercher = $bdd->prepare("UPDATE usertest set genreRechercher = ? WHERE id = ?");
        $insertnewgenreRechercher->execute(array($newgenreRechercher, $_SESSION['id']));
        header("Location: profil.php?id=".$_SESSION['id']);
    }
    if(isset($_POST['newplatPref']) AND !empty($_POST['newplatPref']) AND $_POST['newplatPref'] != $user['platPref'])
    {
        $newplatPref = htmlspecialchars($_POST['newplatPref']);
        $insertnewplatPref = $bdd->prepare("UPDATE usertest set platPref = ? WHERE id = ?");
        $insertnewplatPref->execute(array($newplatPref, $_SESSION['id']));
        header("Location: profil.php?id=".$_SESSION['id']);
    }
    if(isset($_POST['newtypeRelation']) AND !empty($_POST['newtypeRelation']) AND $_POST['newtypeRelation'] != $user['typeRelation'])
    {
        $newtypeRelation = htmlspecialchars($_POST['newtypeRelation']);
        $insertnewtypeRelation = $bdd->prepare("UPDATE usertest set typeRelation = ? WHERE id = ?");
        $insertnewtypeRelation->execute(array($newtypeRelation, $_SESSION['id']));
        header("Location: profil.php?id=".$_SESSION['id']);
    }
    if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo'])
    {
        $newpseudo = htmlspecialchars($_POST['newpseudo']);
        $insertpseudo = $bdd->prepare("UPDATE usertest set pseudo = ? WHERE id = ?");
        $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
        header("Location: profil.php?id=".$_SESSION['id']);
    }
    if(isset($_POST['newmotdepasse']) AND !empty($_POST['newmotdepasse']) AND isset($_POST['newmotdepasse_retype']) AND !empty($_POST['newmotdepasse_retype']))
    {
        $newmotdepasse = sha1($_POST['newmotdepasse']);
        $newmotdepasse_retype = sha1($_POST['newmotdepasse_retype']);

        if($newmotdepasse == $newmotdepasse_retype)
        {
          $insertmdp = $bdd->prepare("UPDATE usertest set motdepasse = ? WHERE id = ?");
          $insertmdp->execute(array($newmotdepasse, $_POST['id']));
          header("Location: profil.php?id=".$_SESSION['id']);
        }
        else
        {
            $msg = "Mots de passes différents !";
        }
    }
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Edition</title>
</head>
<body>

    <div class="login-form">
        <form action="" method="post">
            <h2 class="text-center">Modification</h2>       
            <div class="form-group">
                <input type="email" name="newemail" class="form-control" placeholder="Nouveau mail" value="<?php echo $user['email']; ?>">
            </div>
            <div class="form-group">
                <input type="text" name="newville" class="form-control" placeholder="Nouvelle ville" value="<?php echo $user['ville']; ?>">
            </div>
            <label>Nouveau genre recherché</label>
            <div class="form-group">
                <select name="newgenreRechercher">
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                    <option value="Autre">Autre</option>
                </select>
            </div>
            <div class="form-group">
            <label>Nouvelle tranche age</label>
                <select name="newtrancheAge">
                    <option value="18 - 21">18 - 21</option>
                    <option value="22 - 25">22 - 25</option>
                    <option value="26 - 30">26 - 30</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="newplatPref" class="form-control" placeholder="Nouveau plat pref" value="<?php echo $user['platPref']; ?>">
            </div>
            <label>Nouveau type de relation</label>
            <div class="form-group">
                    <select name="newtypeRelation">
                        <option value="1">Sucré</option>
                        <option value="2">Salé</option>
                        <option value="3">Super-mix</option>
                    </select>
                </div>
            <div class="form-group">
                <input type="text" name="newpseudo" class="form-control" placeholder="nouveau pseudo" value="<?php echo $user['pseudo']; ?>">
            </div>
            <div class="form-group">
                <input type="password" name="newmotdepasse" class="form-control" placeholder="nouveau mot de passe">
            </div>
            <div class="form-group">
                <input type="password" name="newmotdepasse_retype" class="form-control" placeholder="confirmer le mot de passe">
            </div>
            <div class="form-group">
                <button type="submit" name="formConnexionBtn" class="btn btn-primary btn-block">Modifier le profil</button>
            </div>   
        </form>

            <?php
                if(isset($msg))
                {
                    echo $msg;
                }
            ?>
    </div>






    <style>
        body{
            background-color: #FFFEF9
        }
            .login-form {
                width: 340px;
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
            }
        </style>
    
</body>
</html>


<?php
} else {
    header("Location: connexion.php");
}
?>