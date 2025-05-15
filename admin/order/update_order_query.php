<?php
 require '../../db.php';

if(isset($_POST['submit'])){
    
    
    $status = $_POST['status'];
    $id = $_POST['id'];
    

    $sql = "UPDATE `order` SET status=? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    mysqli_stmt_bind_param($stmt, "ss", $status, $id); 
    mysqli_stmt_execute($stmt);
    header("Location: list_order.php?sucess");
    exit();

    
       
        }
            

    
