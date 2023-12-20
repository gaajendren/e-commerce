<?php
session_start();

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    header('Location: homepage.php');
}
 ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    

    <title>Printing Book</title>

    <!-- Scripts -->
    <script src="js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href='css/app.css' rel="stylesheet">
    
<link rel="stylesheet" href="fonts/material-design-iconic-font.min.css">

<!-- Main css -->
<link rel="stylesheet" href="css/style1.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                       
                                <li class="nav-item">
                                    <a style="font-family:verdana;" class="nav-link" href="login.php">Login</a>
                                </li>
                           
                                <li class="nav-item">
                                    <a style="font-family:verdana;" class="nav-link" href="signUp.php">Register</a>
                                </li>
                          
                            <li class="nav-item " >
                                <a id="navbarDropdown" class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" style="position:relative; display:hidden; padding-left:50px;" aria-expanded="false" v-pre >
                           
                                  Company Name
                                </a>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
        
            <section class="sign-in">
                <div class="container"style="font-family:verdana;">
                    <div class="signin-content">
                        <div class="signin-image">
                            <figure><img src="img/signin-image.jpg" alt="sing up image"></figure>
                            <a href="/register" class="signup-image-link">Create an account</a>
                        </div>
    
                        <div class="signin-form">
                            <h2 class="form-title" style="font-family:verdana;">Login</h2>
                            <form method="POST" action="login_query.php" class="register-form">
                           
                                <div class="form-group">
                                    <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                    <input style="font-family:verdana;" type="text" name="email" id="email" placeholder="Email"class="form-control " name="email" value="" required autocomplete="email" autofocus>
                                   
                                        <span class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span>
                                   
                                </div>
                                <div class="form-group">
                                    <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                    <input style="font-family:verdana;" type="password" name="password" id="password" placeholder="Password"class="form-control " name="password" required autocomplete="current-password">
                                  
                                        <span class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span>
                                  
                                </div>
                           
                                
                                <div class="form-group form-button">
                                    <button type="submit" name="submit" style=" border: none;"  class="form-submit"  class="form-group form-button">Log in</button>
                                  
                                    <br></br>
                                        <a   class="btn btn-link" style="padding: 0px;" href="forget_password.php">
                                         Forgot Password
                                        </a>                               
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
            </section>
        </div>      
        </main>
    </div>
</body>
</html




