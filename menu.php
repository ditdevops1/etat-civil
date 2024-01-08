
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Rufisque-est | Etat-civil</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .fa-eye,
        .fa-edit,
        .fa-ban {
            background: rgb(26, 131, 236);
            padding: 5px;
            color: white;
            border-radius: 4px;
        }

        .fa-edit {
            background: rgb(255, 166, 0);
        }

        .fa-ban {
            background: rgb(231, 7, 7);
        }

        input {
            margin-bottom: 5px;
        }

        th {
            font-weight: 900;
        }

        a:hover {
            text-decoration: none;
        }

        label {
            margin-left: 10px;
            ;
        }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-address-card" aria-hidden="true"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Etat-civil</div>
            </a>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider p-0 m-0 d-none d-md-block">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="home.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tableau de Bord</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider p-0 m-0">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="liste_naissances.php" >
                <i class="fa fa-user"></i>
                    <span>Acte de Naissance </span> <i class="fas fa-angle-right "></i>
                </a>
                
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider p-0 m-0">

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="liste_mariages.php" >
                    <i class="fa fa-user-plus"></i>
                    <span>Acte de mariage</span> <i class="fas fa-angle-right "></i>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider p-0 m-0">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="liste_deces.php">
                    <i class="fa fa-user-times" aria-hidden="true"></i>
                    <span>Acte de décés</span> <i class="fas fa-angle-right "></i>
                </a>
               
            </li>
            <hr class="sidebar-divider p-0 m-0">
            
                    </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    
                    <!-- Topbar Search -->
                    <form action="recherche.php" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" name="mot" required class="form-control bg-light border-0 small" placeholder="Rechercher le prénom du pére ..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" name="rechercher" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><i class="fas fa-circle fa-sm" style="color: green;"> </i> <?php echo $_SESSION['admin']; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                                                <!--<a class="dropdown-item" href="log" data-toggle="modal" data-target="#logoutModal">-->
                                <a class="dropdown-item" href="deconnexion.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Déconnexion
                                </a>
                                
                            </div>
                        </li>

                    </ul>

                </nav>