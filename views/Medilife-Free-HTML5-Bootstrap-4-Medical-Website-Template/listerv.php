<?php
session_start(); 
include_once "C:/wamp64/www/exam/header.php";
require_once "C:/wamp64/www/exam/models/utilisateurBD.php";
 

if (empty($_SESSION)) {
    header("location:http://localhost/exam/");
}
if (isset($_GET['deconnexion'])) {
    session_unset();
    header("location:http://localhost/exam/");
}
if (isset($_GET['role'])) {

    header("location:http://localhost/exam/views/listeRole.php");
}
if (isset($_GET['empid'])) {

    DeleteUser($_GET['empid']);

}

 

$users = getAllUser();
$roles = getAllRole();
$cons=getAllconsultatation();
$prest=getAllprestation();
$rv=getAllrv();


?>



<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">

    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <!-- Title  -->
    <title>Medilife - Health &amp; Medical Template | Home</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">
    <style>
 section{
     padding-top: 200px;
 }
 body {
  font-family: "Roboto", sans-serif; 
  font-size:10px;
}

  }
</style>
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="medilife-load"> </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="h-100 d-md-flex justify-content-between align-items-center">
                            <p>Welcome to <span>Medifile</span> template</p>
                            <p>Opening Hours : Monday to Saturday - 8am to 10pm Contact : <span>+12-823-611-8721</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Header Area -->
        <div class="main-header-area" id="stickyHeader">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 h-100">
                        <div class="main-menu h-100">
                            <nav class="navbar h-100 navbar-expand-lg">
                                <!-- Logo Area  -->
                                
                                <a class="navbar-brand" href="index2.php"><img src="img/core-img/logo.png" alt="Logo"></a>

                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#medilifeMenu" aria-controls="medilifeMenu" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
 
                                <div class="collapse navbar-collapse" id="medilifeMenu">
                                    <!-- Menu Area -->
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active">
                                            
                                            <a class="nav-link" href="index2.php">Home <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="listerv.php">liste des rendez vous</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="sessionprestation.php">liste des prestations</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="sessionpatient.php">liste des consultations</a>
                                        </li>
                                         
                                    </ul>
                                    <!-- Appointment Button -->
     
                                        <a href="?deconnexion" class=" btn btn-danger ">Se déconnecter</a>
                                    </div>                                
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                           
                                    <!-- Appointment Button -->
                                    <div >

                                        <a href="?deconnexion" class=" btn btn-danger ">Se déconnecter</a>
                                    </div>                                
                                    <h3>Bienvenue <?= $_SESSION['prenom'] . ' ' . $_SESSION['nom'] ?></h3>
                                    </header>
<section>
      <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">LISTE DES RENDEZ VOUS</div>
    <?php

    if (sizeof($rv) == 0) {
                    echo '<h5 class="text-primary text-center">Aucun user n\'a été enregistré !</h5>';
                } else { ?>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
  <thead>
    <tr>
       <th>service</th>
      <th>Medecin</th>
      <th>date</th>
      <th>time</th>
      <th>nom</th>
      <th>Tel</th>
      <th>email</th>

       </tr>

  </thead>
  
  <tbody>
    
    <?php foreach ($rv as $c) { ?>
        <?php if ($_SESSION['prenom']==$c['prenom'] ): ?>

                                <tr>
                                <td><?= $c['service'] ?></td>
                                <td><?= $c['nommed'] ?></td>

                                    <td><?= $c['date'] ?></td>
                                    <td><?= $c['time'] ?></td>
                                     <td><?= $c['prenom'] ?><?php echo"  "?> <?= $c['nom'] ?></td>
                                     <td><?= $c['number'] ?></td>
                                     <td><?= $c['email'] ?></td>


 
                              </tr>
                              <?php endif ?>

    <?php } ?>

    <tbody>
  </table>
                <?php  } ?>
                </div></div>
                <section>

    <footer class="footer ">

<!-- Bottom Footer Area -->
<div class="bottom-footer-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="bottom-footer-content">
                    <!-- Copywrite Text -->
                    <div class="copywrite-text">
                         <p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>              </div>
                </div>
            </div>
        </div>
    </div>
</div>
</footer>
<!-- ***** Footer Area End ***** -->

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="js/plugins.js"></script>
<!-- Active js -->
<script src="js/active.js"></script>

</body>


</html>

                <script>
$(document).ready(function(){
$('.delete_user').click(function(e){
e.preventDefault();
var empid = $(this).attr('data-emp-id');
var parent = $(this).parent("td").parent("tr");
bootbox.dialog({
message: "Are you sure you want to Delete ?"+empid,
title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
buttons: {
success: {
label: "Non",
className: "btn-success",
callback: function() {
$('.bootbox').modal('hide');
}
},
danger: {
label: "Supprimer",
className: "btn-danger",
callback: function() {
$.ajax({
type: 'GET',
url: 'http://localhost/exam/views/Medilife-Free-HTML5-Bootstrap-4-Medical-Website-Template/sessionpatient.php',
data: 'empid='+empid
})
.done(function(response){

parent.fadeOut('slow');
})
.fail(function(){
bootbox.alert('Error....');
})
}
}
}
});
});
});
</script>



 
  