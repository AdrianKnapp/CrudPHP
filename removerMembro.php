<?php
session_start();
require 'config.php';

if(isset($_POST['passport'])) {
    $passport = addslashes($_POST['passport']);
    $sql = "SELECT passport FROM usuarios WHERE passport = $passport";
    $sql = $pdo->query($sql);
   /*  print_r($sql);
    var_dump($sql); */
    if($sql->rowCount() > 0) {
        $sql = "UPDATE usuarios SET availability = 0 WHERE passport = $passport";
        $sql = $pdo->query($sql);
        $_SESSION['membroRemovido'] = '';
        /* print_r($sql);
        var_dump($sql); */
        header("location: ./");
        } else {
            $_SESSION['PassaporteInexistente'] = "";
            header("location: ./"); 
        }
} else {
    header("location: ./"); 
}
?>