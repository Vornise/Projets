<?php

    require 'database.php';
    require ('session.class.php');

   $pseudo = htmlentities($_POST['pseudo']);
   $pass = htmlentities($_POST['pass']);

   if (empty($pseudo) || empty($pass))
   {
       header('location:noconnect.php?');
   }
   else
   {
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

       if((password_verify($pass , $passresult)) && $pseudoresult ==$pseudo)
       {
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


          $Session->setFlash('SUCCESS: Vous êtes maintenant en ligne.', 'idsuccess');
           header('location: ../site/index.php');
       }else{
         $Session = new Session();
         $Session->setFlash('Erreur: Pseudo ou mot de passe incorrect.', 'idnull');
        header('location:index.php');
       }
    }
?>
