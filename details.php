<?php
include 'db.php';
include 'menu.php';

$info = "";
if ($_POST) {
      if (!empty($_POST['prenom_nouvne']) && !empty($_POST['id'])) {
            $prenom_nouvne = $_POST['prenom_nouvne'];
            $id = $_POST['id'];
            $requete = "SELECT * FROM nouveau_ne WHERE prenom_nouvne = '$prenom_nouvne' AND id = '$id' ";
            $query = $db->prepare($requete);
            $query->execute();
            $row = $query->fetch();
            $info = "<div class='p-3'>
            les informations de : <b>" . $row['prenom_nouvne'] . ' ' . $row['nom_nouvne'] . "<div>";
      }
}

?>

<style>
      hr {
            margin-top: -1cm;
      }
</style>
<!--  demande d'état civil résidents-->

<body>
      <div class="container-fluid mb-4">
            <div class="container mt-3 shadow bg-white-100 ">
                  <div class="text-center">
                        <h3><?php echo $info ?></h3>
                  </div>
                        <div class="row form-group">
                              <div class="form-group col-3">
                                    <b>Numéro extrait : </b>
                              </div>
                              <div class="form-group col-1">
                                    <input type="text" name="id" disabled value="<?php echo  $row["id"] ?>" class="form-control">
                              </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                              <div class="form-group col-3">
                                    <b>Année de déclaration :</b>
                              </div>
                              <div class="form-group col-3">
                                    <select disabled name="annee_dec" required class="form-control">
                                          <option value="<?php echo  $row["annee_dec"] ?>"><?php echo  $row["annee_dec"] ?>
                                    </select>
                              </div>
                              <div class="form-group col-3">
                                    <b>Année de naissance : </b>
                              </div>
                              <div class="form-group col-3">
                                    <select disabled name="annee_naiss" class="form-control" required size="0">
                                          <option value="<?php echo  $row["annee_naisse"] ?>"><?php echo  $row["annee_naisse"] ?>

                                    </select>
                              </div>
                        </div>
                        <hr>

                        <div class="form-group row">
                              <div class="form-group col-3">
                                    <b>Mois de naissance : </b>
                              </div>
                              <div class="form-group col-3">
                                    <select disabled name="mois_naiss" class="form-control" required size="0">
                                          <option value="<?php echo  $row["mois_naisse"] ?>"><?php echo  $row["mois_naisse"] ?>

                                    </select>
                              </div>
                              <div class="form-group col-3">
                                    <b>Jour de naissance : </b>
                              </div>
                              <div class="form-group col-3">
                                    <select disabled name="jour_naiss" class="form-control" required size="0">
                                          <option value="<?php echo  $row["jour_naisse"] ?>"><?php echo  $row["jour_naisse"] ?>

                                    </select>
                              </div>
                        </div>
                        <hr>
                        <div class="row form-group">
                              <div class="form-group col-3">
                                    <b>Heure de Naissance : </b>
                              </div>
                              <div class="form-group col-3">
                                    <input disabled type="text" name="heure_naiss" value="<?php echo  $row["heure_naisse"] ?>" class="form-control" required>
                              </div>
                              <div class="form-group col-3">
                                    <b>Lieu de Naissance : </b>
                              </div>
                              <div class="form-group col-3">
                                    <input disabled type="text" value="<?php echo  $row["lieu_naisse"] ?>" name="lieu_naiss" class="form-control" required>
                              </div>
                        </div>
                        <hr>
                        <div class="row form-group">
                              <div class="form-group col-3">
                                    <b>Sexe du bébé : </b>
                              </div>
                              <div class="form-group col-3">
                                    <select disabled name="sexe" class="form-control" required size="0">
                                          <option value="<?php echo  $row["sexe"] ?>"><?php echo  $row["sexe"] ?>

                                    </select>
                              </div>
                              <div class="form-group col-3">
                                    <b>Prénom du père : </b>
                              </div>
                              <div class="form-group col-3">
                                    <input disabled type="text" value="<?php echo  $row["prenom_pere"] ?>" name="prenom_pere" class="form-control" required>
                              </div>
                        </div>
                        <hr>
                        <div class="row form-group">
                              <div class="form-group col-3">
                                    <b>Prénom du bébé : </b>
                              </div>
                              <div class="form-group col-3">
                                    <input disabled type="text" value="<?php echo  $row["prenom_nouvne"] ?>" name="prenom_bb" class="form-control" required>
                              </div>
                              <div class="form-group col-3">
                                    <b>Nom du bébé : </b>
                              </div>
                              <div class="form-group col-3">
                                    <input disabled type="text" value="<?php echo  $row["nom_nouvne"] ?>" name="nom_bb" class="form-control" required>
                              </div>
                        </div>
                        <hr>
                        <div class="row form-group">
                              <div class="form-group col-3">
                                    <b>Prénom du mère : </b>
                              </div>
                              <div class="form-group col-3">
                                    <input disabled type="text" value="<?php echo  $row["prenom_mere"] ?>" name="prenom_mere" class="form-control" required>
                              </div>
                              <div class="form-group col-3">
                                    <b>Nom du mère : </b>
                              </div>
                              <div class="form-group col-3">
                                    <input disabled type="text" value="<?php echo  $row["nom_mere"] ?>" name="nom_mere" class="form-control" required>
                              </div>
                        </div>
                        <hr>
                        <div class="modal-footer justify-content-center mb-4">
                              <a href="liste_naissances" class="btn btn-danger">x Annuler </a>
                              <form action="pdf.php" method="post" target="_blank">
                                    <input type='hidden' name='id' value="<?php echo  $row["id"] ?>" />
                                    <input type='hidden' name='prenom_nouvne' value="<?php echo  $row["prenom_nouvne"] ?>"/>
                                      <button class=" btn btn-success" name="imprimer" type="submit">Imprimer</button>                           
                               </form>
                        
                        </div>
            </div>
      </div>
</body>