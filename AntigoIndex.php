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
  <link rel="stylesheet" href="assets/css/index.css">
  <!-- END -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="table-box">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            BUSCAR
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body d-flex justify-content-between">
                            <form action="" class='d-flex'>
                                <input class="form-control passport" type="text"
                                placeholder='Passaporte'>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01">
                                        <option value="2" selected>Situação</option>
                                        <option value="1">Entregue</option>
                                        <option value="2">Pendente</option>
                                    </select>
                                </div>
                                <input class="btn btn-outline-dark" type="submit" value="BUSCAR">
                            </form>
                            <a href="gerenciar.php">
                                <button type="button" class="btn btn-outline config">
                                    <img src="assets/img/config.svg" alt="">
                                </button>
                            </a>
                        </div>
                </div>
            </div>
            <div class="member-list d-flex justify-content-between">
                <div class="member-info d-flex justify-content-between">
                    <div class="name d-flex align-items-center">
                        Adrian Knapp
                    </div>
                    <div class="member-pass d-flex align-items-center">
                        15211
                    </div>
                </div>
                <button class="btn btn-outline-dark d-flex align-items-center justify-content-between" data-bs-toggle="modal" data-bs-target="#confirmarEntrega">
                    Concluir
                </button>
            </div>

            <!-- <div class="member-list d-flex justify-content-between">
                <div class="member-info d-flex justify-content-between">
                    <div class="name d-flex align-items-center">
                        Adrian Knapp
                    </div>
                    <div class="member-pass d-flex align-items-center">
                        15211
                    </div>
                </div>
                <div class="btn-entregue">
                    ENTREGOU
                </div>
            </div> -->
            
            <div class="member-list entregue d-flex justify-content-between">
                <div class="member-info d-flex justify-content-between">
                    <div class="name d-flex align-items-center">
                        Adrian Knapp
                    </div>
                    <div class="member-pass d-flex align-items-center">
                        15211
                    </div>
                </div>
                <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#resetarEntrega">
                    ENTREGOU
                </button>
            </div>
        </div>
    </div>
  






    <!-- Modal CONFIRM -->
    <div class="modal fade" id="confirmarEntrega" tabindex="-1" aria-labelledby="confirmarEntrega" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body d-flex justify-content-center">
                    <strong> CONFIRMAR ENTREGA DO FARM </strong>
                </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-primary">
                    CONFIRMAR
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    CANCELAR
                </button>
            </div>
        </div>
        </div>
    </div>

    <!-- Modal CONFIRM -->
    <div class="modal fade" id="resetarEntrega" tabindex="-1" aria-labelledby="resetarEntrega" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body d-flex justify-content-center">
                        <strong> CANCELAR ENTREGA </strong>
                    </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-primary">
                        CANCELAR 
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        VOLTAR
                    </button>
                </div>
            </div>
            </div>
        </div>







  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>