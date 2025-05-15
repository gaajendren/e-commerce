<?php include '../../sesion.php';
include '../../db.php';

if(isset($_POST['submit'])){
    $id = $_SESSION['id'];
    $old_pass = $_POST['old_pass'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];

    $sql = "SELECT password FROM users WHERE id =$id";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: index.php?error=sqlerror");
        exit();
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); 
    $result1 = mysqli_fetch_array($result); 
    $hashpass= $result1['password'];

    if(password_verify($old_pass, $hashpass)){

        if(!$password === $c_password){
            header("Location: change_password?error=nomatchpassword");
            exit();
        }else{

        $sql= "UPDATE users SET password=?  WHERE id = $id";
        $hash = password_hash($password , PASSWORD_DEFAULT);

        $stmt = mysqli_stmt_init($conn);
    
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: index.php?error=sqlerror");
            exit();
        }
        mysqli_stmt_bind_param($stmt, 's' , $hash);
        mysqli_stmt_execute($stmt);
        header("Location: profile.php?success=updated");
    }
    }else{
        header("Location: change_password?error=wrongoldpassword");
        exit();
    }   
}
?>
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
 
?>
  
<div class="container-xl px-4 mt-4">
    <div class="row">
        <div class="col-xl-10 m-auto">
            
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form action="" method="post">

                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Old Password (for validation)</label>
                            <input class="form-control" name="old_pass" id="inputUsername" type="password" placeholder="Enter your old password" />
                        </div>
                        
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Password</label>
                            <input class="form-control" name="password" id="inputUsername" type="password" placeholder="Enter your new password" />
                        </div>
                        
                    
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Confirm Password</label>
                            <input class="form-control" name="c_password" id="inputEmailAddress" type="password"/>
                        </div>
                           
                            
                        <button class="btn btn-primary" name="submit" type="submit">Save changes</button>
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