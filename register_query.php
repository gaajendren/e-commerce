<?php
require 'db.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $c_pass = $_POST['c_password'];

   
       
        $sql = "SELECT * FROM users WHERE email = ?";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: signUp.php?error=sql");
            exit();
        }else{

            mysqli_stmt_bind_param($stmt ,"s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

           if(mysqli_stmt_num_rows($stmt)>0){
            header("Location: signUp.php?error=emailexist");
            exit();
           }else{

        $sql = "INSERT INTO users (name , email,password, contact) VALUES (?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: signUp.php?error=sql");
            exit();
        }else{
            $hash = password_hash($password , PASSWORD_DEFAULT);
            
            mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$hash,$contact);
            mysqli_stmt_execute($stmt);
            header("Location: login.php?sucess");
            
        }
           }
        }
    }
