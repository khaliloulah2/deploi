<?php
 session_start();

 include_once "header.php";
 require_once "models/utilisateurBD.php";
 
 if (isset($_POST['btnConnect'])) {
     //Extraction des données du tableau $_POST permettant que tous les names du formulaire soient des variables
     extract($_POST);
 
     $patient = findUser($login,$mdp);
 
     if ($patient == null) { //Aucun utilisateur n'existe avec le login et mdp passé en params
         echo '<div class="alert alert-danger text-primary col-md-5 container mt-3">Login ou Mot de Passe incorrect !</div>';
     } else{
        
          $_SESSION['code'] = $patient['code'];
          $_SESSION['role'] = $patient['rl'];
           $_SESSION['login'] = $patient['login'];
          $_SESSION['nom'] = $patient['nom'];
         $_SESSION['prenom'] = $patient['prenom'];
          $_SESSION['libelle'] = $patient['libelle'];

         var_dump($_SESSION);
         //Redirection vers une autre page
         header("location:http://localhost/exam/views/Medilife-Free-HTML5-Bootstrap-4-Medical-Website-Template/index.php");
         
     }
     $medecin = findUser1($login,$mdp);
     
     if ($medecin == null) { //Aucun utilisateur n'existe avec le login et mdp passé en params
        echo '<div class="alert alert-danger text-primary col-md-5 container mt-3">Login ou Mot de Passe incorrect !</div>';
    } else{
       
         $_SESSION['id'] = $medecin['id'];
         $_SESSION['role'] = $medecin['rl'];

        $_SESSION['nommed'] = $medecin['nom'];
         $_SESSION['specialite'] = $medecin['specialite'];
         $_SESSION['min'] ;


 
        var_dump($_SESSION);
        //Redirection vers une autre page
        header("location:http://localhost/exam/views/Medilife-Free-HTML5-Bootstrap-4-Medical-Website-Template/indexm.php");
        
    }
 


    $secretaire= findsc($login,$mdp);

    if ($secretaire == null) { //Aucun utilisateur n'existe avec le login et mdp passé en params
       echo '<div class="alert alert-danger text-primary col-md-5 container mt-3">Login ou Mot de Passe incorrect !</div>';
   } else{
      
        $_SESSION['id'] = $secretaire['id'];
        $_SESSION['ids'] = $secretaire['ids'];
        $_SESSION['login'] = $secretaire['login'];
        $_SESSION['motPass'] = $secretaire['motPass'];
   
   
       $_SESSION['statut'] = $secretaire['statut'];
        
   
   
   
       var_dump($_SESSION);
       //Redirection vers une autre page
       header("location:http://localhost/exam/views/Medilife-Free-HTML5-Bootstrap-4-Medical-Website-Template/sc.php");
       
   }
   $rp= findrp($login,$mdp);

   if ($rp == null) { //Aucun utilisateur n'existe avec le login et mdp passé en params
      echo '<div class="alert alert-danger text-primary col-md-5 container mt-3">Login ou Mot de Passe incorrect !</div>';
  } else{
     
       $_SESSION['id'] = $rp['id'];
       $_SESSION['idrp'] = $rp['idp'];
       $_SESSION['login'] = $rp['login'];
       $_SESSION['motPass'] = $rp['motPass'];
  
  
        
  
  
  
      var_dump($_SESSION);
      //Redirection vers une autre page
      header("location:http://localhost/exam/views/Medilife-Free-HTML5-Bootstrap-4-Medical-Website-Template/rp.php");
      
  }


}

$roles = getAllRole();
 ?>



<div class="card mt-5 container col-md-5">
    <div class="card-header bg-info text-white text-center">
        <h4>AUTHENTIFICATION</h4>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div>
                <label for="" class="h6">Nom d'utilisateur</label>
                <input type="text" name="login" id="" class="form-control">
            </div>
            <div>
                <label for="" class="h6">Mot de Passe</label>
                <input type="password" name="mdp" id="" class="form-control">
            </div>
          
            <div class="float-right">
                <button class="btn btn-info mt-2 btn-lg" name="btnConnect">Se Connecter</button>
                <p class="box-register">Vous êtes un nouveau patient ici? <a href="registrer.php">Inscrivez-vous</a></p>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
            </div>
        </form>
    </div>
</div>
<?php } ?>


