<?php
 session_start();
 
 $_SESSION['status'] = "";
if(isset($_POST['connexion']))
{
    $admin = $_POST['admin']; 
    $pwd = $_POST['pwd']; 

   if($admin == "ADMINE" && $pwd == "admin1234")
   {
        $_SESSION['admin'] = $_POST['admin'];
        header('Location: home.php');
   } 
   else
   {
        $_SESSION['status'] = "<div class='alert-danger p-2 text-center'> 
        <b> cet utilisateur est non reconnu ! </b> </div> ";
   }
    
}
?>
<!doctype html>
<html lang="fr">
  <head>
  	<title>Connexion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <!---	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
-->
	<link rel="stylesheet" href="login/css/style.css">
	<style>
		body{background:whitesmoke;}
		.login-wrap{width: 400px;margin-top: -20px;}
		.btn{background-color: #0078AA; font-size: 17px; color: white;font-weight:550;}
		.btn:hover{background-color:#007bff40 ;
			color:#007bff;border:1.5px solid #007bff;}
		.img{width: 40%;}
		label{margin-left: 10px;}
	</style>
	</head>
	<body>
	<section class="ftco-section"  >
		<div class="container">
			<div class="row justify-content-center">
				<div class="login-wrap shadow rounded">
			      	<div class="d-flex text-center justify-content-center">
					  <img src="login/etat.png"class="img p-2" alt="" srcset="">
					</div>
					<?php echo $_SESSION['status']; ?>
					<form action="" method="POST" style="width: 300px; margin: 0 auto" autocomplete="off">
			      		<div class="form-group">
			      			<input type="text" autocomplete="off" name="admin" class="form-control " placeholder="utilisateur" required>
			      		</div>
		            <div class="form-group mt-4">
		              <input type="password" autocomplete="off" name="pwd" class="form-control " placeholder="mot de passe" required>
		            </div>
					
		            <div class="form-group">
		            	<button type="submit" name="connexion" class="btn w-100 mt-2 mb-4" >Se connecter</button>
		            </div>
		            
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>
