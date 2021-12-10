<?php
include_once 'header.php';
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
    
<div class='main-container-contact'>

<div class='div-secondary-container-contact'>

  <div class="main-container-h1-text-contact">
    <div class='container-h1-text-contact'>
      <h1 class='main-title-contact'>Contactez-nous</h1>
      <p class='paraph-contact'>Une question, une remarque ? n'hésites pas à nous envoyer un message.</p>
    </div>
  </div>

  <div class="contact-links">
      <h3>Contact</h3>
      <p>Nous essayons de vous répondre au plus vite</p>

      <div class="phone-number">
          <img src="./assets/pictures/phone-alt-solid 1.png" />
          <p>06 01 02 03 04</p>
      </div>  
      <div class="mail-lovood">
      <img src="./assets/pictures/envelope-solid 1.png" />
        <p>lovood@email.com</p>
      </div> 
      <div class="reseaux-lovood">
      <img src="./assets/pictures/facebook_logo.svg" />
      <img src="./assets/pictures/instagram_logo.svg" />
      <img src="./assets/pictures/twitter_logo.svg" />
      </div>
  </div>

  <div class="formulaire-contact-div">

    <form >
      <div class="main-container-form">

      <div class="names">
        <div class='div-prenom div-input-contact'>
          <div class='name-label'>Prénom</div>
          <input type='text' name='prenom' class='prenom-input input-contact' 
           />
        </div>

        <div class='div-nom div-input-contact'>
          <div class='name-label'>Nom</div>
          <input type='text' name='nom' class='nom-input input-contact' 
           />
        </div>
        </div>

        <div class="mail-phone">
        <div class='div-mail div-input-contact'>
          <div class='name-label'>Mail</div>
          <input type='email' name='mail' class='mail-input input-contact' 
           />
        </div>

        <div class='div-number div-input-contact'>
          <div class='name-label'>Téléphone</div>
          <input type='text' name='text' class='text-input input-contact' 
           />
        </div>
</div>

        
            <div class='div-object-text div-input-contact'>
                    <div class='name-label'>Message</div>
                    <textarea class='message-input text-input input-contact' id="story" name="story">
                    
                    </textarea>
                    </div>
                    
            </div>
            <div class="button-submit">
             <button class='button-send' onClick={handleSubmit} type='button' >Envoyer</button>
            </div>
      </div>

        
      </div>

    </form>
  </div>
</div>
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

</body>

</html>

<style>

    </style>