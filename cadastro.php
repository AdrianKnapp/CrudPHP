<?php
session_start();
require 'config.php';
require 'classes/classes.php';

/* if(isset($_SESSION['logado'])) {
    $usuarios = new Usuarios($pdo);
    $usuarios->setUsuario($_SESSION['logado']);
    header('Location: index.php');
} */
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> DOC | BOOTSTRAP 5</title>

  <!-- BOOTSTRAP 5 BETA -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- END -->

</head>
<body>
    <div class="container cont-login d-flex justify-content-center">
        <div class="box-login w-100 d-flex flex-column align-items-center justify-content-center">
            <h3> CADASTRO </h3>
            <form action="cadastrarUsuario.php" method="post" class="form-login d-flex flex-column align-items-center justify-content-center">
                <?php
                if(isset($_SESSION['emailExistente'])){
                    echo "
                        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Passaporte já cadastrado.
                        <button type='button' class='btn-close btn-close-black' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    ";
                    unset($_SESSION['alertMsg']);
                }
                ?>
                <input class="form-control" name="name" type="text" placeholder="Nome" required>    
                <input class="form-control" name="passport" type="text" placeholder="Passaporte" required>
                <input class="form-control" name="user" type="text" placeholder="Vulgo" required>
                <input class="form-control" type="password" name="pass" id="" placeholder="Senha" required>
                <div class="text-below-inputs d-flex flex-column justify-content-between align-items-center">
                    <a href="login.php">
                        Já tenho uma conta
                    </a>
                </div>
                <input class="btn btn-outline-dark" type="submit" value="LOGIN">
            </form>
        </div>
    </div>
  
















  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>