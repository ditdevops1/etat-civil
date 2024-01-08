<?php

include 'db.php';
 include 'menu.php';
// On récupère tout le contenu de la table eleve
$reponse = $db->query("SELECT * FROM deces ");

?>

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
</style>

<!-- Ajouter un élève -->
<div class="modal fade" id="ajoutProf" tabindex="-1" role="dialog" aria-labelledby="ajoutProfLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 400px;">
            <div class="modal-header bg-gray-200">
                <h5 class="modal-title" id="ajoutProfLabel">Ajouter un acte de décés</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="insererprof.php" method="post">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" name="nom" class="form-control" placeholder="Nom">
                            <input type="text" name="prenom" class="form-control" placeholder="Prénom">
                            <input type="text" name="tel" class="form-control" placeholder="Téléphone">
                            <input type="text" name="age" class="form-control" placeholder="Age">
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
    <div class="d-sm-flex justify-content-between mb-4 ml-3 mr-3">
        <button class="btn btn-success shadow" data-toggle="modal" data-target="#ajoutProf"> Ajouter un acte de décés</button>
        <h1 class="h3 mb-0 text-gray-700">Liste des actes de décés</h1>
        <i class="fas fa-users fa-2x text-gray-500"></i>

    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="background-color:gainsboro;color:black">
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th>Matière</th>
                            <th>Opérations</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <?php

                            // On affiche chaque entrée une à une
                            while ($donnees = $reponse->fetch()) {
                            ?>
                                <td><?php echo $donnees['nom']; ?></td>
                                <td><?php echo $donnees['prenom']; ?></td>
                                <td><?php echo $donnees['adresse']; ?></td>
                                <td><?php echo $donnees['tel']; ?></td>
                                <td><?php echo $donnees['matiere']; ?></td>
                                <td style="display:flex">
                                    <?php
                                    echo "<!-- Bouton Detail envoie le nom et prenom
                                                        de l'étudiant à la page details.php -->
                                                       <form action='detailsProf.php' method='post'>
                                                         <input type='hidden' name='prenom' value='" . $donnees['prenom'] . "' />
                                                         <input type='hidden' name='nom' value='" . $donnees['nom'] . "' />
                                                         <button style='border:none; background:none;' type='submit'>
                                                         <i class='fas fa-eye'  type='button'></i></button>
                                                        </form>
                                                        
                                                        <form action='updp.php' method='post'>
                                                         <input type='hidden' name='prenom' value='" . $donnees['prenom'] . "' />
                                                         <input type='hidden' name='nom' value='" . $donnees['nom'] . "' />
                                                         <button style='border:none; background:none;' type='submit'>
                                                         <i class='fas fa-edit'  type='button'></i></button>
                                                        </form>
                                                        ";
                                    ?>
                                    <button style='border:none; background:none;' onclick="maFonction()">
                                        <i class='fas fa-ban' type='button'></i></button></a>
                                </td>

                        </tr>
                        <script>
                            function maFonction() {
                                if (confirm("Voulez vous faire cette suppression?")) {
                                    window.location.replace("supprof.php?id=<?php echo $donnees['id']; ?>");
                                }
                            }
                        </script>
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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="ajoutProfLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajoutProfLabel">Ready to Leave?</h5>
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

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</body>

</html>