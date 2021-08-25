<?php
require 'config.php';

if(isset($_GET['reset']) && $_GET['reset'] == 15211) {
    echo 'existe';
    $sql = "UPDATE usuarios SET farm = 'Pendente'";
    $sql = $pdo->query($sql);
    $_SESSION['farmResetado'] = '';
    header("location: ./"); 
} else {
    echo 'n existe!';
}
?>