<?php 

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

function index_cart($id){
    Global $conn;

    $sql = "SELECT * FROM cart_order WHERE user_id = $id";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: index.php?error=sql");
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

function order($id){
    Global $conn;
    $sql = "SELECT * from `order` WHERE user_id = $id";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: index.php?error=sqlerror");
        exit();
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}

function user($id){

    Global $conn;
    $sql = "SELECT * from users WHERE id = $id";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: index.php?error=sqlerror");
        exit();
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $show = mysqli_fetch_assoc($result);
    return $show;

}