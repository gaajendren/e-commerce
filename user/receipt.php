<?php require ('../sesion.php');?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receipt</title>

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

    <!-- Offcanvas Menu Begin -->
   

    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <?php include 'layout/header.html' ?>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Receipt</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./product.html">Check Out</a>
                            <span>Receipt</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <?php include '../db.php' ?>
    <!-- Checkout Section Begin -->
    <section class="checkout spad" style="width: 100%; display:flex; align-items:center, justify-content:center;">
        <div class="container"  style="align-self:center;">
            <div  id="pdfSection" class="checkout__form" >
                
                    <div class="row" style="display:flex; justify-content:center; align-items:center;">
                        <div class="col-lg-8 col-md-6">
                            <br>
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name : <span id="fullname"></span></p>
                                    </div>
                                </div>
                            </div>
                            <div  class="checkout__input">
                                <p>Address : <span id="address"></span></p>
                               
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone : <span id="contact"><?php echo $_SESSION['contact'] ?></span></p>                                       
                                    </div>
                                </div>
                            </div>
                            <hr>
                               
                                    <div class="checkout__input">
                                        <p>Date  &nbsp: &nbsp&nbsp<span> <?php echo date("M j Y") ?> </span></p>
                                     
                                    </div>
                            <hr><br>

                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Product Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody id="inhere">
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                         
                            <div class="checkout__input">
                                <p>Total  : &nbsp&nbsp <span>RM <?php echo $_GET['total'] ?>  </span></p>
                                     
                            </div>
                            <hr>
                            <p style="text-align:center;"><b>Thank you for your services !!!</b></p>
                        </div>
                       
                    </div>

                   
                
            </div>
            <div style="width:100%; display:flex; align-items:center; justify-content:center;" class="contain">
            <button class="btn btn-primary mt-5" id="downloadPdf">Download Receipt</button></div>
        </div>
       
    </section>
    <!-- Checkout Section End -->
    



    <!-- Footer Section Begin -->
    <?php include 'layout/footer.html' ?>
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

<script>
   let prd_details_json = localStorage.getItem('prd_detail');
   let prd_details = JSON.parse(prd_details_json);
   console.log(prd_details);
   let inhereElement = document.getElementById('inhere');

   prd_details.forEach((item, index) => {
    let newRow = inhereElement.insertRow();

    let productNameCell = newRow.insertCell(0);
    let productPriceCell = newRow.insertCell(1);

    productNameCell.innerHTML = item[0];
    productPriceCell.innerHTML = item[1];
    });

   
  
    let fullname = localStorage.getItem('fullname');
 
    let address = localStorage.getItem('address');

   
    document.getElementById('fullname').innerText = fullname;
    document.getElementById('address').innerText = address;

   
 function capture() {
    const captureElement = document.querySelector('#pdfSection');
    
    html2canvas(captureElement)
        .then(canvas => {
            canvas.style.display = 'none'
            const fixed_height =  '800';
            document.body.appendChild(canvas)
            const pdf = new  window.jspdf.jsPDF('p', 'px', [600, 635]);
        const imgData = canvas.toDataURL('image/png');

        const margin = 30;
        const pdfWidth = pdf.internal.pageSize.getWidth();
        const pdfHeight = pdf.internal.pageSize.getHeight();
        const imageWidth = pdfWidth - 2;
        const imageHeight =(imageWidth / canvas.width) * fixed_height+100;
      
        pdf.addImage(imgData, 'PNG', 0, 0, imageWidth, imageHeight);

       
        pdf.save('receipt.pdf');
            return canvas
        });
      
}

const btn = document.querySelector('#downloadPdf')
btn.addEventListener('click', capture)
 
</script>
</body>
</html>