<?php
require '../sesion.php';
require '../vendor/autoload.php';


use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

$clientId = 'AWqs9jJHTtrY5jad3rojcmDES3iNpS8zzHDPXkwkbuJePkOPE-e2lj-Nwl6yMIO6n0ockVgn_KSDNmiq';
$clientSecret = 'EM-qr6cvQ6XNGn8OGvxb8POyuBOvG4OhwWPaAfyoTls47WhICBzq-vQD9aqBayjkIyltPxSL6eQwRjyF';

$apiContext = new ApiContext(
    new OAuthTokenCredential($clientId, $clientSecret)
);

$apiContext->setConfig([
    'mode' => 'sandbox',
    'log.LogEnabled' => true,
    'log.FileName' => 'logs/paypal.log',
    'log.LogLevel' => 'FINE',
]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $dbHost = "localhost";
    $dbUser = "gaajen";
    $dbPass = "123456";
    $dbName = "dress";

    //Connection to database
    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

    if (!$conn) {
        die("Database connection failed!");
    }
    

    
    if (isset($_POST['delete']) && $_POST['delete'] == 'action1') {
        $product_id = $_POST['id'];

        $sql = "DELETE FROM cart_order WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $product_id);

        if ($stmt->execute()) {
            
            header("Location: add_to_cart.php");
            exit();
        } 

        $stmt->close();
    }
    
        $total_price = $_POST['total_price'];

       

    function update_cart_order($userId, $productId, $quantity , $conn) {
      
        $stmt = $conn->prepare("UPDATE cart_order SET qty = ? WHERE user_id = ? AND id = ?");
        $stmt->bind_param("iii", $quantity, $userId, $productId);
       
        $stmt->execute();
    
    }

    function getCartItems($id , $conn){ 
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


    foreach ($_POST['quantity'] as $productId => $quantity) {
    
        update_cart_order($_SESSION['id'], $productId, $quantity , $conn);
    }


   

    $cartItems = getCartItems($_SESSION['id'], $conn);

    $qty = 0;
    $product_id = 0;
    foreach ($cartItems as $cartItem) {
        $insertOrderQuery = "INSERT INTO `order` (user_id, order_date, size, price, product_id, color, prd_design, qty) 
                             VALUES (?,?,?,?,?,?,?,?)";
        $stmtOrder = $conn->prepare($insertOrderQuery);
        $user_id = $_SESSION['id'];
        $order_date = date('Y-m-d H:i:s');
        $product_id = $cartItem['product_id'];
        $color = $cartItem['color'];
        $image = $cartItem['img'];
        $size = $cartItem['size'];
        $qty = intval($cartItem['qty']);
        $price = floatval($cartItem['total_price']) * $qty;

        $stmtOrder->bind_param('issdssss', $user_id,  $order_date, $size ,$price, $product_id, $color, $image, $qty );
        $stmtOrder->execute();
        $order_id = mysqli_insert_id($conn);

        $deleteCartQuery = "DELETE FROM cart_order WHERE user_id = ?";
        $stmtDeleteCart = $conn->prepare($deleteCartQuery);
        $stmtDeleteCart->bind_param('i', $_SESSION['id']);
        $stmtDeleteCart->execute();
    }

     $sql = "SELECT prd_quantity FROM product WHERE id = $product_id";
        $result = $conn->query($sql);

                if ($result) {
                    $row = $result->fetch_assoc();
                    $currentQuantity = $row['prd_quantity'];
                    $newQuantity = $currentQuantity - $qty;
                    $sqlUpdate = "UPDATE product SET prd_quantity = $newQuantity WHERE id = $product_id";
                    $updateResult = $conn->query($sqlUpdate);   
                } else {
                    header("Location: order.php?error=send . $conn->error");
                    exit();
                }


            $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayPal Checkout</title>
    <script src="https://www.paypal.com/sdk/js?client-id=AWqs9jJHTtrY5jad3rojcmDES3iNpS8zzHDPXkwkbuJePkOPE-e2lj-Nwl6yMIO6n0ockVgn_KSDNmiq&currency=MYR"></script>
<style>
    .container{
        width:100%;
        display:flex;
        align-items:center;
        justify-content: center;
    }
     #paypal-button-container {
            width:50%;
            display: flex;
            align-items: center;
            justify-content: center;
           
        }
</style>
</head>
<body>
     <div class="container">
    <div  id="paypal-button-container"></div>
    </div>
   
    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $total_price ?>' 
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    alert('Transaction completed by ' + details.payer.name.given_name + "total: " + <?php echo $total_price ?>);
                    console.log(details);
                    localStorage.setItem('fullname', details.payer.name.given_name);
                    localStorage.setItem('address', details.purchase_units[0].shipping.address.address_line_1);
                    
                            var updateStatusUrl = 'update_status.php?order_id='+<?php echo $order_id ?>;

                            // AJAX call to update order status
                            var xhr = new XMLHttpRequest();
                            xhr.open('GET', updateStatusUrl, true);
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    console.log('Order status updated to paid.');
                                }
                            };
                            xhr.send();
                });
            }
        }).render('#paypal-button-container');
    </script>

</body>
</html>
