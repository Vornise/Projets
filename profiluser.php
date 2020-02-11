<?php
require ('session.class.php');
$Session = new Session();
if(!isset($_SESSION['pseudo']))
{header("location: index.php");}
$pseudo = isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : NULL;
$nom = isset($_SESSION['nom']) ? $_SESSION['nom'] : NULL;
$prenom = isset($_SESSION['prenom']) ? $_SESSION['prenom'] : NULL;
$pays = isset($_SESSION['pays']) ? $_SESSION['pays'] : NULL;
$email = isset($_SESSION['email']) ? $_SESSION['email'] : NULL;
$groupid = isset($_SESSION['groupid']) ? $_SESSION['groupid'] : NULL;
$sexe = isset($_SESSION['sexe']) ? $_SESSION['sexe'] : NULL;
$avatar = isset($_SESSION['avatar']) ? $_SESSION['avatar'] : NULL;



    ?>
<!DOCTYPE html>
<html lang="fr">

	<head>
		<!-- Ceci est l'en tête de la page-->
        <title>Phénécie</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/login-twitch.css">
        <link rel="stylesheet" href="css/login-youtube.css">
        <link rel="stylesheet" href="css/login-steam.css">
        <link rel="stylesheet" href="css/login-battle.css">
        <link rel="stylesheet" href="css/login-facebook.css">
        <link rel="stylesheet" href="css/login-twitter.css">
        <link rel="stylesheet" href="css/slide.css">
        <link rel="stylesheet" href="css/cardformulaire.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="shortcut icon" href="css/img/potion.ico" />
        <link rel="stylesheet" href="css/profil.css">
        <link rel="stylesheet" href="css/alert.css">

	</head>

	<body>
        <nav>
            <ul>
              <li class="space3"><a href=""></a></li>
                <li class="actus"><a href="#">Actus</a>
                    <ul class="submenu">
                        <li><a href="#">TEST</a></li>
                        <li><a href="#">TEST</a></li>
                        <li><a href="#">TEST</a></li>
                    </ul>
                </li>
                <li class="stream"><a href="#">Stream</a>
                    <ul class="submenu">
                      <li><a href="twitch.Vorn.php?stream=euonlinet">Vorn</a></li>
                      <li><a href="twitch.Myns.php?stream=myns_tv">Myns</a></li>
                      <li><a href="twitch.lilou01995.php?stream=lilou01995">lilou01995</a></li>
                      <li><a href="twitch.phénécie.php?stream=phenecie">Phénécie</a></li>
                    </ul>
                </li>
                <li class="communaute"><a href="#">Communauté</a>
                    <ul class="submenu">
                        <li><a href="#">TEST</a></li>
                        <li><a href="#">TEST</a></li>
                        <li><a href ="#">TEST</a></li>
                    </ul>
                </li>
                <li class="space2"><a href=""></a></li>
                <li class="accueil"><a href="index.php"><div id="phenecie"></div> </div></a></li>
                <li class="space"><a href=""></a></li>
                <?php
                 if(!isset($_SESSION['pseudo'])){
                  echo  '<li class="connexion"><a href="#"onclick="document.getElementById(\'id03\').style.display=\'block\'">Connexion</a></li>
                        <li class="inscription"><a href="#" onclick="document.getElementById(\'id01\').style.display=\'block\'">Inscription</a></li>';
                }else echo '<li class="pseudo"><a href="#">'.$pseudo.'</a>
                                <ul class="submenu">
                                    <li><a href="profiluser.php?profil='.$pseudo.'">Mon profil</a></li>
                                    <li><a href="message.php">Message</a></li>
                                    <li><a href ="logout.php">Se déconnecter</a></li>
                                </ul>
                            </li>';

                ?>


            </ul>
        </nav>

        <div class="slideshow-container">

        <div class ="mySlides fade">
            <div class ="numbertext"></div>
            <img src="/site/css/img/Phenecie.png" style="width:100%">
            <div class="text"></div>
        </div>


        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
        </div>

    <div class="footer">
        <nav>
            <ul>
                <li class="about"><a href="about.php">A propos</a></li>
                <li class="team"><a href="team.php">La Team</a></li>
                <li class="confidentiality"><a href="confidentiality.php">Confidentialité</a></li>
            </ul>
        </nav>
</div>

</div>

<div id="twitch" class="moderne">

<form class="moderne-content animate" method="post" action="test.php">
<div class="imgcontainer">
  <span onclick="document.getElementById('twitch').style.display='none'" class="tclose" title="Close moderne">&times;</span>
  <img src="css/img/button/twitch.png" alt="Avatar" class="avatar">
</div>

<div class="container">
  <label for="pseudo"><b>Pseudo</b></label>
  <input type="text" id="pseudo2" placeholder="Entrer votre pseudo" name="pseudo" required>

  <label for="pass"><b>Mot de passe</b></label>
  <input type="password" id="pass2" placeholder="Entrer votre mot de passe" name="pass" required>

  <button type="submit">Connexion</button>
  <label>
    <input type="checkbox" checked="checked" name="remember"> Se souvenir de moi
  </label>
</div>

<div class="container" style="background-color:#f1f1f1">
  <button type="button" onclick="document.getElementById('twitch').style.display='none'" class="cancelbtn">Annuler</button>
  <span class="psw">Mot de passe <a href="password.php" style="color:dodgerblue" >oublié?</a></span>
</div>
</form>
</div>


<div id="youtube" class="ymoderne">

<form class="ymoderne-content animate" method="post" action="youtube.php">
<div class="imgcontainer">
  <span onclick="document.getElementById('youtube').style.display='none'" class="yclose" title="Close ymoderne">&times;</span>
  <img src="css/img/button/youtube.png" alt="Avatar" class="avatar">
</div>

<div class="container">
  <label for="pseudo"><b>Pseudo</b></label>
  <input type="text" id="pseudo3" placeholder="Entrer votre pseudo" name="pseudo" required>

  <label for="pass"><b>Mot de passe</b></label>
  <input type="password" id="pass3" placeholder="Entrer votre mot de passe" name="pass" required>

  <button type="submit" class ="youtube">Connexion</button>
  <label>
    <input type="checkbox" checked="checked" name="remember"> Se souvenir de moi
  </label>
</div>

<div class="container" style="background-color:#f1f1f1">
  <button type="button" onclick="document.getElementById('youtube').style.display='none'" class="cancelbtn">Annuler</button>
  <span class="psw">Mot de passe <a href="password.php" style="color:dodgerblue" >oublié?</a></span>
</div>
</form>
</div>

<div id="steam" class="smoderne">

<form class="smoderne-content animate" method="post" action="steam.php">
<div class="imgcontainer">
  <span onclick="document.getElementById('steam').style.display='none'" class="sclose" title="Close smoderne">&times;</span>
  <img src="css/img/button/steam.png" alt="Avatar" class="avatar">
</div>

<div class="container">
  <label for="pseudo"><b>Pseudo</b></label>
  <input type="text" id="pseudo4" placeholder="Entrer votre pseudo" name="pseudo" required>

  <label for="pass"><b>Mot de passe</b></label>
  <input type="password" id="pass4" placeholder="Entrer votre mot de passe" name="pass" required>

  <button type="submit" class ="steam">Connexion</button>
  <label>
    <input type="checkbox" checked="checked" name="remember"> Se souvenir de moi
  </label>
</div>

<div class="container" style="background-color:#f1f1f1">
  <button type="button" onclick="document.getElementById('steam').style.display='none'" class="cancelbtn">Annuler</button>
  <span class="psw">Mot de passe <a href="password.php" style="color:dodgerblue" >oublié?</a></span>
</div>
</form>
</div>

<div id="btag" class="bmoderne">

<form class="bmoderne-content animate" method="post" action="battle.net.php">
<div class="imgcontainer">
  <span onclick="document.getElementById('btag').style.display='none'" class="bclose" title="Close bmoderne">&times;</span>
  <img src="css/img/button/battle.png" alt="Avatar" class="avatar">
</div>

<div class="container">
  <label for="pseudo"><b>Pseudo</b></label>
  <input type="text" id="pseudo5" placeholder="Entrer votre pseudo" name="pseudo" required>

  <label for="pass"><b>Mot de passe</b></label>
  <input type="password" id="pass5" placeholder="Entrer votre mot de passe" name="pass" required>

  <button type="submit" class ="btag">Connexion</button>
  <label>
    <input type="checkbox" checked="checked" name="remember"> Se souvenir de moi
  </label>
</div>

<div class="container" style="background-color:#f1f1f1">
  <button type="button" onclick="document.getElementById('btag').style.display='none'" class="cancelbtn">Annuler</button>
  <span class="psw">Mot de passe <a href="password.php" style="color:dodgerblue" >oublié?</a></span>
</div>
</form>
</div>

<div id="facebook" class="fmoderne">

<form class="fmoderne-content animate" method="post" action="facebook.php">
<div class="imgcontainer">
  <span onclick="document.getElementById('facebook').style.display='none'" class="fclose" title="Close fmoderne">&times;</span>
  <img src="css/img/button/facebook.png" alt="Avatar" class="avatar">
</div>

<div class="container">
  <label for="pseudo"><b>Pseudo</b></label>
  <input type="text" id="pseudo6" placeholder="Entrer votre pseudo" name="pseudo" required>

  <label for="pass"><b>Mot de passe</b></label>
  <input type="password" id="pass6" placeholder="Entrer votre mot de passe" name="pass" required>

  <button type="submit" class ="facebook">Connexion</button>
  <label>
    <input type="checkbox" checked="checked" name="remember"> Se souvenir de moi
  </label>
</div>

<div class="container" style="background-color:#f1f1f1">
  <button type="button" onclick="document.getElementById('facebook').style.display='none'" class="cancelbtn">Annuler</button>
  <span class="psw">Mot de passe <a href="password.php" style="color:dodgerblue" >oublié?</a></span>
</div>
</form>
</div>

<div id="twitter" class="twmoderne">

<form class="twmoderne-content animate" method="post" action="twitter.php">
<div class="imgcontainer">
  <span onclick="document.getElementById('twitter').style.display='none'" class="twclose" title="Close twmoderne">&times;</span>
  <img src="css/img/button/twitter.png" alt="Avatar" class="avatar">
</div>

<div class="container">
  <label for="pseudo"><b>Pseudo</b></label>
  <input type="text" id="pseudo7" placeholder="Entrer votre pseudo" name="pseudo" required>

  <label for="pass"><b>Mot de passe</b></label>
  <input type="password" id="pass7" placeholder="Entrer votre mot de passe" name="pass" required>

  <button type="submit" class ="twitter">Connexion</button>
  <label>
    <input type="checkbox" checked="checked" name="remember"> Se souvenir de moi
  </label>
</div>

<div class="container" style="background-color:#f1f1f1">
  <button type="button" onclick="document.getElementById('twitter').style.display='none'" class="cancelbtn">Annuler</button>
  <span class="psw">Mot de passe <a href="password.php" style="color:dodgerblue" >oublié?</a></span>
</div>
</form>
</div>

<?php $Session->flash(); ?>

    <?php

         echo '<div class="card">
        <img src='.$avatar.' alt="avatar" width="300" height="300" style="width:100%">
        <h1>'.$pseudo.'</h1>
        <p class="group">'.$groupid.'</p>
        <p>'.$pays.'</p>
        <p>'.$sexe.'</p>
        <div style="margin: 24px 0;">
            <a href="#" onclick="document.getElementById(\'twitter\').style.display=\'block\'"><img src="css/img/button/twlogo.png" title ="Twitter" class="Twitter"></a>
            <a href="#" onclick="document.getElementById(\'facebook\').style.display=\'block\'"><img src="css/img/button/flogo.png" title ="Facebook" class="Facebook"></a>
            <a href="#" onclick="document.getElementById(\'btag\').style.display=\'block\'"><img src="css/img/button/blogo.png"  title ="BATTLE NET" class="Btag"></a>
            <a href="#" onclick="document.getElementById(\'steam\').style.display=\'block\'"><img src="css/img/button/slogo.png"  title ="Steam" class="Steam"></a>
            <a href="#" onclick="document.getElementById(\'youtube\').style.display=\'block\'"><img src="css/img/button/ylogo.png" title ="YouTube" class="Youtube"></a>
            <a href="#" onclick="document.getElementById(\'twitch\').style.display=\'block\'"><img src="css/img/button/tlogo.png"  title ="Twitch" class="Twitch"></a>
        </div>
        <li class="modifier"><a href="#" onclick="document.getElementById(\'idmodifier\').style.display=\'block\'" style="color:white">modifier </a></li>
        </div>';?>

  <?php


  echo '

  <div id="idmodifier" class="menu animate">
  <h2>Modifier</h2>
  <form method="post" action="update.php" enctype="multipart/form-data">
    <div class="imgcontainer">
      <span onclick="document.getElementById(\'idmodifier\').style.display=\'none\'" class="close" title="Close Modale">&times;</span>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" id="nom" placeholder="'.$nom.'" name="nom">
  </div>

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" id="prenom" placeholder="'.$prenom.'" name="prenom">
  </div>

    <input hidden readonly id="pseudo" name="pseudo" value="'.$pseudo.'">

  <div class="input-container">
    <i class="fa fa-intersex icon" style="font-size:24px"></i>
    <select id="sexe" name="sexe">
           <option hidden>'.$sexe.'</option>
          <option value="Masculin">Masculin</option>
          <option value="Feminin">Feminin</option>
          <option value="Autre">Autre</option>

    </select><br>
  </div>

<div class="input-container">
  <i class="fa fa-home icon" style="font-size:24px"></i>
  <select id="pays" name="pays">
        <option hidden>'.$pays.'</option>
        <option value="France">France</option>
        <option value="Belgique">Belgique</option>
        <option value="Suisse">Suisse</option>
        <option value="Canada">Canada</option>
  </select>
</div>


  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="text" placeholder="'.$email.'" name="email">
  </div>

  <div class="input-container">
    <i class="fa fa-image icon" style="font-size:24px"></i>
    <input type="hidden" name="MAX_FILE_SIZE" value="200000">
    <input type="file" name="avatar" title = "Taille 300x300, format png jpg jpeg et gif.">
  </div>

  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password"  placeholder="*********" name="pass">
  </div>

  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password"  placeholder="Confirmer votre mot de passe." name="confirm" >
  </div>

  <button type="submit" class="btn">Enregistrer</button>
</form>
</div>';
?>
    </body>

    <script src="js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type= "text/javascript" src="js/alert.js"></script>

</html>
