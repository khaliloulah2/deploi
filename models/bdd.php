<?php
    $serveur = 'heroku';
    $nomBd = 'clinique';
    $user = 'root';
    $mdp = '';

    try {
        $bdd = new PDO('mysql:host='.$serveur.';dbname='.$nomBd,$user,$mdp,[PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    } catch (PDOException $exception) {
        die("Erreur de connexion à la BD ".$exception->getMessage());
    }
?>
