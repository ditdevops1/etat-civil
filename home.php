<?php
include 'db.php';
if (!$_SESSION['admin']) {
    header('location:index.php');}
    include 'menu.php';
$reponse2 = $db->query("SELECT * FROM nouveau_ne ORDER  BY id DESC LIMIT 5");
    
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex justify-content-between mb-4">
        <i class="fas fa-fw fa-tachometer-alt fa-2x"></i>
        <h1 class="h3 mb-0 text-gray-700">Commune de Rufisque-est | Gestion Etats Civil</h1>
        <a href="home.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-at fa-sm text-white-50"></i> Actualisé</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Liste des élèves  -->
        <div class="col-xl-4 col-md-6 mb-4">
            <a href="liste_naissances.php">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                    Actes de naissances 
                                </div>  
                                    <?php 
                                       include "code";
                                        $query = "SELECT id FROM nouveau_ne ORDER BY id";  
                                        $query_run = mysqli_query($connection, $query);
                                        $row = mysqli_num_rows($query_run);
                                        echo "<h4 class='text-gray-600'>".$row; ?>                          
                                </div>
                            <div class="col-auto">
                                <i class="fa fa-user fa-3x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!--Liste des professeurs -->
        <div class="col-xl-4 col-md-6 mb-4">
            <a href="liste_mariages.php">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                    Actes de mariages
                                </div>
                                <?php 
                                       include "code";
                                    $query = "SELECT id FROM mariage  ORDER BY id";  
                                    $query_run = mysqli_query($connection, $query);
                                    $row = mysqli_num_rows($query_run);
                                    echo "<h4 class='text-gray-600'>".$row; ?>  
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-3x text-gray-500 "></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Liste des classes -->
        <div class="col-xl-4 col-md-6 mb-4">
            <a href="liste_deces.php">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                    Actes de décés
                                     
                                </div>
                                <?php 
                                       include "code";
                                    $query = "SELECT id FROM deces  ORDER BY id";  
                                    $query_run = mysqli_query($connection, $query);
                                    $row = mysqli_num_rows($query_run);
                                    echo "<h4 class='text-gray-600'>".$row; ?> 
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-user-times fa-3x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Liste des élèves  -->
        <div class="col-xl-12 col-md-12 mb-2">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                   Liste des 5 derniers actes de naissances
                                </div>
                                   <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="background-color:gainsboro;color:black">
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Date de naissance</th>
                            <th>Lieu de Naissance</th>
                            <th>Numéro d'extrait</th>
                            <th>Opérations</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <?php
                            // On affiche chaque entrée une à une
                            while ($donnees = $reponse2->fetch()) {
                            ?>
                                <td><?php echo $donnees['prenom_nouvne']; ?></td>
                                <td><?php echo $donnees['nom_nouvne']; ?></td>
                                <td><?php echo $donnees['annee_naisse']; ?></td>
                                <td><?php echo $donnees['lieu_naisse']; ?></td>
                                <td><?php echo $donnees['id']; ?></td>
                                <td style="display:flex">
                                    <?php
                                    echo "
                                                <form action='details.php' method='post'>
                                                         <input type='hidden' name='id' value='" . $donnees['id'] . "' />
                                                         <input type='hidden' name='prenom_nouvne' value='" . $donnees['prenom_nouvne'] . "' />
                                                         <button style='border:none; background:none;' type='submit'>
                                                         <i class='fas fa-eye'  type='button'></i></button>
                                                        </form>
                                                        
                                                        <form action='updperso.php' method='post'>
                                                        <input type='hidden' name='id' value='" . $donnees['id'] . "' />
                                                        <input type='hidden' name='prenom_nouvne' value='" . $donnees['prenom_nouvne'] . "' />
                                                         <button style='border:none; background:none;' type='submit'>
                                                         <i class='fas fa-edit'  type='button'></i></button>
                                                        </form>
                                                        ";
                                    ?>
                                    <button style='border:none; background:none;' onclick="maFonction()">
                                        <i class='fas fa-ban' type='button'></i></button>



                                </td>
                        </tr>
                        <script>
                            function maFonction() {
                                if (confirm("Voulez vous faire cette suppression?")) {
                                    window.location.replace("sup_naiss.php?id=<?php echo $donnees['id']; ?>");
                                }
                            }
                        </script>
                    <?php
                            }

                            $reponse2->closeCursor();

                    ?>
                    </tbody>
                </table>
            </div>
        </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-female fa-3x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!--Liste des professeurs -->
        <div class="col-xl-12 col-md-12 mb-2">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                Liste des 5 derniers actes de mariages
                                </div>
                                 
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-male fa-3x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!--Liste des professeurs -->
        <div class="col-xl-12 col-md-12 mb-2">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                Liste des 5 derniers actes de décés
                                </div>
                                 
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-male fa-3x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

    </div>

    <!-- Content Row -->



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Chérifwebdesigner @ 2022</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->


<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>