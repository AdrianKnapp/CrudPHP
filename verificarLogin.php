<?php
session_start();
require 'config.php';
require 'classes/classes.php';

if(isset($_POST['user']) && !empty($_POST['user'])) {
  $loginUser = addslashes($_POST['user']);
  $loginPass = md5($_POST['pass']);
  $usuarios = new Usuarios($pdo);

  if($usuarios->fazerLogin($loginUser, $loginPass)) {

    /* if(!empty($_GET['page'])){
      $page = $_GET['page'];
      header("Location: $page"); 
    } else {
      header("Location: gerenciar"); 
    } */
    header("Location: ../cali"); 
    exit;

  } else {
    $_SESSION['alertMsg'] = "";
    header("Location: ../cali");
      exit;
  }
}
?>
