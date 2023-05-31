<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/all.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="body d-flex">
        <div class="conteiner">
            <div class="offcanvas offcanvas-start sindebar-var " data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title  text-white" id="offcanvasScrollingLabel">SISTEMA DE PEDIDOS</h5>
                    <!-- <a href="#" class=""><img src="public/images/1672901618319.png" alt="" class=""></a> -->
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body">
                    <!-- body  -->
                    <nav class="navbar-dark">
                        <!-- <div class="text-uppercase px-3 fw-bold">Dashboard</div> -->
                        <ul class="navbar-nav">
                            <li>
                                <i class="fa-solid fa-tachometer-alt"></i><a href="<?= BASE_URL ?>Admin/" class="nav-link">Inicio</a>
                            </li>

                            <li class="nav-item  dropdown">
                                <a class="nav-link sindebar-link" href="#Exemplo" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseExamples">
                                    <span><i class="fa-solid fa-tasks"></i>Produtos</span> <span class="right-icon"><i class="fa-solid fa-chevron-left "></i></span></a>
                            </li>

                            <div class="collapse" id="Exemplo">
                                <div class="card card-body">
                                    <ul class="navbar-nav">
                                        <li><i class="fa-solid fa-tasks"></i><a href="<?= BASE_URL ?>Admin/produts" class="nav-link">Gerir Produtos</a></li>
                                        <!-- <li><i class="fa-solid fa-toolbox"></i><a href="<?= BASE_URL ?>Admin/Presencas" class="nav-link">Gerir Entradas</a></li>
                                        <li><i class="fa-solid fa-bell"></i><a href="#" class="nav-link">Gerir Saidas</a> -->
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <li>
                                <i class="fa-solid fa-tags"></i><a href="<?= BASE_URL ?>Admin/categoria" class="nav-link">Categorias</a>
                            </li>
                            <li>
                                <i class="fa-solid fa-hand-holding"></i><a href="<?= BASE_URL ?>Admin/pedidos" class="nav-link">Pedidos</a>
                            </li>
                            
                            <li>
                                <i class="fa-solid fa-users"></i><a href="<?= BASE_URL ?>Admin/cliente" class="nav-link">Clientes</a>
                            </li>

                             
                            
                            <!-- <li class="nav-item  dropdown">
                                <a class="nav-link sindebar-link" href="#collapseExample" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseExamples">
                                    <span><i class="fa-solid fa-list"></i>Relatorios</span> <span class="right-icon"><i class="fa-solid fa-chevron-left "></i></span></a>
                            </li>

                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    <ul class="navbar-nav">
                                        <li><i class="fa-solid fa-toolbox"></i><a href="#" class="nav-link">Stocke Baixo</a></li>
                                        <li><i class="fa-solid fa-bell"></i><a href="#" class="nav-link">Historico Pedidos</a>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                            <p class="text-center text-white"><small>version <?= PHP_VERSION ?></small></p>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container-2">
            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <button class="navbar-toggler mx-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"> <i class="fa-solid   fa-navicon"></i></button>

                    <!-- <a class="navbar-brand me-auto fw-bold " style="color: #ffffff;;" href="#">SHL</a> -->

                    <button class="navbar-toggler dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <!-- <span class="navbar-toggler-icon"></span> -->
                        <i class="fa-solid fa-user-alt "></i>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end " id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <button class="btn   dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-user-alt "></i>
                                </button>
                                <ul class="dropdown-menu dropdown-color dropdown-menu-end ">
                                    <li class="d-flex"><a class="dropdown-item" href="<?= BASE_URL ?>Admin/definicoes">Definicoes <i class="fa-solid fa-gear m-1"></i></a></a></li>
                                    <li class="d-flex"><a class="dropdown-item d-flex  " href="<?= BASE_URL ?>Main/LogOut">Sair <i class="fa-solid fa-arrow-right-from-bracket m-1"></i></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

            </nav>
            <div class="container-fluid" id="card">