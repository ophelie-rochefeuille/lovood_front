<?php 
session_start();
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
        <a href="./index.php"><img class="logo-lovood" alt="logo" src="./assets/pictures/Capture d’écran 2021-09-27 à 16.03 3.png"> </a>
      </div>
        <div class='container-nav'>
        <li class='nav-item'>
          <a class='nav-link' href='profil.php?id=<?php echo $_SESSION['id']; ?>'>Mon compte</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='swipes.php?id=<?php echo $_SESSION['id']; ?>'>Swipes</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='messages.php'>Messages</a>
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
          <img class="img-profil-sidebar-id" src="./assets/pictures/Capture d’écran 2021-09-29 à 16.08 1.png" />
          <a class="link-profil-navbar" href="./ajoutPhoto.php"><img class="img-profil-sidebar" src="./assets/pictures/Group 51.png" /></a>
      </div>
          <ul class='items-sidebar'>
        <li class='nav-item-bar'>
          <a class='nav-link' href="./editprofil.php">Mon profil</a>
        </li>
        <li class='nav-item-bar'>
          <a class='nav-link' href='./propos.php'>A propos</a>
        </li>
        <li class='nav-item-bar'>
          <a class='nav-link' href='./confidentialite.php'>Confidentialité</a>
        </li>
        <li class='nav-item-bar'>
        <a class='nav-link'>Suppression</a>
        </li>
        <li class='nav-item-bar'>
        <a class='nav-link'href="./form.php">Nous contacter</a>
        </li>
      </ul>
      </div>
        
        <?php } else { ?>
          
        <header>

            <div class="header-main">
                <a href="./index.php"><img class="logo-lovood" alt="logo" src="./assets/pictures/Capture d’écran 2021-09-27 à 16.03 3.png"> </a>
                <div class="buttons-main">
                    <a class="button-header" href="connexion.php">Connexion</a>
                    <a class="button-header" href="inscription.php">Inscription</a>
                </div>
            </div>

        </header>
          <?php } ?>

</body>
</html>