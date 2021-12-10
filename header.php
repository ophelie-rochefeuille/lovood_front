<?php 
session_start();

include_once 'config.php';


    if(isset($_GET['id']) AND $_GET['id'] > 0)
    {
        $getid = intval($_GET['id']);

        $requser = $bdd->prepare("SELECT * FROM usertest WHERE id = ?");
        $requser->execute(array($getid));

        $userinfo = $requser->fetch();}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style.css" />
</head>
<body>

        <?php
      if(isset($_SESSION['id'])){ ?>

        <header>

        <div class="header-main">

        <div class='container-logo'>
        <a href="./index.php"><img class="logo-lovood" alt="logo" src="./assets/pictures/logo_lovood.png"> </a>
      </div>
        <div class='container-nav'>
        <li class='nav-item'>
          <a class='nav-link' href='profil.php?id=<?php echo $_SESSION['id']; ?>'>Mon compte</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='swipes.php?id=<?php echo $_SESSION['id']; ?>'>Swipes</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='messages.php?id=<?php echo $_SESSION['id']; ?>'>Messages</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='#'>Amis</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href="deconnexion.php">Se deconnecter</a>
        </li>
      </div>
            </div>
        </div>

        </header>

        <div class="sidebar">
          <div class='profil-sidebar'>
          <?php echo "<img class='img-profil-sidebar-id' src='pp_users/".$userinfo['photoProfil']."' />"; ?>
          <a class="link-profil-navbar" href="./ajoutPhoto.php"><img class="img-profil-sidebar" src="./assets/pictures/Group 51.png" /></a>
      </div>
          <ul class='items-sidebar'>
        <li class='nav-item-bar'>
          <a class='nav-link' href="./editprofil.php?id=<?php echo $_SESSION['id']; ?>">Mon profil</a>
        </li>
        <li class='nav-item-bar'>
          <a class='nav-link' href='./propos.php?id=<?php echo $_SESSION['id']; ?>'>A propos</a>
        </li>
        <li class='nav-item-bar'>
          <a class='nav-link' href='./confidentialite.php?id=<?php echo $_SESSION['id']; ?>'>Confidentialité</a>
        </li>
        <li class='nav-item-bar'>
        <a class='nav-link' href='./action.php?action=deleteUser&id=<?php echo $_SESSION['id']; ?>'>Suppression</a>
        </li>
        <li class='nav-item-bar'>
        <a class='nav-link'href="./form.php?id=<?php echo $_SESSION['id']; ?>">Nous contacter</a>
        </li>
      </ul>
      </div>
        
        <?php } else { ?>
          
        <header>

            <div class="header-main">
                <a href="./index.php"><img class="logo-lovood" alt="logo" src="./assets/pictures/logo_lovood.png"> </a>
                <div class="buttons-main">
                    <a class="button-header" href="connexion.php">Connexion</a>
                    <a class="button-header" href="inscription.php">Inscription</a>
                </div>
            </div>

        </header>
          <?php } ?>

</body>
</html>