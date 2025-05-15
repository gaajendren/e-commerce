<?php include '../sesion.php';  ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add to Cart</title>

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
        .quantity {
    display: flex;
    align-items:center;
    flex-direction:row;
  
    
    }

    .value-button:hover {
    cursor: pointer;
    }

    form #decrease {
    margin-right: -4px;
    border-radius: 8px 0 0 8px;
    }

    form #increase {
    margin-left: -4px;
    border-radius: 0 8px 8px 0;
    }

    form #input-wrap {
    margin: 0px;
    padding: 0px;
    }

    input#number {
    text-align: center;
    border: none;
    border-top: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
    margin: 0px;
    width: 40px;
    height: 40px;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    

    <?php include 'layout/header.html'; ?>
    
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Add to Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <span>Product Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
<?php include '../db.php' ?>
<?php include 'controller.php' ;

  $data = index_cart($_SESSION['id']);
  

?>
    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                      <form id="checkout-form" action="payment.php" method="post">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $key => $item) {
                                   $result = show($item['product_id']);
                                ?>
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img style="object-fit:cover; width:80px; height:90px" src="../admin/img/product_image/<?php echo $item['prd_image']?>" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6 class="prd_name"><?php echo $item['prd_name'] ?></h6>
                                            <h5 id="price">RM <?php echo $item['total_price'] ?></h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                        <div class="value-button"  id="decrease" onclick="decreaseValue(this)" value="Decrease Value"><i class="fa-solid fa-angle-left fa-2s"></i></div>
                                        <input type="number" name="quantity[<?php echo $item['id']; ?>]" style="border:none" max="<?php echo $result['prd_quantity'] ?>" id="number" value="1" class="_<?php echo $item['product_id'] ?>" oninput="validateInput(this); calculateTotalPrice(this)" />
                                        <div class="value-button" id="increase" onclick="increaseValue(this,<?php echo $result['prd_quantity'] ?>,<?php echo $item['product_id'] ?>); calculateTotalPrice(this)" value="Increase Value"><i class="fa-solid fa-angle-right fa-2s"></i></div>
                                        </div>
                                    </td>
                                    <td id="total_price" class="cart__price">RM <?php echo $item['total_price'] ?></td>
                                    <td class="cart__close"> <form action="delete.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                            <button style="border:none; background-color:transparent" name="delete" value="action1" type="submit"><i class="fa fa-close"></i></button>
                                        </form></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                                <input type="hidden" name="total_price" id="hidden_total_price" value="">
                                <button type="submit" style="display: none;"></button>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="../index.php">Continue Shopping</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-4">
                   
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                          
                            <li id="total">Total RM<span></span></li>
                        </ul>
                        <a href="#" onclick="submitForm()" class="primary-btn">Proceed to Payment</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

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

        

     function duplicate(id , maxValue){
        console.log("t"+ maxValue)
        let max_qty = maxValue;
            document.querySelectorAll(`._${id}`).forEach((data)=>{
                max_qty -= parseInt(data.value, 10);   
            });
            console.log("hi" + max_qty);
            return max_qty;
     }
       
      function increaseValue(element , maxValue, id) {
        let input = element.closest('.quantity').querySelector('#number');
       let value = parseInt(input.value, 10);
        maxValue = duplicate(id,maxValue);
        if(maxValue > 0){
            value = value + 1;
        }else{
            alert("Reached maximum quantity available!!!");
        }

        input.value = value;
        calculateTotalPrice(input);
}

function decreaseValue(element) {
  let input = element.closest('.quantity').querySelector('#number');
 
  let value = parseInt(input.value, 10);
  value = Math.max(value - 1, 1);

  input.value = value;
  calculateTotalPrice(input);
 
}

function validateInput(input) {
  let maxValue = parseInt(input.getAttribute('max'), 10);
  let enteredValue = parseInt(input.value, 10);

  if (enteredValue > maxValue) {
    input.value = maxValue;
  }

  calculateTotalPrice(input);
}

function calculateTotalPrice(input) {
    console.log("hi")
    
    let price = parseFloat(input.closest('tr').querySelector('#price').innerHTML.replace('RM ', ''));
    let quantity =input.closest('tr').querySelector('#number').value;
    console.log(quantity)
    let total = (quantity * price).toFixed(2);
    
    input.closest('tr').querySelector('#total_price').textContent = 'RM ' + total;
    total_price();

}

function total_price(){
    let total_price1 =document.getElementById('hidden_total_price');
    let price = 0.00;
    document.querySelectorAll('#total_price').forEach((data)=>{
        price = price + parseFloat(data.innerHTML.replace('RM ',''));   
    });
    console.log(price);

    document.getElementById('total').querySelector('span').textContent = "RM" + " " + price;
    total_price1.value = price; 
}

function saveValue(){
    let product_detail = [];
       let total_price2 =document.getElementById('hidden_total_price').value;

      document.querySelectorAll('.prd_name').forEach((val)=>{
            let product_quantity = val.closest('tr').querySelector('#number').value;

            product_detail.push([val.textContent, product_quantity]);
       }); 

       let product_detail_json = JSON.stringify(product_detail);
       localStorage.setItem('prd_detail' , product_detail_json);
}

function submitForm() {
      
        total_price();
        saveValue();
        
        document.getElementById('checkout-form').submit();
    }

total_price();
    </script>
</body>

</html>