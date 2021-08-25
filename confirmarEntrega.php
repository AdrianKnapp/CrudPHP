<?php
session_start();
require 'config.php';

if(isset($_GET['passport'])) {
    $passport = addslashes($_GET['passport']);
    $sql = "UPDATE usuarios SET farm = 'Entregue' WHERE passport = $passport";
    $sql = $pdo->query($sql);
    $_SESSION['farmEntregue'] = $passport;
    /* print_r($sql);
    var_dump($sql); */
    header("location: ../cali");
} else {
    header("location: ../cali"); 
}
?>