<?php
session_start(); 
if (empty($_SESSION['sess_user'])) {
    header('Location: ./index.php');
    exit;
}
?>

<?php 
unset($_SESSION['sess_user']);  
session_destroy();  
header("location:./index.php");
?>