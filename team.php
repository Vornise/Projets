<?php
require ('database.php');
//$Session = new Session();
$pseudo = isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : NULL;
$avatar = isset($_SESSION['avatar']) ? $_SESSION['avatar'] : NULL;

    ?>
<!DOCTYPE html>
<html lang="fr">

	<head>
		<!-- Ceci est l'en tête de la page-->
        <title>Phénécie</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/formulaire.css">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/slide.css">
        <link rel="shortcut icon" href="css/img/potion.ico">
        <link rel="stylesheet" href="css/tableau.css">


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
                      <li><a href="twitch.Vorn.php">Vorn</a></li>
                      <li><a href="twitch.Myns.php">Myns</a></li>
                      <li><a href="twitch.lilou01995.php">lilou01995</a></li>
                      <li><a href="twitch.phénécie.php">Phénécie</a></li>
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

                }else echo '  <li class ="avatar"><img src='.$avatar.' alt="avatar" class="profil"></li>
                                <li class="pseudo"><a href="#">'.$pseudo.'</a>
                                <ul class="submenu">
                                    <li><a href="profiluser.php?profil='.$pseudo.'">Mon profil</a></li>
                                    <li><a href="message.php">Message</a></li>
                                    <li><a href ="logout.php">Se déconnecter</a></li>
                                </ul>
                            </li>
                            ';

                ?>


            </ul>
        </nav>

        <div class="slideshow-container">

        <div class ="mySlides fade">
            <div class ="numbertext"></div>
            <img src="/site/css/img/OverwatchWall.jpg" style="width:100%">
            <div class="text"></div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext"></div>
            <img src="/site/css/img/wowwall.jpg" style="width:100%">
            <div class="text"></div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext"></div>
            <img src="/site/css/img/bdowall.jpg" style="width:100%">
            <div class="text"></div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext"></div>
            <img src="/site/css/img/deceitwall.jpg" style="width:100%">
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

<div id="id01" class="modal">
<div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="close Modale">&times;</span>
    </div>
    <form class="modale-content animate" method="post" enctype="multipart/form-data" action="inscription.php">
        <div class="container">
        <h1>Inscription</h1>
        <p>Merci de remplir ces champs pour votre création du compte.<p>
        <hr>
        <label for="nom"><b>Nom</b></label>
        <input type="text" id="nom" placeholder="Entré votre nom." name="nom" required>

        <label for="prenom"><b>Prénom</b></label>
        <input type="text" id="prenom" placeholder="Entré votre prénom." name="prenom" required><br>

        <br><label for="birthday"><b>Votre âge</b></label>
        <input type="date" id="birthday" name="birthday" required><br>

        <br><label for="sexe"><b>Votre sexe</b></label>
        <select id="sexe" name="sexe">
              <option value="Masculin">Masculin</option>
              <option value="Feminin">Feminin</option>
              <option value="Autre">Autre</option>

        </select><br>

        <br><label for="pays"><b>Votre pays</b></label>
        <select id="pays" name="pays">
              <option value="France">France</option>
              <option value="Belgique">Belgique</option>
              <option value="Suisse">Suisse</option>
              <option value="Canada">Canada</option>
        </select><br>

        <br>

       <label for="pseudo"><b>Pseudo</b></label>
        <input type="text" id="pseudo" placeholder="Entré un pseudo." name="pseudo" required>

        <label for="email"><b>Email</b></label>
        <input type="text" id="email" placeholder="Entré un Email." name="email" required><br>

        <br><label for="avatar"><b>Avatar</b></label>
        <input type="hidden" name="MAX_FILE_SIZE" value="200000">
        <input type="file" name="avatar" title = "Taille 300x300, format png jpg jpeg et gif." ><br>


        <br><label for="pass"><b>Mot de passe</b></label>
        <input type="password" id="pass" placeholder="Entré un mot de passe." name="pass" required>

        <label for="psw-repeat"><b>Confirmer mot de passe</b></label>
        <input type="password" id="pass_confirm" placeholder="Confirmer votre mot de passe." name="pass_confirm" required>

        <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px">Se souvenir de moi
        </label>



    <div class="clearfix">
        <button type="submit" class="signupbtn">S'inscrire</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Annuler</button>
            <span class="psw">ACCEPTER: <br><a href="conditions.php" style="color:dodgerblue" >LES CONDITIONS GENERALES.</a><input type="checkbox" id="myCheck" onclick="myFunction()" required></span>
    </div>
    </div>
    </form>



</div>



    <div id="id03" class="modale">

  <form class="modale-content animate" method="post" action="traitementconnexion.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modale">&times;</span>
      <img src="css/img/unknown.png" alt="Avatar" class="avatar">
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
      <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Annuler</button>
      <span class="psw">Mot de passe <a href="password.php" style="color:dodgerblue" >oublié?</a></span>
    </div>
  </form>
</div>
</div>


<?php
$sql= "SELECT * FROM utilisateurs ORDER BY id DESC";
try{
    $select = $pdo->prepare($sql);
    $select ->execute();
}catch (PDOException $e){echo 'Erreur SQL:'.$e->getMessage().'<br/>';die();}
while($data = $select->fetch())
{
  echo'
      <table>
      <tr>
        <th>Pseudo</th>
        <th>Grade</th>
        <th>Date d inscription</th>
      </tr>
      <tr>
        <td>'.$data['pseudo'].'</td>
        <td>Maria Anders</td>
        <td>Germany</td>
      </tr>



    </table>';
}
?>


    </body>

<script src="js/script.js"></script>


</html>
