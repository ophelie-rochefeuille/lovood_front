<?php
    
    require 'config.php';
    include_once 'header.php';
 $query = $bdd->query("SELECT * FROM usertest");
    $data = $query->fetchAll();
 
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

          
            <div class="mySlides fade">
                <img  class="picture-swipe" src="./assets/pictures/pexels-andrea-piacquadio-774909.jpg" >
            
            </div>

           

            <!-- Next and previous buttons -->
         
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
                <button onclick="supp()" class=" fleche--prev no-swipe swipe-buttons"><img src="./assets/pictures/no.png" alt="" class="no-swipe-img swipe-img-b"></button>
                <button  onclick="ajout()" class=" fleche--next yes-swipe swipe-buttons"><img src="./assets/pictures/Vector.png" alt="" class="yes-swipe-img swipe-img-b"></button>           
            </div>
                    </div>

            
            
            </div>


            
        <div class="final">

<?php
   

    for($i = 0; $i < sizeof($data); $i++)
    {

        echo
        '
        <div class="card">
            <div class="mySlides fade">
                <img class="picture-swipe" src="pp_users/'.$data[$i]["photoProfil"].'" />
            </div>
           
            <div class="infos-swipes">
            <h1 class="fname-swipe">Voici '. $data[$i]["prenom"].'</h1>
            <h2 class="age-swipe">Cette magnifique personne a '. $data[$i]["dateNaissance"].' 
            ans</h2>
            <h3 class="plat-pref-swipe">Son plât préféré c"est : La Tarte tatin</h3>  
            <div class="choices-swipes">
        ';
        ?>
        <button onclick="supp()" class="fleche fleche--prev no-swipe swipe-buttons"><img src="./assets/pictures/no.png" alt="" class="no-swipe-img swipe-img-b"></button>
        <button onclick="ajout()" class="fleche--next yes-swipe swipe-buttons"><img src="./assets/pictures/no.png" alt="" class="no-swipe-img swipe-img-b"></button>
             </div>
         </div>
         </div>
    <?php } ?>

</body>
<script type="text/javascript" src="./swipe.js"></script>

<script type="text/javascript">
let matchCards = document.querySelector('.card');
function supp(){
  matchCards.remove()
}

function ajout(){
  matchCards.remove()
}
</script>


<style>


/* Slideshow container */
.slideshow-container {
  max-width: 500px;
  max-height: 600px;
  position: relative;
  margin: auto;
}

.img-essai{
    max-width: 150px
}
.name{
    color:blue
}

/* Hide the images by default */
.mySlides {
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