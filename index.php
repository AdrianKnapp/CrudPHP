<?php
session_start();
require 'config.php';
require 'classes/classes.php';
if(!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
  }
$usuarios = new Usuarios($pdo);
$usuarios->setUsuario($_SESSION['logado']);
$searchPeople = "
    SELECT *
    FROM usuarios
    WHERE availability = 1
    ORDER BY passport ASC;
";
$searchPeople = $pdo->query($searchPeople);
if($searchPeople->rowCount() > 0){
    $_SESSION['members'] = '';
} else {
    $_SESSION['alertaAnuncio'] = '';
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />  
    <title>GERENCIAR</title>
      
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



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="main.css">  
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"  type="text/css" href="assets/css/gerenciar.css">
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  </head>
    
  <body> 
    <?php
        require 'loader.php';
    ?>
    <section id='accordion'>
        <div class="container">
            <div data-aos="fade-down" data-aos-delay="50"
    data-aos-duration="600" class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            OPÇÕES DE GERENCIAMENTO
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#adicionarMembro">
                                ADICIONAR MEMBRO
                            </button>
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#remMember">
                                REMOVER MEMBRO
                            </button>
                            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#resetWeek">
                                REINICIAR FARM SEMANAL
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ALERTS -->
    <div class="container">
        <?php
            if(isset($_SESSION['membroAdicionado'])){
                echo "
                    <div data-aos='fade-up'
                    data-aos-anchor-placement='top-bottom' data-aos-delay='50'
                    data-aos-duration='1000' class='alert alert-success alert-dismissible fade show' role='alert'>
                        Usuário adicionado com sucesso.
                        <button type='button' class='btn-close btn-close-black' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                ";
                unset($_SESSION['membroAdicionado']);
            }
            if(isset($_SESSION['membroRemovido'])){
                echo "
                    <div data-aos='fade-up'
                    data-aos-anchor-placement='top-bottom' data-aos-delay='50'
                    data-aos-duration='1000' class='alert alert-success alert-dismissible fade show' role='alert'>
                        Usuário removido com sucesso.
                        <button type='button' class='btn-close btn-close-black' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                ";
                unset($_SESSION['membroRemovido']);
            }
            if(isset($_SESSION['farmResetado'])){
                echo "
                    <div data-aos='fade-up'
                    data-aos-anchor-placement='top-bottom' data-aos-delay='50'
                    data-aos-duration='1000' class='alert alert-success alert-dismissible fade show' role='alert'>
                        Farm resetado com sucesso.
                        <button type='button' class='btn-close btn-close-black' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                ";
                unset($_SESSION['farmResetado']);
            }
            if(isset($_SESSION['userExistente'])){
                echo "
                    <div data-aos='fade-up'
                    data-aos-anchor-placement='top-bottom' data-aos-delay='50'
                    data-aos-duration='1000' class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Passaporte já existe.
                        <button type='button' class='btn-close btn-close-black' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                ";
                unset($_SESSION['userExistente']);
            }
            if(isset($_SESSION['PassaporteInexistente'])){
                echo "
                    <div data-aos='fade-up'
                    data-aos-anchor-placement='top-bottom' data-aos-delay='50'
                    data-aos-duration='1000' class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Passaporte não existe.
                        <button type='button' class='btn-close btn-close-black' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                ";
                unset($_SESSION['PassaporteInexistente']);
            }
            if(isset($_SESSION['dadosInvalidos'])){
                echo "
                    <div data-aos='fade-up'
                    data-aos-anchor-placement='top-bottom' data-aos-delay='50'
                    data-aos-duration='1000' class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Dados inválidos.
                        <button type='button' class='btn-close btn-close-black' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                ";
                unset($_SESSION['dadosInvalidos']);
            }
            if(isset($_SESSION['farmEntregue'])){
                $passport = $_SESSION['farmEntregue'];
                echo "
                    <div data-aos='fade-up'
                    data-aos-anchor-placement='top-bottom' data-aos-delay='50'
                    data-aos-duration='1000' class='alert alert-success alert-dismissible fade show' role='alert'>
                        O ID $passport entregou o semanal.
                        <button type='button' class='btn-close btn-close-black' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                ";
                unset($_SESSION['farmEntregue']);
            }
            if(isset($_SESSION['farmCancelado'])){
                $passport = $_SESSION['farmCancelado'];
                echo "
                    <div data-aos='fade-up'
                    data-aos-anchor-placement='top-bottom' data-aos-delay='50'
                    data-aos-duration='1000' class='alert alert-success alert-dismissible fade show' role='alert'>
                        Farm do ID $passport cancelado com sucesso.
                        <button type='button' class='btn-close btn-close-black' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                ";
                unset($_SESSION['farmCancelado']);
            }
        ?>
    </div>
    <!--Ejemplo tabla con DataTables-->
    <section>
        <div class="container">
            <div>
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table style='text-align: center;' id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Passaporte</th>
                                    <th>Nome</th>
                                    <th>Vulgo</th>                               
                                    <th>Estado</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(isset($_SESSION['members'])){
                                        foreach($searchPeople->fetchAll() as $members):
                                            $membersPassport = $members['passport'];
                                            $membersName = $members['name'];
                                            $membersUser = $members['user'];
                                            $membersType = $members['farm'];
                                            $membersDate = $members['add-date'];

                                            switch($membersType){
                                                case 'Pendente':
                                                    $lineColor = '';
                                                    $buttonCor = 'btn btn-dark';
                                                    $buttonText = 'Concluir';
                                                break;
                                                case 'Entregue':
                                                    $lineColor = '#e1f5e2';
                                                    $buttonCor = 'btn btn-success';
                                                    $buttonText = 'Entregue';
                                                break;
                                            }
                                            echo "
                                                <tr style='background-color: $lineColor;'>
                                                    <td>$membersPassport</td>
                                                    <td>$membersName</td>
                                                    <td>$membersUser</td>                                
                                                    <td>$membersType</td>
                                                    <td>
                                                        <button type='button' class='btn $buttonCor btn-sm' data-bs-toggle='modal' data-bs-target='#modal$membersPassport'>
                                                            $buttonText
                                                        </button>
                                                    </td>
                                                </tr>
                                            ";
                                            /* <!-- Modal --> */
                                            switch($membersType){
                                                case 'Pendente':
                                                    $modalBody = "
                                                        <div class='modal-dialog modal-sm modal-dialog-centered'>
                                                            <div class='modal-content'>
                                                                <div class='modal-body d-flex justify-content-center'>
                                                                    <strong> CONFIRMAR ENTREGA </strong>
                                                                </div>
                                                                <div class='modal-footer d-flex justify-content-between'>
                                                                    <a href='confirmarEntrega.php?passport=$membersPassport'>
                                                                        <button type='button' class='btn btn-primary'>
                                                                            CONFIRMAR
                                                                        </button>
                                                                    </a>
                                                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>
                                                                        CANCELAR
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ";
                                                break;
                                                case 'Entregue':
                                                    $modalBody = "
                                                        <div class='modal-dialog modal-sm modal-dialog-centered'>
                                                            <div class='modal-content'>
                                                                <div class='modal-body d-flex justify-content-center'>
                                                                    <strong> RETIRAR ENTREGA </strong>
                                                                </div>
                                                                <div class='modal-footer d-flex justify-content-between'>
                                                                    <a href='retirarEntrega.php?passport=$membersPassport'>
                                                                        <button type='button' class='btn btn-primary'>
                                                                            CONFIRMAR
                                                                        </button>
                                                                    </a>
                                                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>
                                                                        CANCELAR
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ";
                                                break;
                                            }
                                            echo "
                                            <div class='modal fade' id='modal$membersPassport' tabindex='-1' aria-labelledby='modal$membersPassport' aria-hidden='true'>
                                                $modalBody
                                            </div>
                                            ";
                                        endforeach;
                                    }
                                    if(isset($_SESSION['alertaAnuncio'])){
                                        echo "
                                            <div class='row-center'>
                                                <h2 class='alertaAnuncio'> Não há anúncios. </h2>
                                            </div>
                                        ";
                                    } unset($_SESSION['alertaAnuncio']);
                                ?>     
                            </tbody>  
                        </table>                  
                    </div>
                </div>
            </div>  
        </div>    
    </section>
    
   
    <!-- Modal ADD MEMBER -->
    <div class="modal fade" id="adicionarMembro" tabindex="-1" aria-labelledby="adicionarMembro" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="addMember.php" class='d-flex flex-column form-add-member' id='addMemberForm' method='POST'>
                        <input type="text" class='form-control w-100' onkeypress="return event.charCode >= 48 && event.charCode <= 57" name='passport' placeholder='Passaporte' maxlength="5" >
                        <input type="text" class='form-control w-100'  maxlength="40" name='name' placeholder='Nome' onkeypress="return lettersOnly(event);">
                        <input type="text" class='form-control w-100' maxlength="20" name='user' placeholder='Vulgo' onkeypress="return lettersOnly(event);">
                    </form>
                </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="submit" class="btn btn-primary addMemberButton" form='addMemberForm'>
                    ADICIONAR
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    CANCELAR
                </button>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal REMOV MEMBER -->
    <div class="modal fade" id="remMember" tabindex="-1" aria-labelledby="remMember" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="removerMembro.php" class='d-flex flex-column form-add-member' id='removeMember' method='POST'>
                        <input type="text" class='form-control w-100' name='passport' placeholder='Passaporte' onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength='5' required>
                    </form>
                </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="submit" class="btn btn-primary" form='removeMember'>
                    REMOVER
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    CANCELAR
                </button>
            </div>
        </div>
        </div>
    </div>


    <!-- Modal RESET week -->
    <div class="modal fade" id="resetWeek" tabindex="-1" aria-labelledby="resetWeek" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body d-flex justify-content-center">
                    <strong> CONFIRMAR RESET </strong>
                </div>
            <div class="modal-footer d-flex justify-content-between">
                <a href="resetSemanal.php?reset=15211">
                    <button type="button" class="btn btn-primary">
                        RESETAR
                    </button>
                </a>      
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    CANCELAR
                </button>
            </div>
        </div>
        </div>
    </div>
    <footer>
        Desenvolvido por Adrian Knapp.
    </footer>


    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
     
    <!-- para usar botones en datatables JS -->  
    <script src="datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
     
    <!-- código JS propìo-->    
    <script type="text/javascript" src="main.js"></script>  

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        AOS.init();
    </script>

  </body>
</html>