<?php
session_start();
require 'config.php';
require 'classes/classes.php';

if(isset($_SESSION['logado'])) {
    $usuarios = new Usuarios($pdo);
    $usuarios->setUsuario($_SESSION['logado']);
    header('Location: ../cali');
} 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> LOGIN - CALI </title>

    <!-- ICON -->
    <link rel="apple-touch-icon" sizes="57x57" href="assets/img/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/img/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/img/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/img/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <link rel="manifest" href="assets/img/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/img/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">



  <!-- BOOTSTRAP 5 BETA -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
  <!-- END -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
    <?php
        require 'loader.php';
    ?>
    <div class="container cont-login d-flex justify-content-center" >
        <div data-aos="fade-right" data-aos-delay="50"
    data-aos-duration="1000" class="box-login w-100 d-flex flex-column align-items-center justify-content-center">
            <h3> FAZER LOGIN </h3>
            <form action="verificarLogin.php" method="post" class="form-login d-flex flex-column align-items-center justify-content-center">
                <?php
                if(isset($_SESSION['alertMsg'])){
                    echo "
                        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Dados incorretos.
                        <button type='button' class='btn-close btn-close-black' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    ";
                    unset($_SESSION['alertMsg']);
                }
                ?>    
                <input class="form-control" name="user" type="text" placeholder="Usuário" required>
                <input class="form-control" type="password" name="pass" id="" placeholder="Senha" required>
                <!-- <div class="text-below-inputs d-flex flex-column justify-content-between align-items-center">
                    <a href="">
                        Esqueci minha senha
                    </a>
                    <a href="cadastro.php">
                        Cadastrar-se
                    </a>
                </div> -->
                <input class="btn btn-outline-dark" type="submit" value="LOGIN">
            </form>
        </div>
    </div>
    <footer>
        Desenvolvido por Adrian Knapp.
    </footer>
















  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>