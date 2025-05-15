<?php 
 $error = "";
if(isset($_GET['error'])){
    $error = "Email Already Exits. Please Login Use that Email.";
} ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    

    <title>dressPrinting Book</title>

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

<style>
 .invalid{
    width:  270px;
    margin-top: 0.25rem;
    font-size: 0.875em;
    color: #dc3545;
 }
 strong{
    width:  100%;
 }
</style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                    </ul>
                    <ul class="navbar-nav ms-auto">

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
    <!-- Sign up form -->
    <section class="signup">
        <div class="container" style="font-family:verdana;">
            <div class="signup-content">
               
                <div class="signup-form">
                  
                    <h2 style="font-family:verdana" class="form-title">Register</h2>
                    <form method="POST" action="register_query.php"  class="register-form" >
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input style="font-family:verdana" type="text"  id="name" placeholder="Your Name" class="form-control " name="name" value="" required autocomplete="name" autofocus>
                          
                                    <span class="invalid" role="alert">
                                        <strong></strong>
                                    </span>
                                
                        </div>
                        <div style ="line-height: 180% ">
                  <br>
</div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input style="font-family:verdana" type="email" id="email" placeholder="Your Email" class="form-control " name="email" value="" required autocomplete="email">
                          
                                    <span style="width: 270px;"  class="invalid"  role="alert">
                                        <strong id="error_email"></strong>
                                    </span>
                               
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="contact"><i class="zmdi zmdi-email"></i></label>
                            <input style="font-family:verdana" type="tel"  id="contact" oninput="validatePhoneNumber()" placeholder="Your Phone Number" class="form-control " name="contact" required autocomplete="contact">
                          
                                    <span style="width: 270px;"  class="invalid"  role="alert">
                                        <strong id="error_contact"></strong>
                                    </span>
                               
                        </div>
                       
                      <br>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-email"></i></label>
                           
                                <input  style=" font-family:verdana;" id="password" type="password" placeholder= "Password" class="form-control " name="password" required autocomplete="new-password">
                                <span style=" width: 300px;" class="invalid"  role="alert">
                                    <strong id="error_password"></strong>
                                </span>
                           
                         
                        </div>

<br>
                        <div class="form-group">
                            <label style="margin-top:20px" for="password-confirm" class="zmdi zmdi-email"></label>

                          
                                <input  style="  font-family:verdana;" id="password-confirm" type="password" placeholder= "Password Confirmation" class="form-control" name="c_password" required autocomplete="new-password">
                          
                        </div>
                      
                        <span class="invalid"  role="alert">
                        <strong id="main_error"></strong>
                    </span>
                     <br>  
                        <div class="form-group form-button">
                            <button type="submit" style=" border: none;" onclick="return validateForm()" name="submit" class="form-submit"  class="form-group form-button">Register</button>
                        </div>
                    </form>
                   
                </div>
              
                <div class="signup-image">
                    <figure><img src="img/signup-image.jpg" alt="sing up image"></figure>
                    <a href="/login.php" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>
       
</div>
</main>

<script>

let error = document.getElementById("main_error");
error.textContent = "<?php echo $error ?>";

function validateForm() {
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var c_pass = document.getElementById("password-confirm").value;
            var errorMessage = document.getElementById("main_error");

          
            errorMessage.innerHTML = "";

            if (name === "" || email === "" || password === "" || c_pass === "") {
                errorMessage.innerHTML = "Please fill in all the details.";
                return false;
            } else if (password !== c_pass) {
                errorMessage.innerHTML = "Passwords do not match.";
                return false;
            }

          
   
        var password = document.getElementById("password").value;
        var resultMessage = document.getElementById("error_password");
   
        resultMessage.innerHTML = "";
   
        if (password.length < 8) {
            resultMessage.innerHTML += "Password must be at least 8 characters long.<br>";
            return false;
        }
       
        if (!/[A-Z]/.test(password)) {
            resultMessage.innerHTML += "Password must contain at least one uppercase letter.<br>";
            return false;
        }
     
        if (!/[a-z]/.test(password)) {
            resultMessage.innerHTML += "Password must contain at least one lowercase letter.<br>";
            return false;
        }
     
        if (!/\d/.test(password)) {
            resultMessage.innerHTML += "Password must contain at least one digit.<br>";
            return false;
        }
     

   
            var email = document.getElementById("email").value;
            var resultMessage = document.getElementById("error_email");

          
            resultMessage.innerHTML = "";

        
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+(\.[^\s@]+)*$/;

          
            if (!emailRegex.test(email)) {
                resultMessage.innerHTML = "Please enter a valid email address.";
                return false;
            }

            return true; 
    }


    function validatePhoneNumber() {
            let phoneNumberInput = document.getElementById('contact');
            let errorSpan = document.getElementById('error_contact');
            
           
            let numericPhoneNumber = phoneNumberInput.value.replace(/[^\d-]/g, '');

         
            if (numericPhoneNumber.length >= 10 || /^(\d{3}-){2}\d{4}$/.test(numericPhoneNumber)) {
                errorSpan.textContent = '';
            } else {
                errorSpan.textContent = 'Please enter a valid phone number';
                phoneNumberInput.value = numericPhoneNumber;
            }
        }
</script>
</body>
</html>


