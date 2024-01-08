<?php
 session_start();
 
 $_SESSION['status'] = "";

if($_POST)
{
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    $profil = $_POST['profil'];
    $annee_scolaire = $_POST['annee_scolaire'];
    $mail = $_POST['mail'];
    
    $query = "SELECT * FROM users WHERE mail ='$mail' ";  
    $query_run = mysqli_query($connection, $query);

   if(mysqli_num_rows($query_run) !=0)
   {
    $_SESSION['status'] = "<div class='alert-danger p-2 text-center'> 
                        <b> Cet utilisateur existe déjà ! </b> </div>";
   } 
   else
   {
    $sql = "INSERT INTO users ( mail, user_login, pwd, profil, annee_scolaire )
                         VALUES(?,?,?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([ $mail,$user,$pwd,$profil,$annee_scolaire]);
    if($result){
        $_SESSION['status'] = "<div class='alert-success p-2 text-center'> 
                                <b>l' utilisateur a bien été créé ! </b> </div>";
    }
        
   }
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .form-control {
            border-radius: 1cm;
        }
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6" style="padding:4cm;"><img src="login/icon.png" alt="" srcset=""></div>
                            <div class="col-lg-6 bg-gray-100">
                                
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Ajouter un nouveau profil !</h1>
                                    </div>
                                    <form action="add_profil.php" method="POST">
                                        <div class="form-group">
                                            <input type="email" autocomplete="off" name="mail" class="form-control " placeholder="e-mail" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" autocomplete="off" name="user" class="form-control " placeholder="nom utilisateur" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" autocomplete="off" name="pwd" class="form-control " placeholder="mot de passe" required>
                                        </div>
                                        <div class="form-group">
                                            <select name="profil" id="" class="form-control " required>
                                                <option value="Proviseur">Proviseur</option>
                                                <option value="Adjoint Prov">Adjoint Prov</option>
                                                <option value="Surveillant Général">Surveillant Général</option>
                                                <option value="Secrétaire">Secrétaire</option>
                                                <option value="Censeur">Censeur</option>
                                                <option value="Professeur">Professeur</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="annee_scolaire" id="" class="form-control " required>
                                                <option value="2022 - 2023">2022 - 2023</option>
                                                <option value="2023 - 2024">2023 - 2024</option>
                                                <option value="2024 - 2025">2024 - 2025</option>
                                                <option value="2025 - 2026">2025 - 2026</option>
                                            </select>
                                        </div>
                                        <?php echo $_SESSION['status']; ?>
                                        <div class="form-group">
                                            <button type="submit" name="valider" class="btn btn-primary form-control w-100 mt-2">Valider le profil</button>
                                            <a href="home" class="btn btn-danger form-control w-100 mt-3">Annuler le profil</a>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    </body>