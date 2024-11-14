<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href='../admin/home'>
            <div class="sidebar-brand-icon rotate-n-0">
                <img src="../assets/img/login0.png" class="image" alt="">
            </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard (Inicio) -->
        <li class="nav-item active">
            <a class="nav-link" href='../admin/home'>
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Inicio</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading - Section Title -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Utilities (Ejemplo de menú colapsable) -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Utilities</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Utilities:</h6>
                    <a class="collapse-item" href="utilities-color.html">Colors</a>
                    <a class="collapse-item" href="utilities-border.html">Borders</a>
                    <a class="collapse-item" href="utilities-animation.html">Animations</a>
                    <a class="collapse-item" href="utilities-other.html">Other</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Area de Trabajo -->
        <li class="nav-item">
            <a class="nav-link collapsed" href='/dashboard/gestion%20de%20ambientes/admin/areaTrabajo'>
                <i class="fas fa-fw fa-cog"></i>
                <span>Area de Trabajo</span>
            </a>
        </li>

        <!-- Nav Item - Gestión de Usuarios -->
        <li class="nav-item">
            <a class="nav-link collapsed" href='/dashboard/gestion%20de%20ambientes/usuarios/usuarios'>
                <i class="fas fa-fw fa-wrench"></i>
                <span>Gestión de Usuarios</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Gestión de Reportes -->
        <li class="nav-item">
            <a class="nav-link" href='/dashboard/gestion%20de%20ambientes/admin/reportes'>
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Gestión de Reportes</span>
            </a>
        </li>

        <!-- Nav Item - Computadores -->
        <li class="nav-item">
            <a class="nav-link" href='/dashboard/gestion%20de%20ambientes/admin/computadores'>
                <i class="fas fa-fw fa-table"></i>
                <span>Computadores</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Nav Item - Proveedores -->
        <li class="nav-item">
            <a class="nav-link" href='/dashboard/gestion%20de%20ambientes/proveedores/proveedores'>
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Proveedores</span>
            </a>
        </li>

        <!-- Nav Item - Productos -->
        <li class="nav-item">
            <a class="nav-link" href='/dashboard/gestion%20de%20ambientes/Producto/listarProductos'>
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Productos</span>
            </a>
        </li>

        <!-- Aquí puedes agregar el nuevo enlace para Clientes -->
         <!-- Nav Item - Clientes -->
        <li class="nav-item">
            <a class="nav-link" href="index.php?url=cliente/listarClientes">
                <i class="fas fa-fw fa-users"></i>
                <span>Clientes</span>
            </a>

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
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Notifications and User Profile Sections -->

                </ul>

            </nav>
            <!-- End of Topbar -->
