<?php
session_start();
include 'path.php';


if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $role = $_SESSION['role'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
 
    if($role == 0){
        header('Location: http://localhost/dressPrinting/index.php');
        exit();
    }
   
}else{
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    unset($_SESSION['email']);
    unset($_SESSION['role']);
    header('Location: '.$login);
}

?>

