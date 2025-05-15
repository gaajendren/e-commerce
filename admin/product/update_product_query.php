<?php
 require '../../db.php';

if(isset($_POST['submit'])){
    
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $brand = $_POST['brand'];
    $material = $_POST['material'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $size = $_POST['size'];
    $serializedSize = json_encode($size);
    $id = $_POST['id'];
    $image = $_FILES['image']['name']; 
    $image_temp = $_FILES['image']['tmp_name']; 

    if (!empty($image)) {

    move_uploaded_file($image_temp, "../img/product_image/" . $image);

    $stmt = mysqli_stmt_init($conn);
    $sql = "UPDATE product SET prd_name = ?, prd_quantity = ?, prd_price = ?, img = ?, category=?, brand = ?, size = ?, material = ?, description = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    mysqli_stmt_bind_param($stmt, "ssssssssss", $name, $quantity, $price, $image, $category, $brand, $serializedSize, $material, $description, $id); 
    mysqli_stmt_execute($stmt);
    header("Location: product.php?sucess");
    exit();
    
    }else{
        $sql = "UPDATE product SET prd_name = ?, prd_quantity = ?, prd_price = ?, category=?, brand = ?, size = ?, material = ?, description = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        
        mysqli_stmt_bind_param($stmt, "sssssssss", $name, $quantity, $price, $category,$brand, $serializedSize, $material, $description, $id); 
        mysqli_stmt_execute($stmt);
        header("Location: product.php?sucess");
        exit();

    }
       
        }
            

    
