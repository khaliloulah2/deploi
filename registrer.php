<?php
    session_start(); 
  
    include_once "header.php";
    require_once "models/utilisateurBD.php";
if (isset($_POST['btnAjout'])) {
  
    extract($_POST);
    if (addUser($nom, $prenom, $login, $mps,$role)) { //Retourne un booleen OK
        header("location:http://localhost/exam");
    } else {
        echo '<div class="text-white alert alert-danger text-center container mt-2">Erreur lors de l\'enregistrement</div>';
    }
}

 $roles = getAllRole();
?>
<div class="card mt-5 container col-md-5">
    <div class="card-header bg-info text-white text-center">
        <h4>Inscription patient</h4>
    </div>
    <div class="card-body">
                    <form action="" method="post">
                    
                        <div>
                            <label for="" class="h6">Prénom</label>
                            <input type="text" name="prenom" id="" class="form-control">
                        </div>
                        <div>
                            <label for="" class="h6">Nom</label>
                            <input type="text" name="nom" id="" class="form-control">
                        </div>
                        <div>
                            <label for="" class="h6">Login</label>
                            <input type="text" name="login" id="" class="form-control">
                        </div>
                        <div>
                            <label for="" class="h6">Mot de pass</label>
                            <input type="password" name="mps" id="" class="form-control">
                        </div>
                        <div>
                            <label for="" class="h6">statut</label>
                            <select  class="form-control" name="role">
                                <?php foreach ($roles as $c) :?>
                                <option value="<?= $c['id'] ?>"><?= $c['libelle'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="float-right">
                            <button class="btn btn-info mt-2 btn-sm" name="btnAjout">Enregistrer</button>
                        </div>
                     </form>
                </div>
            </div>
        

        