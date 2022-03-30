<?php
require_once 'bdd.php';
$req = "SELECT * FROM role ";
global $bdd;

$res= $bdd->query($req)->fetchAll();
$employeeData = array();
foreach ($res as $c) { 
        $c["Modifier"]='<a href="" class="btn btn-sm btn-warning">Modifier</a>';
        $c["Supprimer"]='<a href="" class="btn btn-sm btn-warning">Supprimer</a>';
        $employeeData[] = $c;
} 
 echo json_encode($employeeData);

?>