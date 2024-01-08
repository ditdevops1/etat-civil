<?php
include 'db.php';
include 'menu.php';
// On récupère tout le contenu de la table eleve
$reponse = $db->query("SELECT * FROM nouveau_ne ORDER  BY id DESC");

?>

<style>
    tr:hover {
        background-color: whitesmoke;
        color: black;
        font-weight: 600;
    }

    hr {
        margin-top: -1cm;
    }
</style>

<div class="modal fade" id="ajoutPerso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:750px; margin-left: -3cm;">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="exampleModalLabel">Faire la déclaration d'un nouveau né !</h4>
                <button type="button" style="width: 40px; height: 40px;" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color:whitesmoke;">
                <form class="form" role="form" autocomplete="off" action="insperso.php" method="POST">

                    <div class="form-group row">
                        <div class="form-group col-3">
                            <b>Année de déclaration :</b>
                        </div>
                        <div class="form-group col-3">
                            <select name="annee_dec" required class="form-control">
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <b>Année de naissance : </b>
                        </div>
                        <div class="form-group col-3">
                            <select name="annee_naiss" class="form-control" required size="0">
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                            </select>
                        </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                        <div class="form-group col-3">
                            <b>Mois de naissance : </b>
                        </div>
                        <div class="form-group col-3">
                            <select name="mois_naiss" class="form-control" required size="0">
                                <option value="Janvier">Janvier</option>
                                <option value="Février">Février</option>
                                <option value="Mars">Mars</option>
                                <option value="Avril">Avril</option>
                                <option value="Mai">Mai</option>
                                <option value="Juin">Juin</option>
                                <option value="Juillet">Juillet</option>
                                <option value="Aout">Aout</option>
                                <option value="Septembre">Septembre</option>
                                <option value="Octobre">Octobre</option>
                                <option value="Novembre">Novembre</option>
                                <option value="Décembre">Décembre</option>
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <b>Jour de naissance : </b>
                        </div>
                        <div class="form-group col-3">
                            <select name="jour_naiss" class="form-control" required size="0">
                                <option value="Lundi">Lundi</option>
                                <option value="Mardi">Mardi</option>
                                <option value="Mercredi">Mercredi</option>
                                <option value="Jeudi">Jeudi</option>
                                <option value="Vendredi">Vendredi</option>
                                <option value="Samedi">Samedi</option>
                                <option value="Dimanche">Dimanche</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row form-group">
                        <div class="form-group col-3">
                            <b>Heure de Naissance : </b>
                        </div>
                        <div class="form-group col-3">
                            <input type="text" name="heure_naiss" class="form-control" required placeholder="en lettre">
                        </div>
                        <div class="form-group col-3">
                            <b>Lieu de Naissance : </b>
                        </div>
                        <div class="form-group col-3">
                            <input type="text" placeholder="En majuscule" name="lieu_naiss" class="form-control" required>
                        </div>
                    </div>
                    <hr>
                    <div class="row form-group">
                        <div class="form-group col-3">
                            <b>Sexe du bébé : </b>
                        </div>
                        <div class="form-group col-3">
                            <select name="sexe" class="form-control" required size="0">
                                <option value="Masculin">Masculin</option>
                                <option value="Féminin">Féminin</option>
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <b>Prénom du père : </b>
                        </div>
                        <div class="form-group col-3">
                            <input type="text" placeholder="En majuscule" name="prenom_pere" class="form-control" required>
                        </div>
                    </div>
                    <hr>
                    <div class="row form-group">
                        <div class="form-group col-3">
                            <b>Prénom du bébé : </b>
                        </div>
                        <div class="form-group col-3">
                            <input type="text" placeholder="En majuscule" name="prenom_bb" class="form-control" required>
                        </div>
                        <div class="form-group col-3">
                            <b>Nom du bébé : </b>
                        </div>
                        <div class="form-group col-3">
                            <input type="text" placeholder="En majuscule" name="nom_bb" class="form-control" required>
                        </div>
                    </div>
                    <hr>
                    <div class="row form-group">
                        <div class="form-group col-3">
                            <b>Prénom du maman : </b>
                        </div>
                        <div class="form-group col-3">
                            <input type="text" placeholder="En majuscule" name="prenom_mere" class="form-control" required>
                        </div>
                        <div class="form-group col-3">
                            <b>Nom du maman : </b>
                        </div>
                        <div class="form-group col-3">
                            <input type="text" placeholder="En majuscule" name="nom_mere" class="form-control" required>
                        </div>
                    </div>
                    <hr>
                    <div class="modal-footer justify-content-center">
                        <input type="button" class="btn btn-danger" data-dismiss="modal" class="btn btn-secondary" value="x Annuler">
                        <button class="btn btn-success" type="submit">Valider</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Begin Page Content -->
<div class="container-fluid">



    <!-- Page Heading -->
    <div class="d-sm-flex justify-content-between mb-4 ml-3">
        <button class="btn btn-success shadow" data-toggle="modal" data-target="#ajoutPerso"> Ajouter un acte de naissance</button>
        <h1 class="h3 mb-0 text-gray-700">Liste des actes de naissances</h1>
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
                            while ($donnees = $reponse->fetch()) {
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

                            $reponse->closeCursor();

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