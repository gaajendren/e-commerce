<?php
session_start();

header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $role = $_SESSION['role'];
    $name = $_SESSION['name'];
   
    
 
    if($role == 1){
        header('Location: admin/index.php');
        exit();
    }
   
}else{
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    unset($_SESSION['role']);
    header("Location: login.php");
}
?>

