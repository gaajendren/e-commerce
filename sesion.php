<?php
session_start();

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
 
   
}else{
    unset($_SESSION['id']);
    unset($_SESSION['email']);
    header("Location: login.php");
}

?>

