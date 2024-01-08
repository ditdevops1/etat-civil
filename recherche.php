<?php 
    
    include 'db.php';
    include 'menu.php';
    
    if($_POST){
        $mot = $_POST["mot"];

        $rech = "SELECT * FROM nouveau_ne where prenom_pere = '$mot'";
            $query = $db->prepare($rech);
            $query->execute();
            $row = $query->fetch();


        if ( $row['prenom_pere'] != $mot ) {
            $emp =  "<div class='alert-danger p-4'> 
            <h4> Aucun résultat sur : ".$mot." !<h4> 
            <a href='home.php'><button class='btn btn-primary'> Retourner</button></a>
            </div> ";
        
        }else{
            $emp = "<table class='table table-bordered table-hover m-4'>
                        <tr class='bg-gray-300'>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Date de naissance</th>
                        <th>Lieu de Naissance</th>
                        <th>Numéro d'extrait</th>
                        <th>Opérations</th>
                        </tr>
                        <tr>
                            <td>".$row['prenom_nouvne']."</td><td>".$row['nom_nouvne']."</td>
                            <td>".$row['annee_naisse']."</b></td><td>".$row['lieu_naisse']."</td>
                            <td>".$row['id']."</td>
                            <td><form action='details.php' method='post'>
                                    <input type='hidden' name='id' value='" . $row['id'] . "' />
                                    <input type='hidden' name='prenom_nouvne' value='" . $row['prenom_nouvne'] . "' />
                                    <button style='border:none; background:none;' type='submit'>
                                    <i class='fas fa-eye'  type='button'></i></button>
                                </form>
                            </td>
                        </tr>
                    </table>";
        }
    }
    
    

?>

   
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-sm-flex justify-content-between" >
        <a href="home.php" class="btn btn-dark"> retourner</a>
        <h5 class="m-0 font-weight-bold text-primary text-center">Résultats de : <b> <?php echo $mot; ?>  </b></h5>
    </div>
    <div class="card">
        <?php echo $emp; ?>
    </div>
</div>
</div>