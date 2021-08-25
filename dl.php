<?php
session_start();
require 'config.php';
require 'classes/classes.php';

if(!isset($_SESSION['logado'])) {
  header("Location: login");
  exit;
}
$usuarios = new Usuarios($pdo);
$usuarios->setUsuario($_SESSION['logado']);
unset($_SESSION['logado']);
header('Location: login');
?>