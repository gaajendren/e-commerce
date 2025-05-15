<?php include '../../sesion.php';
if(isset($_GET['success'])){
    $suc = "Updated Successfully.";
}else{
    $suc = "";
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../../css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../../css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/style.css" type="text/css">
    <script src="https://kit.fontawesome.com/ff3606fe13.js" crossorigin="anonymous"></script>


</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <?php include '../layout/header.html' ?>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Profile Detail</h4>
                        <div class="breadcrumb__links">
                            <a href="../../index.php">Home</a>
                            <span>Profile</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <?php include '../../db.php' ?>
<?php include '../controller.php' ;
  $user = user($_SESSION['id']);
 
   if(isset($_GET['success'])){
?>  
    <div class="container w-100 mt-4 d-flex align-item-center">
    <div class="w-75 btn btn-success m-auto">
        <p class="w-100" style="margin:0; color:white; text-align:center; padding:10px; padding-bottom:10px"><?php echo $suc ?></p>
    </div>
   </div>
   <?php } ?>
<div class="container-xl px-4 mt-4">
    <div class="row">
        <div class="col-xl-10 m-auto">
            
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form>
                        
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Username</label>
                             <p> <?php echo $user['name'] ?> </p>
                        </div>
                        
                    
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <p> <?php echo $user['email'] ?> </p>
                        </div>
                                                  
                            <div class="mb-3">
                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <p> <?php echo $user['contact'] ?> </p>
                            </div>
                            <br>
                            <a href="profile_edit.php"><button style="border:none; background-color: #f3f2ee" class="btn btn-light p-2 mr-2" type="button">Edit Profile</button></a>
                            <a href="change_password.php"><button class="btn btn-light" style="border:none; background-color: #f3f2ee" type="button">Change Password</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

 
    <!-- Footer Section Begin -->
    <?php include '../layout/footer.html' ?>

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
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.nice-select.min.js"></script>
    <script src="../../js/jquery.nicescroll.min.js"></script>
    <script src="../../js/jquery.magnific-popup.min.js"></script>
    <script src="../../js/jquery.countdown.min.js"></script>
    <script src="../../js/jquery.slicknav.js"></script>
    <script src="../../js/mixitup.min.js"></script>
    <script src="../../js/owl.carousel.min.js"></script>
    <script src="../../js/main.js"></script>

    
</body>

</html>