<?php
session_start(); 
include_once "../header.php";
require_once "../models/utilisateurBD.php";

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
?>



<div class="container mt-2">
    
        <a href="?deconnexion" class=" btn btn-danger ">Se déconnecter</a>
    </div>