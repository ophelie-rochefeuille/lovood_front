<?php
    session_start();
    require 'config.php';
    include_once 'header.php';

    $query = $bdd->prepare("SELECT * FROM friend_request WHERE pseudo_1 = :pseudo_1 OR pseudo_2 = :pseudo_2");
    $query->execute([
        "pseudo_1" => $_SESSION['pseudo'],
        "pseudo_2" => $_SESSION['pseudo']
    ]);

    $data = $query->fetchAll();

    if($_POST['pseudo'])
    {
        $user_check[] = $_SESSION['pseudo'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style.css" />
    
    <title>Document</title>
</head>
<body>
    <div class=main-container-swipes>
    <h1 class="swipes-names">Tes swipes</h1>

        <div class="card">
           
           
            
                <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
                <img  class="picture-swipe" src="./assets/pictures/pexels-andrea-piacquadio-774909.jpg" >
            
            </div>

            <div class="mySlides fade">
                <img class="picture-swipe" src="./assets/pictures/pexels-daniel-xavier-1239291.jpg" >
            
            </div>

            <div class="mySlides fade">
                <img class="picture-swipe" src="./assets/pictures/pexels-luizclas-1848565.jpg" >
            </div>

            <!-- Next and previous buttons -->
            <div class="slide-button">
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            </div>
            <br>

            <!-- The dots/circles -->
            <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            </div>


            <div class="infos-swipes">
                <h1 class="fname-swipe">Voici Andrea</h1>
                <h2 class="age-swipe">Elle a 26 ans</h2>
                <h3 class="plat-pref-swipe">Son plât préféré c'est : La Tarte tatin</h3>  
                <div class="choices-swipes">
                <button class="no-swipe swipe-buttons"><img src="./assets/pictures/no.png" alt="" class="no-swipe-img swipe-img-b"></button>
                <button class="yes-swipe swipe-buttons"><img src="./assets/pictures/Vector.png" alt="" class="yes-swipe-img swipe-img-b"></button>           
            </div>
                    </div>

            
            
            </div>


            




</body>
<script type="text/javascript" src="./swipe.js"></script>


<style>

* {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  max-width: 500px;
  max-height: 600px;
  position: relative;
  margin: auto;
}


/* Hide the images by default */
.mySlides {
  display: none;
  max-height: 600px
}

.picture-swipe{
    max-height: 600px;
    max-width: 400px ;
    min-height: 600px; 
    object-fit: cover
}
/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
}

.slide-button{
    width: 100%;
    display: flex;
    justify-content: space-between
}
</style>
</html>