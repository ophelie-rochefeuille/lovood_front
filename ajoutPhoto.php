<?php

include 'config.php';
include 'header.php';

if(isset($_SESSION['id']))
{
    $target = "profil_photo/".basename($_FILES['first_pic']['name']);

    $requser = $bdd->prepare("SELECT * FROM usertest WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();


    //requêtes de modification
    if(isset($_POST['newphoto1']) AND !empty($_POST['newphoto1']) AND isset($_POST['newphoto1_retype']) AND !empty($_POST['newphoto1_retype']))
    {
        $newphoto1 = $_FILES['newphoto1'];
        $newphoto1_retype = $_FILES['newphoto1_retype'];
        if($newphoto1 == $newphoto1_retype) {
            $insertphoto1 = $bdd->prepare("UPDATE usertest SET first_pic = ? WHERE id = ?");
            $insertphoto1->execute(array($newphoto1, $_POST['id']));
            header("Location: profil.php?id=".$_SESSION['id']);
        }
        if(move_uploaded_file($_FILES['first_pic']['tmp_name'], $target)){
            $msg = "image ok";
        } else {
            $msg = "image pas ok";
        }
        var_dump($_FILES['first_pic']['name']);
                var_dump($newphoto1);
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
                    <input type="file" name="photoProfil">
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