<?php 	
require_once("../conexao.php");
// VERIFICAÇOES PARA O LOGIN
@session_start();
if(!isset($_SESSION['nome_usuario']) || $_SESSION['nivel_usuario'] != 'admin' ){
	header("location:../index.php");
}

$notificacoes = 3;


    //variaveis para o menu
    $item1 = 'home';
    $item2 = 'medicos';
    $item3 = 'func';
    $item4 = 'usuarios';
    $item5 = 'notificacoes';
      

 ?>



<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Hugo Vasconcelos">

        <title>Painel Administrativo</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Custom fonts for this template-->
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">

        <!-- Custom styles for this template-->
        <link href="../css/sb-admin-2.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        
        <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">


        <!-- Bootstrap core JavaScript-->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        
         <link rel="shortcut icon" href="../../img/favicon0.ico" type="image/x-icon">
    <link rel="icon" href="../../img/favicon0.ico" type="image/x-icon">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-info alert  sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">

                    <div class="sidebar-brand-text mx-3">Administrador</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">



                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                



               

               

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php?acao=<?php echo $item1 ?>">
                    <i class="fa-sharp fa-solid fa-house"></i>
                        <span>Home</span></a>
                </li>
                <hr class="sidebar-divider">

                <li class="nav-item">
                    <a class="nav-link" href="index.php?acao=<?php echo $item2 ?>">
                    <i class="fa-solid fa-user-doctor"></i>
                        <span>Cadastro de Médicos</span></a>
                </li>
                <hr class="sidebar-divider">

                <li class="nav-item">
                    <a class="nav-link" href="index.php?acao=<?php echo $item3 ?>">
                    <i class="fa-sharp fa-solid fa-users"></i>
                        <span>Cadastro de Funcionários</span></a>
                </li>
                <hr class="sidebar-divider">

                <li class="nav-item">
                    <a class="nav-link" href="index.php?acao=<?php echo $item4 ?>">
                    <i class="fa-solid fa-user"></i>
                        <span>Cadastro de Usuários</span></a>
                </li>
                <hr class="sidebar-divider">
                
                <?php 	if($notificacoes > 0){ ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?acao=<?php echo $item5 ?>">
                    <i class="fa-solid fa-bell"></i>
                        <span>Notificações</span></a>
                </li>
                <?php 	} ?>

                <!-- Nav Item - Tables -->
              

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                        <img class="mt-2" src="../img/logocab.png" width="150">



                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">



                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nome_usuario']; ?></span>
                                    <img class="img-profile rounded-circle" src="../img/sem-foto.jpg">

                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../logout.php">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i>
                                        Sair
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                       <?php if(@$_GET['acao'] == $item1){
                            include_once($item1.".php"); 
                        }elseif(@$_GET['acao'] == $item2 or isset($_GET[$item2])){
                            include_once($item2.".php"); 
                        }elseif(@$_GET['acao'] == $item3){
                            include_once($item3.".php"); 
                        }elseif(@$_GET['acao'] == $item4 or isset($_GET[$item4])){
                            include_once($item4.".php"); 
                        }elseif(@$_GET['acao'] == $item5){
                                include_once($item5.".php"); 
                        }else{
                            include_once($item1.".php"); 
                        }
                        ?>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->



            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>




        



                        </div>
                        <div class="modal-footer" style="align-items: center;">
                        © 2022 Copyright: CLINMED
                            

                            
                        </div>
                    </form>


                </div>
            </div>
        </div>


        <!-- Core plugin JavaScript-->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../js/demo/chart-area-demo.js"></script>
        <script src="../js/demo/chart-pie-demo.js"></script>

        <!-- Page level plugins -->
        <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../js/demo/datatables-demo.js"></script>

    </body>

</html>



