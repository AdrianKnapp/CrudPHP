<?php
session_start();
require 'config.php';
if(isset($_POST['passport']) && !empty($_POST['passport'])) {
    echo 'existe';
    $passport = addslashes($_POST['passport']);
    if($passport == 0 ){
        header("location: ./"); 
    }
    $name = addslashes($_POST['name']);
    $user = addslashes($_POST['user']);
    $password = '90a4897b4d6e39e8208325fe9765eef415211
    ';
    $sql = "SELECT * FROM usuarios WHERE passport = $passport";
    $sql = $pdo->query($sql);
    echo 'User já existe';
    var_dump($sql);
    if($sql->rowCount() > 0) {
    $_SESSION['userExistente'] = '';
    header("location: ./"); 
    } else {
        $sql = "
            INSERT INTO usuarios
            (
            name,
            passport,
            user,
            password
            )
            VALUES
            (
            '$name',
            $passport,
            '$user',
            '$password'
            )";
            echo 'Membro adicionado.';
            print_r($sql);
            var_dump($sql);
            $sql = $pdo->query($sql);
            $_SESSION['membroAdicionado'] = "";
            header("location: ./"); 
    }
} else {
    $_SESSION['dadosInvalidos'] = '';
    header("location: ./"); 
}
?>