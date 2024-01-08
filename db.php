<?php
 session_start();
 if (!$_SESSION['admin']) {
     header('location:index.php');
 }
    $db_user = "root";
    $db_pass = "";
    $db_name = "rufisque_est";
    $conn = mysqli_connect("localhost","root","","rufisque_est");
    $db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
   
   ?>