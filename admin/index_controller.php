<?php 

require '../db.php';

function price(){
    Global $conn;
    $sql = "SELECT price FROM `order` WHERE status = 'Settle' ";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: index.php.php?error=sql");
        exit();
    }else{
        mysqli_stmt_execute($stmt);           
        $result = mysqli_stmt_get_result($stmt);

          $totalPrice =0;

        while ($row = mysqli_fetch_assoc($result)) {
            $totalPrice += $row['price'];
        }
    }

    return $totalPrice;
}
function all_price(){
    Global $conn;
    $sql = "SELECT price FROM `order` WHERE status <> 'Reject'";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: index.php.php?error=sql");
        exit();
    }else{
        mysqli_stmt_execute($stmt);           
        $result = mysqli_stmt_get_result($stmt);

          $totalPrice =0;

        while ($row = mysqli_fetch_assoc($result)) {
            $totalPrice += $row['price'];
        }
    }

    return $totalPrice;
}

function pending_order(){
    Global $conn;
    $sql = "SELECT COUNT(id) AS orderCount FROM `order` WHERE status = 'Pending'";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: index.php.php?error=sql");
        exit();
    }else{
        mysqli_stmt_execute($stmt);           
        $result = mysqli_stmt_get_result($stmt);

        $row = mysqli_fetch_assoc($result);

        // Get the count of orders
        $orderCount = $row['orderCount'];

    }

    return $orderCount;
}

function reject(){
    Global $conn;
    $sql = "SELECT COUNT(id) AS orderCount FROM `order` WHERE status = 'Reject'";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: index.php.php?error=sql");
        exit();
    }else{
        mysqli_stmt_execute($stmt);           
        $result = mysqli_stmt_get_result($stmt);

        $row = mysqli_fetch_assoc($result);

        // Get the count of orders
        $orderCount = $row['orderCount'];

    }

    return $orderCount;
}


function total_product(){
    Global $conn;
    $sql = "SELECT COUNT(id) AS productCount FROM product";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: index.php.php?error=sql");
        exit();
    }else{
        mysqli_stmt_execute($stmt);           
        $result = mysqli_stmt_get_result($stmt);

        $row = mysqli_fetch_assoc($result);

        // Get the count of orders
        $productCount = $row['productCount'];

    }

    return $productCount;
}


