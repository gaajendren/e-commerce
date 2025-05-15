<?php
 require '../../db.php';

if(isset($_POST['submit'])){
    
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $size1 = $_POST['size'];
    $size = json_encode($size1);
    $price = $_POST['price'];
    $material = $_POST['material'];

    $image = $_FILES['image']['name']; 
    $image_temp = $_FILES['image']['tmp_name']; 

    move_uploaded_file($image_temp, "../img/product_image/" . $image);
    

        $sql = "INSERT INTO product (prd_name ,prd_quantity,prd_price, img, category , brand, size , material, description) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: add_product.php?error=sql");
            exit();
        }else{
         
            
            mysqli_stmt_bind_param($stmt,"sssssssss",$name,$quantity,$price,$image , $category, $brand, $size, $material,$description);
            mysqli_stmt_execute($stmt);
            header("Location: product.php?sucess");
            exit();
        }
            }

    
