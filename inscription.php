<?php
require ('database.php');
require ('session.class.php');
        $nom = htmlentities($_POST['nom']);
        $prenom = htmlentities($_POST['prenom']);
        $birthday = htmlentities($_POST['birthday']);
        $sexe = htmlentities($_POST['sexe']);
        $pays = htmlentities($_POST['pays']);
        $pseudo = htmlentities($_POST['pseudo']);
        $email = htmlentities($_POST['email']);
        $pass = htmlentities($_POST['pass']);
        $avatar = htmlentities($_POST['avatar']);

        $verifinsbdd = 0;
        $verifeeexist = 0;


        sleep(1);
        $sql= "SELECT * FROM utilisateurs WHERE pseudo ='$pseudo'";
        try{
            $select = $pdo->prepare($sql);
            $select ->execute();
        }catch (PDOException $e){echo 'Erreur SQL:'.$e->getMessage().'<br/>';die();}
        while($data = $select->fetch())
        {
          $pseudoresult = $data['pseudo'];
        }
        $sql= "SELECT * FROM utilisateurs WHERE email ='$email'";
        try{
            $select = $pdo->prepare($sql);
            $select ->execute();
        }catch (PDOException $e){echo 'Erreur SQL:'.$e->getMessage().'<br/>';die();}
        while($data = $select->fetch())
        {
          $emailresult = $data['email'];
        }
        if($pseudo == $pseudoresult){

          $Session = new Session();
          $Session->setFlash('Erreur: Pseudo déjà existant.', 'idnull');
          header('location: index.php#');
          $verifeeexist= 1;
          die;
        }
        if($email == $emailresult){
          $Session = new Session();
           $Session->setFlash('Erreur: Email déjà existant.', 'idnull');
           header('location: index.php#');
          $verifeeexist= 1;
          die;
        }

        if($verifeeexist == 0){

        if(empty($pseudoresult) || empty($emailresult)){
          $pseudoresult = null;
          $emailresult = null;
        }

        if(htmlentities($_POST['pass_confirm']) != htmlentities($_POST['pass']))
        {
          $Session = new Session();
          $Session->setFlash('Veuillez entrer le même mot de passe.', 'idnull');
          header('location: index.php#');
          die;

        }else{

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


        if(!empty($taille)){
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
             if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)){

               echo 'Upload effectué avec succès !\n';

             }else{ //Sinon (la fonction renvoie FALSE).


               $Session = new Session();
               $Session->setFlash('ERREUR: Echec de l\'upload !', 'idnull');
               header('location: ../site/profiluser.php');
               }
          }
    }else if(empty($taille)){
      $fichier = "avatar.jpg";
    }
               //--------------------------------------------------------------------------------------------------------------------------------------
                   try {
                           $sql = "INSERT INTO utilisateurs (nom, prenom, birthday, sexe, pays, pseudo, pass, email,avatar)
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                           $insert = $pdo->prepare($sql);
                           $insert->execute(array($nom,$prenom,$birthday,$sexe,$pays,$pseudo,password_hash($pass, PASSWORD_DEFAULT),$email, "css/img/upload/avatar/$pseudo/$fichier"));
                           $verifinsbdd = 1;
                               }
                           catch(PDOException $e)
                               {
                               echo $sql . "<br>" . $e->getMessage();


                          }
          if($verifinsbdd == 1){
            //header('location: index.php');
          }
        }}

        ?>
