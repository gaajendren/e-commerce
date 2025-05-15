<?php require ('../sesion.php');  ?>
<?php include '../db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order List</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <?php include 'layout/header.html' ?>

    <?php require 'controller.php' ?>


    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Order Details</h4>
                        <div class="breadcrumb__links">
                            <a href="../index.php">Home</a>
                            <span>Order List</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-4">
       
        <?php 
         $data = order($_SESSION['id']);
         
        foreach ($data as $key => $val) {
            $product = show($val['product_id']);
       ?>
        <div class="row mb-4 mt-2">
            <div class="col-11 m-auto" >
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                            <div class="col-md-2">
                                <img height="100px" width="120px" style="object-fit:fill" src="http://localhost/dressPrinting/admin/img/product_image/<?php echo $product['img']?>" alt="product image">
                            </div>
                            <div class="col-md-3">
                                <p><?php echo $product['prd_name'] ?></p>
                            </div>
                            <div class="col-md-2 pl-0 pr-0">
                                <p>Quantity: <?php echo $val['qty'] ?></p>
                            </div>
                            <div class="col-md-2 ">
                                <p>Color: <?php echo $val['color'] ?></p>
                            </div>
                            <div class="col-md-1 pl-0 pr-0 text-align-right">
                                <p>Size: <?php if($val['size'] == 's'){
                                    echo "Small";
                                }else if($val['size'] == 'm'){
                                    echo "Medium";
                                }else if($val['size'] == 'l'){
                                    echo "Large";
                                }else if($val['size'] == 'xl'){
                                    echo "Extra Large";
                                }else{
                                echo "Double Extra Large";}?></p>
                            </div>
                            <div class="col-md-2">
                                <p><?php echo  date("d F Y", strtotime($val['order_date'])); ?></p>
                            </div>
                    </div>
                    <hr>
                                        <?php if($val['status'] == 'Pending'){
                                            $width = '5%';
                                        }else if($val['status'] == 'On Process'){
                                            $width = '35%';
                                        }else if($val['status'] == 'Pending Pickup'){
                                            $width = '70%';
                                        }else{
                                            $width = '100%';
                                        } ?>
                            <div class="row d-flex align-items-center m-auto">
                                <div class="col-md-2 m-auto">
                                    <p class="text-muted mb-0 small">Track Order</p>
                                </div>
                                <div class="col-md-8 m-auto">
                                    <div class="progress" style="height: 6px; border-radius: 16px;">
                                        <div class="progress-bar" role="progressbar"
                                            style="width:<?php echo $width ?>; border-radius: 16px; background-color: #a8729a;" aria-valuenow="100"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                        
                                    <div class="d-flex justify-content-between mb-1">
                                        <p class="text-muted mt-1 mb-0 small ms-xl-5">Pending</p>
                                        <p class="text-muted mt-1 mb-0 small ms-xl-5">On Process</p>
                                        <p class="text-muted mt-1 mb-0 small ms-xl-5">Pending Pick Up</p>
                                        <p class="text-muted mt-1 mb-0 small ms-xl-5">Settle</p>
                                    </div>
                                </div>
                            </div>           
                    </div>
                </div>
            </div>
        </div>

        <?php } ?>
    </div>
  



    <!-- Footer Section Begin -->
    <?php include 'layout/footer.html'?>

    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.nice-select.min.js"></script>
    <script src="../js/jquery.nicescroll.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/jquery.countdown.min.js"></script>
    <script src="../js/jquery.slicknav.js"></script>
    <script src="../js/mixitup.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>

 
</body>

</html>