<?php 

require '../../db.php';


function index(){
    Global $conn;
    $sql = "SELECT * FROM `order`ORDER BY ID DESC";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: list_order.php?error=sql");
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
        header("Location: list_order.php?error=sql");
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

    $sql = "SELECT * FROM `order` WHERE id = $id";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: list_order.php?error=sql");
        exit();
    }else{
        mysqli_stmt_execute($stmt);           
        $result = mysqli_stmt_get_result($stmt);
        $show = mysqli_fetch_assoc($result);
    }

    return $show;
}

function user($id){
    Global $conn;

    $sql = "SELECT * FROM users WHERE id = $id";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: list_order.php?error=sql");
        exit();
    }else{
        mysqli_stmt_execute($stmt);           
        $result = mysqli_stmt_get_result($stmt);
        $show = mysqli_fetch_assoc($result);
    }

    return $show;
}