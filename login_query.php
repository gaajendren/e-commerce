<?php
session_start();
require 'db.php';

 if (isset($_POST['submit']))
{
    $email = $_POST['email'];
    $pass = $_POST['password'];

    if(empty($email) || empty($pass)){
        header("Location: login.php?error=fillalldetails");
        exit();
    }else{
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: login.php?error=sql");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt,'s',$email);
            mysqli_stmt_execute($stmt);           
            $result = mysqli_stmt_get_result($stmt); 
            $result1 = mysqli_fetch_array($result);  
           
            if (!$result1) 
            { 
                header("Location: login.php?error=nouser");
                exit();

            }else{
                $hashpass= $result1['password'];

              

                if(password_verify($pass, $hashpass)){
                   
                    
                     $_SESSION['id'] = $result1['id'];
                     $_SESSION['email'] = $result1['email'];                   
                    header("Location: index.php");
                    exit();

                }else{
                    header("Location: login.php?wrongpassword");
                    exit();
                }
               


            }
        
           mysqli_stmt_close($stmt);
           mysqli_close($conn);
        
         

        }
    }
}else {
    header("Location: login.php?connectionerror");
}