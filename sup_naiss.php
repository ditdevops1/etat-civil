<?php
include 'db.php';
$id=$_GET['id'];
$db->exec("DELETE FROM nouveau_ne WHERE id = $id and annee_scolaire = '$annee'");
$_SESSION['info']='<div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert" style="display: inline-block;">
<i class="fas fa-check mr-3 p-2"></i> L\'étudiant a bien été supprimé !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span> 
            </button>
          </div>';
header('Location:nombre_garçon.php');
?>