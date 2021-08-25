<?php
session_start();
require 'config.php';
require 'classes/classes.php';

if(
  isset($_POST['name']) && !empty($_POST['name'])
  &&
  isset($_POST['passport']) && !empty($_POST['passport'])
  &&
  isset($_POST['user']) && !empty($_POST['user'])
  &&
  isset($_POST['password']) && !empty($_POST['password'])
  ) {

  $name = addslashes($_POST['name']);
  $passport = addslashes($_POST['passport']);
  $user = addslashes($_POST['user']);
  $password = md5($_POST['password']);
  


  $verificarSeExistePassaporte = "SELECT passport FROM usuarios WHERE passport = $passport";
  $verificarSeExisteEmail = $pdo->query($verificarSeExisteEmail);

  if($verificarSeExisteEmail->rowCount() > 0){
    $_SESSION['emailExistente'] = "";
    header('Location: cali.php');
    exit;
  }
  
  $usuarios = new Usuarios($pdo);
  $usuarios->cadastrarUsuario($name, $passport, $user, $password);

} else {
  
}

?>