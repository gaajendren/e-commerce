<?php
 
require('../db.php');
require('../sesion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $prd_name = $_POST['prd_name'];
    $color_option = $_POST['color_option'];
    $size = $_POST['size'];
    $total_price = $_POST['total_price'];
    $prd_image = $_POST['prd_image'];
    $id = $_POST['id'];
    $id_users = $_SESSION['id'];
   
    $file = $_FILES['file'];
    $filename = $file['name'];
    $tempFile = $file['tmp_name'];
    $ra = random_int(0, 999);
    $file_name = $id_users . $ra . $filename;
    $uploadDir = "uploads/";

    //select 

    $sql = "SELECT id FROM cart_order WHERE product_id = ? AND color = ? AND size = ?";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt , $sql)){
        header("Location: order.php?error=sqlconnection");
        exit();
    }
    mysqli_stmt_bind_param($stmt , 'iss' , $id,$color_option,$size);
    mysqli_stmt_execute($stmt); 
    mysqli_stmt_store_result($stmt);

    if(mysqli_stmt_num_rows($stmt) > 0){
        header("Location: order.php?id=$id&&error=itemalreadyadded");
        exit();
    } else{
  
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
   
    $targetFile = $uploadDir . $file_name;
    move_uploaded_file($tempFile, $targetFile);

    /// insertion
    $sql =  "INSERT INTO `cart_order` (product_id, user_id, size ,total_price, prd_image, color, img, prd_name) VALUES (?,?, ?, ?, ?, ?,?, ?)";
   
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Error connection: " . mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, 'ssssssss', $id,  $id_users, $size, $total_price, $prd_image, $color_option, $file_name, $prd_name);
        mysqli_stmt_execute($stmt);    

       
                      
            header("Location: add_to_cart.php?success=send");
            exit();

       }

    }
}
