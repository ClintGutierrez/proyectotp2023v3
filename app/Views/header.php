<?php

    $user_session = session();

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Minimarket Magdalena</title>

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url();?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>/css/style.css" rel="stylesheet">

    <link href="<?php echo base_url();?>/js/jquery-ui/jquery-ui.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url();?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- jquery -->
    <!-- <script src="<?php #echo base_url(); ?>/js/all.min.js"></script> -->
    <!-- <script src="<?php #echo base_url(); ?>/vendor/jquery/jquery.min.js"></script>  -->
    <!-- <script src="<?php #echo base_url(); ?>/js/jquery-ui/external/jquery/jquery.js"></script> -->
    <script src="<?php echo base_url(); ?>/js/jquery-ui/external/jquery/jquery.js"></script>
    <script src="<?php echo base_url(); ?>/js/jquery-ui/jquery-ui.min.js"></script>

</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                
                <div class="sidebar-brand-text mx-3"><img src="<?php echo base_url();?>/img/logo.png" alt="" width="100%" ></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>/inicio">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Principal</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Operaciones
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-bars"></i>
                    <span>Categorías</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Categorías</h6>
                        <a class="collapse-item" href="<?php echo base_url();?>/categorias">Gestionar Categoria</a>
                        <a class="collapse-item" href="<?php echo base_url();?>/unidades">Gestionar Unidades</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsethree"
                    aria-expanded="true" aria-controls="collapsethree">
                    <i class="fa fa-shopping-basket"></i>
                    <span>Ventas</span>
                </a>
                <div id="collapsethree" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestionar Ventas</h6>
                        <a class="collapse-item" href="<?php echo base_url();?>/ventas/venta">Ventas</a>
                        <a class="collapse-item" href="listar_ventas.php">Listar boletas</a>
                    </div>
                </div>
            </li>

             <!-- Nav Item - Utilities Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefour"
                    aria-expanded="true" aria-controls="collapsefour">
                    <i class="fa fa-cash-register"></i>
                    <span>Compras</span>
                </a>
                <div id="collapsefour" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestionar productos</h6>
                        <a class="collapse-item" href="<?php echo base_url();?>/productos">Productos</a>
                        <a class="collapse-item" href="<?php echo base_url();?>/compras/nuevo">Nueva Compra</a>
                        <a class="collapse-item" href="<?php echo base_url();?>/compras">Compras</a>
                    </div>
                </div>
            </li>
            

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsesix"
                    aria-expanded="true" aria-controls="collapsesix">
                    <i class="fa fa-users"></i>
                    <span>Clientes</span>
                </a>
                <div id="collapsesix" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Clientes</h6>
                        <a class="collapse-item" href="<?php echo base_url();?>/clientes">Frecuentes</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSeven"
                    aria-expanded="true" aria-controls="collapseSeven">
                    <i class="fa fa-tools"></i>
                    <span>Administración</span>
                </a>
                <div id="collapseSeven" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Categorías</h6>
                        <a class="collapse-item" href="<?php echo base_url();?>/configuracion">Configuración</a>
                        <a class="collapse-item" href="<?php echo base_url();?>/usuarios">Usuarios</a>
                    </div>
                </div>
            </li>

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
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user_session->nombre; ?></span>
                                <img class="img-profile rounded-circle" src="<?php echo base_url();?>/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url();?>usuarios/logout" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesion
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->