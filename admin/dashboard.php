<?php
    session_start();

    if(isset($_SESSION['account'])){
        if(!$_SESSION['account']['is_staff']){
            header('location: ../account/login.php');
        }
    }else{
        header('location: ../account/login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../vendor/bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor//bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../vendor/datatable-2.1.8/datatables.min.css" >
    <link rel="stylesheet" href="../css/style.css">
</head>
<body id="dashboard">
    <div class="wrapper">
        <div class="navbar-custom">
            <header class="px-1 shadow-sm">
                <div class="container-fluid d-flex justify-content-between">
                    <button class="btn btn-toggle">
                        <i class="bi bi-list"></i>
                    </button>
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-end">
                        <div class="dropdown text-end">
                            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/jdcbdev.png" alt="mdo" width="32" height="32" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../account/logout.php">Sign out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <div class="sidebar flex-column flex-shrink-0">
            <a href="/" class="logo">
                <img class="img-fluid" src="../img/logo1.png" alt="" srcset="">
            </a>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="side-nav-title">Home</li>
                <li class="nav-item">
                    <a href="view-dashboard" id="dashboard-link" class="nav-link">
                        <i class="bi bi-speedometer2"></i>
                        <span class="fs-6 ms-2">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-cart"></i>
                        <span class="fs-6 ms-2">Orders</span>
                    </a>
                </li>
                <li class="side-nav-title">Reports</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-graph-up"></i>
                        <span class="fs-6 ms-2">Sales</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-file-earmark-bar-graph"></i>
                        <span class="fs-6 ms-2">Reports</span>
                    </a>
                </li>
                <li class="side-nav-title">Settings</li>
                <li class="nav-item">
                    <a href="view-products" id="products-link" class="nav-link">
                        <i class="bi bi-box"></i>
                        <span class="fs-6 ms-2">Product</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-people"></i>
                        <span class="fs-6 ms-2">Accounts</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="content-page px-3">
            <!-- dynamic content here -->
        </div>
    </div>
    <script src="../vendor/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jQuery-3.7.1/jquery-3.7.1.min.js"></script>
    <script src="../vendor/chartjs-4.4.5/chart.js"></script>
    <script src="../vendor/datatable-2.1.8/datatables.min.js"></script>
    <script src="../js/admin.js"></script>
    <script src="../js/product.js"></script>
</body>
</html>