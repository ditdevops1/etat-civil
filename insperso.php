<?php
include 'db.php';
include 'menu.php';

if($_POST){
    /*recupérer les données */

    $annee_dec = $_POST['annee_dec'];
    $annee_naiss = $_POST['annee_naiss'];
    $mois_naiss = $_POST['mois_naiss'];
    $jour_naiss = $_POST['jour_naiss'];
    $heure_naiss = $_POST['heure_naiss'];
    $lieu_naiss = $_POST['lieu_naiss'];
    $sexe = $_POST['sexe'];
    $prenom_pere = $_POST['prenom_pere'];
    $prenom_bb = $_POST['prenom_bb'];
    $nom_bb = $_POST['nom_bb'];
    $prenom_mere = $_POST['prenom_mere'];
    $nom_mere = $_POST['nom_mere'];
    $emp ="";
    /* insérer le mail dans la table newuser*/
    $sql = "INSERT INTO nouveau_ne (annee_dec,annee_naisse,jour_naisse,heure_naisse,lieu_naisse,sexe,prenom_nouvne,nom_nouvne,prenom_pere, prenom_mere, nom_mere, mois_naisse ) 
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([ $annee_dec,$annee_naiss,$jour_naiss,$heure_naiss,$lieu_naiss,$sexe,$prenom_bb,$nom_bb,$prenom_pere,$prenom_mere,$nom_mere,$mois_naiss]);
    if($result){
        $emp =  "<div class='alert-success p-4  mt-5 text-center' style='margin:0 auto; width:80%'> 
        <h4>  Déclaration a bien été ajouté !<h4> 
        <p>le déclaration du nouveau né : <b>".$prenom_bb." ".$nom_bb." </b> a été validé avec success !</p>
        <a href='liste_naissances'><button class='btn btn-primary'> retourner </button></a>
        </div> ";
        echo $emp;
       
    }else{
        /*message d'erreur! */
        echo 'une erreur s\'est produit, merci de réessayer.';
      }
    }else{
    echo 'No data';
    }
?>

<!-- Fin Code php -->
