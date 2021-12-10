<?php
    include_once 'config.php';
    include_once 'header.php';

    if(isset($_GET['id']) AND $_GET['id'] > 0)
    {
        $getid = intval($_GET['id']);

        $requser = $bdd->prepare("SELECT * FROM usertest WHERE id = ?");
        $requser->execute(array($getid));

        $userinfo = $requser->fetch();
?>

<?php if(isset($_SESSION['id'])){ ?>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    <div class="container-profil-principal">
        <h2>Bonjour <?php echo $userinfo['prenom']?>   <?php echo $userinfo['nom'] ?> </h2>
       

    <div class="matchs-profil-div">
    <h1>Vos derniers matchs</h1>
    <p>Vous n'avez pas encore de match...</p>
    </div>

    <div class="conv-profil-div">
    <h1>Vos dernières conversations</h1>
    <p>Pas de conversation en cours</p>
    </div>

    <div class="network-div">
    <div class="social-network-main">
                    <a class="social-network-icon instagram"><img class="pic-social-network"
                            src="./assets/pictures/instagram_logo.svg" /></a>
                    <a class="social-network-icon twitter"><img class="pic-social-network"
                            src="./assets/pictures/twitter_logo.svg" /></a>
                    <a class="social-network-icon facebook"><img class="pic-social-network"
                            src="./assets/pictures/facebook_logo.svg" /></a>
                </div>

</div>
    </div>

    
</body>
</html>

<?php } else { ?>
<h1>Page not found</h1>
<?php } } ?>
