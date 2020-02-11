<?php
require ('database.php');
require ('session.class.php');

        $nom = htmlentities($_POST['nom']);
        $prenom = htmlentities($_POST['prenom']);
        $sexe = htmlentities($_POST['sexe']);
        $pays = htmlentities($_POST['pays']);
        $email = htmlentities( $_POST['email']);
        $pass = htmlentities($_POST['pass']);
        $avatar = htmlentities($_POST['avatar']);
        $pseudo = htmlentities($_POST['pseudo']);

        $sql= "SELECT * FROM utilisateurs WHERE pseudo ='$pseudo'";
        try{
            $select = $pdo->prepare($sql);
            $select ->execute();
        }catch (PDOException $e){echo 'Erreur SQL:'.$e->getMessage().'<br/>';die();}
        while($data = $select->fetch())
        {
          $emailresult = $data['email'];
        }
        if(empty($emailresult)){

          $emailresult = null;
        }
        if ($email == $emailresult )
        {
          $Session = new Session();
          $Session->setFlash('ERREUR: Email déjà utilisé.', 'idnull');
          header('location: ../site/profiluser.php');

            die;

        }

        if(!empty($nom)){
          try{
          $sql = "UPDATE utilisateurs SET nom=? WHERE pseudo='$pseudo'";
          $update = $pdo->prepare($sql);
          $update->execute(array($nom));

        }catch (PDOException $e){echo 'Erreur SQL:'.$e->getMessage().'<br/>';die();}
      }

        if(!empty($prenom)){
          try{
            $sql = "UPDATE utilisateurs SET prenom=? WHERE pseudo='$pseudo'";
            $update = $pdo->prepare($sql);
            $update->execute(array($prenom));
          }catch (PDOException $e){echo 'Erreur SQL:' .$e->getMessage().'<br/>';die();}
        }

        if(!empty($sexe)){
          try{
            $sql = "UPDATE utilisateurs SET sexe=? WHERE pseudo='$pseudo'";
            $update = $pdo->prepare($sql);
            $update->execute(array($sexe));
          }catch (PDOException $e){echo 'Erreur SQL:' .$e->getMessage().'<br/>';die();}
        }

        if(!empty($pays)){
          try{
            $sql = "UPDATE utilisateurs SET pays=? WHERE pseudo='$pseudo'";
            $update = $pdo->prepare($sql);
            $update->execute(array($pays));
          }catch (PDOException $e){echo 'Erreur SQL:' .$e->getMessage().'<br/>';die();}
        }

        if(!empty($email)){
          try{
            $sql ="UPDATE utilisateurs SET email=? WHERE pseudo='$pseudo'";
            $update = $pdo->prepare($sql);
            $update->execute(array($email));
          }catch (PDOException $e){echo 'Erreur SQL:' .$e->getMessage().'<br/>';die();}
        }

        if(!empty($pass)){
          try{
            $sql ="UPDATE utilisateurs SET pass=? WHERE pseudo='$pseudo'";
            $update = $pdo->prepare($sql);
            $update->execute(array(password_hash($pass, PASSWORD_DEFAULT)));
          }catch (PDOException $e){echo 'Erreur SQL:' .$e->getMessage().'<br/>';die();}
        }



        $dossiercreer = "./css/img/upload/avatar/$pseudo/";
        if(!is_dir($dossiercreer)){
         mkdir("./css/img/upload/avatar/$pseudo/");
        }

        $erreurimg;
        $erreurimgupload;
        $dossier = "./css/img/upload/avatar/$pseudo/";
        $fichier = basename($_FILES['avatar']['name']);
        $taille_maxi = 200000;
        $taille = filesize($_FILES['avatar']['tmp_name']);
        $extensions = array('.png', '.gif', '.jpg', '.jpeg');
        $extension = strrchr($_FILES['avatar']['name'], '.');
        $dimensions = getimagesize($_FILES['avatar']['tmp_name']);
        define('WIDTH_MAX', 300);    // Largeur max de l'image en pixels
        define('HEIGHT_MAX', 300);//hauteur max de l'image en pixels.

        //Début des vérifications de sécurité...


        if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
        {
          $Session = new Session();
          $Session->setFlash('INFO: Vous devez uploader un fichier de type png, gif, jpg, jpeg...', 'idinfo');
          header('location: ../site/profiluser.php');


        }
        if($dimensions[0] != WIDTH_MAX || $dimensions[1] != HEIGHT_MAX){

          $Session = new Session();
          $Session->setFlash('INFO: L\'image doit être du 300x300 pixels.', 'idinfo');
          header('location: ../site/profiluser.php');



        }
        $dimensions = getimagesize($_FILES['avatar']['tmp_name']);
        if($taille>$taille_maxi)
        {
          $Session = new Session();
          $Session->setFlash('INFO: Le fichier est trop gros...', 'idinfo');
          header('location: ../site/profiluser.php');


        }
        if(!isset($erreurimg)) //S'il n'y a pas d'erreur, on upload
        {
             //On formate le nom du fichier ici...
             $fichier = strtr($fichier,
                  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
             $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
             if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
             {
                    try{
                      $sql ="UPDATE utilisateurs SET avatar=? WHERE pseudo='$pseudo'";
                      $update = $pdo->prepare($sql);
                      $update->execute(array("css/img/upload/avatar/$pseudo/$fichier"));
                    }catch (PDOException $e){echo 'Erreur SQL:' .$e->getMessage().'<br/>';die();}
                  echo 'Upload effectué avec succès !\n';
             }
             else //Sinon (la fonction renvoie FALSE).
             {
               $Session = new Session();
               $Session->setFlash('ERREUR: Echec de l\'upload !', 'idnull');
               header('location: ../site/profiluser.php');

             }
        }
        else
        {
             echo $erreurimg;
        }


        //reload la sessions avec un session destroy + reco la session


        if(!empty($nom) || !empty($prenom) ||  !empty($sexe) || !empty($pays)  || !empty($email) || !empty($pass) || !empty($avatar)){

        $sql= "SELECT * FROM utilisateurs WHERE pseudo ='$pseudo'";
        try{
            $select = $pdo->prepare($sql);
            $select ->execute();
        }catch (PDOException $e){echo 'Erreur SQL:'.$e->getMessage().'<br/>';die();}
        while($data = $select->fetch())
        {
         $idresult = $data['id'];
         $nomresult = $data['nom'];
         $prenomresult = $data['prenom'];
         $birthdayresult = $data['birthday'];
         $sexeresult = $data['sexe'];
         $paysresult = $data['pays'];
         $pseudoresult = $data['pseudo'];
         $emailresult = $data['email'];
         $passresult = $data['pass'];
         $avatarresult = $data['avatar'];
         $grouperesult = $data['groupid'];
         $date = $data['date'];



        }
        session_destroy();
        $Session = new Session();
        $_SESSION['id'] = $idresult;
        $_SESSION['nom'] = $nomresult;
        $_SESSION['prenom'] = $prenomresult;
        $_SESSION['birthday'] = $birthdayresult;
        $_SESSION['sexe'] = $sexeresult;
        $_SESSION['pays'] = $paysresult;
        $_SESSION['pseudo'] = $pseudoresult;
        $_SESSION['email'] = $emailresult;
        $_SESSION['avatar'] = $avatarresult;
        $_SESSION['groupid'] = $grouperesult;
        $_SESSION['date'] = $dateresult;



         if($grouperesult == 0){
             $grouperesult = "Membre";
             $_SESSION['groupid'] = $grouperesult;
         }
         if($grouperesult == 1){
             $grouperesult = "Admin";
             $_SESSION['groupid'] = $grouperesult;
         }
         if($grouperesult == 3){
             $grouperesult = "Streameur";
             $_SESSION['groupid'] = $grouperesult;
         }
         if($grouperesult ==4){
             $grouperesult = "Fondateur";
             $_SESSION['groupid'] = $grouperesult;
         }

         if($grouperesult ==5){
             $grouperesult = "Bot";
             $_SESSION['groupid'] = $grouperesult;
         }
}
          $Session->setFlash('SUCCESS: Update effectué avec succès !', 'idsuccess');
          header('location: ../site/profiluser.php');
?>
