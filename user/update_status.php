<?php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['order_id'])) {
    $orderId = $_GET['order_id'];

  
    $updateStatusQuery = "UPDATE `order` SET `status` = 'Paid' WHERE `id` = ?";
    $stmtUpdateStatus = $conn->prepare($updateStatusQuery);
    $stmtUpdateStatus->bind_param("i", $orderId);

    if ($stmtUpdateStatus->execute()) {
        header("Location : receipt.php?total=".$total_price);
        exit();
    } else {
        echo 'Failed to update order status.';
    }

    $stmtUpdateStatus->close();
} else {
    echo 'Invalid request.';
}
?>
