
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Printing</title>

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
    <script src="https://kit.fontawesome.com/ff3606fe13.js" crossorigin="anonymous"></script>

    <style>
       .card {
            display: flex;
            flex-direction: row;
           
            justify-content: center;
            width: 90px;
            height: 90px;
            cursor: pointer;
        }
        #card1{
            align-items:center;
        }

        .card img {
            object-fit: fill;
        }

        .selected-color {
        border: 2px solid red;
    }

    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <?php include 'layout/header.html' ?>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Order Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <span>Order</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <?php include '../db.php' ?>
<?php include 'controller.php' ;

  $data = show($_GET['id']);

  if(isset($_GET['error']))
  {
  $error = $_GET['error'];
  }else{
    $error = false;
  }
?>
    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
           
                <div class="col-lg-12">
                <form id="myForm" action="add_cart_query.php" method="post" enctype="multipart/form-data">
                    <div class="shopping__cart__table">
                        <div class="row">
                               
                            <div class="col-lg-6" > 
                                <img style="width:95%; max-height:500px;    object-fit: cover; background-position: center;" src="../admin/img/product_image/<?php echo $data['img']?>">
                            </div>

                           
                                              
                             <div class="col-lg-6 ">
                                <div class="row">
                                    <div class="col-lg-12">
                                    <h3 style="font-weight:bold"><?php echo $data['prd_name'] ?></h3>
                                    <input type="hidden" value="<?php echo $data['prd_name'] ?>" name="prd_name">
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-lg-12">
                                    <p style="font-weight:normal"><?php $description =  $data['description'];  
                                        $lines = explode('-', $description);
                                        echo implode('<br> -', $lines);?></p>
                                    </div>
                                </div>
                                
                                <hr>

                                <div class="row">
                                    <div class="col-lg-12">
                                <h4>Available Colors</h4>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-default text-center active"  onclick="selectColor(this)">
                                <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" value="Black" >
                                Black
                                <br>
                                <i class="fa-solid fa-circle" style="color: black;"></i>
                                </label>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-default text-center active"  onclick="selectColor(this)">
                                <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" value="Green" >
                                Green
                                <br>
                                <i class="fa-solid fa-circle" style="color: #07f217;"></i>
                                </label>
                                <label class="btn btn-default text-center"  onclick="selectColor(this)">
                                <input type="radio" name="color_option" id="color_option_a2" value="Blue" autocomplete="off">
                                Blue
                                <br>
                                <i class="fa-solid fa-circle" style="color: #0b07f2;"></i>
                                </label>
                                <label class="btn btn-default text-center"  onclick="selectColor(this)">
                                <input type="radio" name="color_option" id="color_option_a3" value="Purple" autocomplete="off">
                                Purple
                                <br>
                                <i class="fa-solid fa-circle" style="color: #c007f2;"></i>
                                </label>
                                <label class="btn btn-default text-center"  onclick="selectColor(this)">
                                <input type="radio" name="color_option" id="color_option_a4" value="Red" autocomplete="off">
                                Red
                                <br>
                                <i class="fa-solid fa-circle" style="color: red;"></i>
                                </label>
                                <label class="btn btn-default text-center"  onclick="selectColor(this)">
                                <input type="radio" name="color_option" id="color_option_a5" value="Orange" autocomplete="off">
                                Orange
                                <br>
                                <i class="fa-solid fa-circle" style="color: #f29107;"></i>
                                </label>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-default text-center active"  onclick="selectColor(this)">
                                <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" value="White" checked>
                                White
                                <br>
                                <i class="fa-regular fa-circle" style="color: #000000;"></i>
                                </label>
                                </div>
                                    </div>
                                </div>
                                
                                <hr>
                                <br>

                                <div class="row">
                                    <div class="col-lg-3">
                                    <label for="">Price: </label>
                                    <p style="font-weight:bold">RM <?php echo $data['prd_price'] ?></p>
                                    </div>
                                    <div class="col-lg-3">
                                    <label for="">Brand: </label>
                                    <p style="font-weight:bold"><?php echo $data['brand'] ?></p>
                                    </div>
                                    <div class="col-lg-3">
                                    <label for="">Material: </label>
                                    <p style="font-weight:bold"><?php echo $data['material'] ?></p>
                                    </div>
                                </div>
                                <br>

                                
                                    <div class="row">
                                        <div class="col-lg-12">
                                      <label for="exampleFormControlSelect1">Size: </label></div>
                                    </div>
                                    <div class="row">
                                    <div class="col-lg-12">
                                    <select class="form-control form-control-solid pt-0 bg-light border border-secondary" name="size" required>
                                        <option value="s">Small </option>
                                        <option value="m">Medium </option>
                                        <option value="l">Large</option>
                                        <option value="xl">Extra Large </option>
                                        <option value="2xl">Double Extra Large</option>
                                    </select></div>
                                    </div>
                              
                                <hr><br>

                                <div class="row">
                                    <div class="col-lg-8 ml-2"> 
                                        <label for="size"><b>Please upload your design image (Only Image)</b></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                    <div class="input-group pd-4 w-75">
                                        <input type="file" name="file" class="form-control pd-4" id="inputGroupFile01" accept="image/*" onchange="validateFile(this)">
                                    
                                    </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                <div class="col-lg-8">
                                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                                    <input type="hidden" id="total_price" value="<?php echo $data['prd_price'] ?>" name="total_price">
                                    <input type="hidden" id="prd_image" value="<?php echo $data['img'] ?>" name="prd_image">

                                 <input type="submit" value="ADD TO CART"  name="submit" class="btn btn-danger p-0 pl-2 pr-2 pt-2 pb-2">
                                </div>
                                </div>
                               
                            </div> 
                        </div>
                    </div>
                
                    </form>
                </div>
                         
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

 
    <!-- Footer Section Begin -->
    <?php include 'layout/footer.html' ?>

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

    <script>
      
    let error = '<?php echo $error; ?>' 

    if(error == "itemalreadyadded"){
        alert("The item already added!");
    }
    
    let qtyInput = document.getElementById('qty');
   
  
  
   
    function selectColor(label) {
        
        var allLabels = document.querySelectorAll('.btn-group-toggle label');
        allLabels.forEach(function (otherLabel) {
            otherLabel.classList.remove('selected-color');
        });

       
        label.classList.add('selected-color');
    }
  

 function validateFile(input) {
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

        if (!allowedExtensions.exec(input.value)) {
            alert('Invalid file type. Please select an image file (jpg, jpeg, png, gif).');
            input.value = '';
            return false;
        }
    }
    </script>
</body>

</html>