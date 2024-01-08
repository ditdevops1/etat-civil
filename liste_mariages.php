<?php
include 'db.php';
include 'menu.php'; 
// On récupère tout le contenu de la table eleve
$reponse = $db->query("SELECT * FROM mariage ");

?>

<style>
    tr:hover {
        background-color: whitesmoke;
        cursor: pointer;

        font-weight: 600;
    }

    tr {
        color: black;
    }
</style>


<!-- Ajouter un élève -->
<div class="modal fade" id="inscription" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 400px;">
            <div class="modal-header bg-gray-200">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un acte de mariage </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="form_eleve.php" method="post">
                    <div class="form-row">
                    <div class="col">
                            <input type="text" name="nom" class="form-control" placeholder="Nom">
                            <input type="text" name="prenom" class="form-control" placeholder="Prénom">
                            <input type="text" name="tel" class="form-control" placeholder="Téléphone">
                            <input type="text" name="age" class="form-control" placeholder="Age">
                            <input type="text" name="age" class="form-control" placeholder="Type de permis">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                <input type="submit" name="submit" value="Valider" class="btn btn-success" />
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Begin Page Content -->
<div class="container-fluid">



    <!-- Page Heading -->
    <div class="d-sm-flex justify-content-between mb-4 ml-3">
        <button id="inscription" class="btn btn-success shadow" data-toggle="modal" data-target="#inscription">Ajouter un acte mariage</button>
        <h1 class="h3 mb-0 text-gray-700">Liste des actes de mariages</h1>
        <i class="fas fa-users fa-2x text-gray-500"></i>

    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="background-color:gainsboro;color:black">
                        <tr>
                            <th>Nom homme</th>
                            <th>Prenom Homme </th>
                            <th>Extrait Homme</th>
                            <th>Nom Femme</th>
                            <th>Prenom Femme </th>
                            <th>Extrait Femme</th>
                            <th>Opérations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            // On affiche chaque entrée une à une
                            while ($donnees = $reponse->fetch()) {
                            ?>
                                
                        </tr>
                        

                    <?php
                            }

                            $reponse->closeCursor(); // Termine le traitement de la requête

                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2022</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<script src="vendor/sweetalert.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</body>

</html>