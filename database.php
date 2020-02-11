<?php

    $hote ='localhost';
    $user = 'root';
    $mdp = '';
    $bdd ='phenecie';

    try {
        $co_bdd = 'mysql:host='.$hote.';dbname='.$bdd.'';
        $params = array(
            PDO::ATTR_PERSISTENT => true,                 // Connexions persistantes
        );
        $pdo = new PDO($co_bdd, $user, $mdp, $params); // instancie la connexion
    }
    catch(PDOException $e) {
        $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
        die($msg);
    }
    ?>