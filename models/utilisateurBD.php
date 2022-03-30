<?php
    require_once 'bdd.php';
    function findUser($login, $mdp){
        // Créer la chaine de la requête
    
        $sql = "SELECT  u.code, u.prenom, u.nom,u.login,r.libelle as rl FROM patient u,role r WHERE u.motPass = '$mdp' AND u.login= '$login' and  u.idrole=r.id ";
        // Recupérer la variable $bdd se trouvant dans le fichier bdd.php et contenant la liaison à la BD pour nous permettre d'exécuter toutes les requêtes d'insert, d'update, de delete, select , ...
  
        global $bdd;

        //On utilise la fonction query pour exécuter la requête SELECT
        $exec = $bdd->query($sql);

     
   
        //Retourner le résultat de notre requete SELECT sous forme d'un tableau contenant qu'une seule ligne
        //Etant donné que cette requête renverra au plus qu'une seule ligne donc il faudra utiliser fetch pour la recupération du tableau
        return $exec->fetch(); // ['idUser' => 1, 'nomUser' => 'test'] 
        
    }
   
    function findUser1($login, $mdp){
        // Créer la chaine de la requête
    
        $sql = " SELECT u.id,u.nom,u.login,r.libelle as rl FROM medecin u,role r WHERE u.motPass = '$mdp' AND u.login= '$login' and  u.idrole=r.id  ";
        // Recupérer la variable $bdd se trouvant dans le fichier bdd.php et contenant la liaison à la BD pour nous permettre d'exécuter toutes les requêtes d'insert, d'update, de delete, select , ...
  
        global $bdd;

        //On utilise la fonction query pour exécuter la requête SELECT
        $exec = $bdd->query($sql);

     
   
        //Retourner le résultat de notre requete SELECT sous forme d'un tableau contenant qu'une seule ligne
        //Etant donné que cette requête renverra au plus qu'une seule ligne donc il faudra utiliser fetch pour la recupération du tableau
        return $exec->fetch(); // ['idUser' => 1, 'nomUser' => 'test'] 
    }

    function findsc($login, $mdp){
        // Créer la chaine de la requête
    
        $sql = " SELECT u.id,u.ids,u.login,r.libelle as rl FROM secretaire u,role r WHERE u.motPass = '$mdp' AND u.login= '$login' and  u.idrole=r.id ";
        // Recupérer la variable $bdd se trouvant dans le fichier bdd.php et contenant la liaison à la BD pour nous permettre d'exécuter toutes les requêtes d'insert, d'update, de delete, select , ...
  
        global $bdd;

        //On utilise la fonction query pour exécuter la requête SELECT
        $exec = $bdd->query($sql);

     
   
        //Retourner le résultat de notre requete SELECT sous forme d'un tableau contenant qu'une seule ligne
        //Etant donné que cette requête renverra au plus qu'une seule ligne donc il faudra utiliser fetch pour la recupération du tableau
        return $exec->fetch(); // ['idUser' => 1, 'nomUser' => 'test'] 
        
    }
    function findrp($login, $mdp){
        // Créer la chaine de la requête
    
        $sql = " SELECT u.id,u.idrp,u.login  FROM rp as u WHERE u.motPass = '$mdp' AND u.login= '$login'   ";
        // Recupérer la variable $bdd se trouvant dans le fichier bdd.php et contenant la liaison à la BD pour nous permettre d'exécuter toutes les requêtes d'insert, d'update, de delete, select , ...
  
        global $bdd;

        //On utilise la fonction query pour exécuter la requête SELECT
        $exec = $bdd->query($sql);

     
   
        //Retourner le résultat de notre requete SELECT sous forme d'un tableau contenant qu'une seule ligne
        //Etant donné que cette requête renverra au plus qu'une seule ligne donc il faudra utiliser fetch pour la recupération du tableau
        return $exec->fetch(); // ['idUser' => 1, 'nomUser' => 'test'] 
        
    }
    function addUser($nom, $prenom, $login, $pwd,$idrole){
        $req = "INSERT INTO patient (nom,prenom,login,motPass,idrole) VALUES ('$nom','$prenom','$login','$pwd',$idrole)";
        global $bdd;

        return $bdd->exec($req);
    }
    

    function getlistepatient(){
        $req = "SELECT p.prenom,p.nom,m.nom as mp from consultation c,patient as p,medecin as m where c.idp=p.code and c.idm=m.id ";
        global $bdd;

        return $bdd->query($req)->fetchAll();
    }   
  


    function getAllUser(){
        $req = "SELECT u.code, u.prenom, u.nom,u.login,r.libelle as rl FROM patient u,role r where u.idrole=r.id  ";
        global $bdd;

        return $bdd->query($req)->fetchAll();
    }   
    function getservice(){
        $req = "SELECT * from service  ";
        global $bdd;

        return $bdd->query($req)->fetchAll();
    }  
    function getmedecin(){
        $req = "SELECT nom from medecin  ";
        global $bdd;

        return $bdd->query($req)->fetchAll();
    }  
    function getAllUser1(){
        $req = " SELECT u.id, u.prenom, u.nom,u.login,r.libelle as rl FROM medecin u,role r where u.idrole=r.id";
        global $bdd;

        return $bdd->query($req)->fetchAll();
    }   

    function addrv($service, $nommed, $date, $time,$nom,$prenom,$number,$email){
        $req = "INSERT INTO rv(service, nommed, date, time,nom,prenom,number,email) VALUES ('$service', '$nommed', '$date', '$time','$nom','$prenom','$number','$email')";
        global $bdd;

        return $bdd->exec($req);
    }
      

    function getAllconsultatation(){
        $req = " SELECT c.date,c.temperature,c.tension,m.nom as mnom,m.specialite,p.prenom,p.nom FROM consultation as c,patient as p,medecin as m where c.idp=p.code and c.idm=m.id;";
        global $bdd;

        return $bdd->query($req)->fetchAll();
    }   
  
    function getAlldsc(){
        $req = " SELECT c.date,c.temperature,c.tension,m.nom as mnom,m.specialite,p.prenom,p.nom FROM consultation c,patient as p,medecin as m   where c.idp=m.id and  c.idm=p.code ";
        global $bdd;

        return $bdd->query($req)->fetchAll();
    }  
    function getAlldsp(){
        $req = " SELECT c.date,c.libelle,p.prenom,p.nom FROM prestation c,patient as p   where c.idp=p.code  ";
        global $bdd;

        return $bdd->query($req)->fetchAll();
    }   
    function getAllprestation(){
        $req = " SELECT c.date,c.libelle,p.prenom,p.nom FROM prestation c,patient as p   where c.idp=p.code  ";
        global $bdd;

        return $bdd->query($req)->fetchAll();
    }   
    function getAllrv(){
        $req = " SELECT * FROM rv where statut=0 ";
        global $bdd;

        return $bdd->query($req)->fetchAll();
    }   

    function getpresm(){
        $req = " SELECT count(*) FROM medecin where pres=DAYOFWEEK(NOW())";
        global $bdd;

        return $bdd->query($req)->fetchAll();
    }   
    function getjc(){
        $req = " SELECT p.nom,p.prenom,m.nom as np,c.date  FROM consultation as c,patient as p,medecin as m where (c.idm=m.id and c.idp=p.code) and DAYOFWEEK(c.date)=DAYOFWEEK(NOW())";
        global $bdd;

        return $bdd->query($req)->fetchAll();
    }   
    function getprest(){
        $req = " SELECT libelle FROM prestation where DAYOFWEEK(date)=DAYOFWEEK(NOW())";
        global $bdd;

        return $bdd->query($req)->fetchAll();
    }   

    function DeleteUser($date){
        $req = "DELETE from user where date=$date";
        global $bdd;

        return $bdd->exec($req);
    }
        
    function addRole($libelle){
        $req = "INSERT INTO role(libelle) VALUES ('$libelle')";
        global $bdd;

        return $bdd->exec($req);
    }

    function getAllRole(){
        $req = "SELECT * FROM role ";
        global $bdd;

        return $bdd->query($req)->fetchAll();
    }   
    

?>