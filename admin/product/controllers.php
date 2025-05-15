<?php 

require '../../db.php';


function index(){
    Global $conn;
    $sql = "SELECT * FROM product";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: product.php?error=sql");
        exit();
    }else{
        mysqli_stmt_execute($stmt);           
        $result = mysqli_stmt_get_result($stmt);
    }

    return $result;
}

function show($id){
    Global $conn;

    $sql = "SELECT * FROM product WHERE id = $id";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: product.php?error=sql");
        exit();
    }else{
        mysqli_stmt_execute($stmt);           
        $result = mysqli_stmt_get_result($stmt);
        $show = mysqli_fetch_assoc($result);
    }

    return $show;
}



function delete($id){
    Global $conn;

    $sql = "DELETE  FROM product WHERE id=$id";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: product.php?error=delete");
        exit();
    }else{
        mysqli_stmt_execute($stmt);   
        header("Location: product.php?success=delete");
        exit();
    }
}