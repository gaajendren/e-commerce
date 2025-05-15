<?php include '../admin_sesion.php'?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Portal</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        .text-dark , table , body{
            color:black;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

     
      <?php include '../sidebar.php' ?>
        

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <?php include '../top_bar.php' ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

    <div class="col-xl-12">  
        <div class="card mb-4">
            <div class="card-header d-flex w-100 align-items-center justify-content-between">Account Details
            <a href="<?php echo $list_product ?>"><button class="btn btn-primary d-flex ">Back</button></a>
            </div>
                <div class="card-body">
                    <form action="add_product_query.php" method="post" enctype= multipart/form-data>
                    <div class="col-xl-10">
                                <label for="">Product Picture</label>
                                <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="customFile" name="image" required>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                    <div class="mb-3 small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>

   
                        <div class="mb-3"><label for="exampleFormControlInput1">Product Name: </label><input class="form-control form-control-solid" id="exampleFormControlInput1" type="text" name="name" placeholder="Your Product Name" required></div>
                        <div class="mb-3"><label for="exampleFormControlInput2">Product Price: </label><input class="form-control form-control-solid" id="exampleFormControlInput2" type="number" name="price" placeholder="Product Price" required></div>
                        <div class="mb-3"><label for="exampleFormControlInput3">Quantity: </label><input class="form-control form-control-solid" id="exampleFormControlInput3" type="number" name="quantity" placeholder="Quantity" required></div>
                               
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1">Brand: </label><select class="form-control form-control-solid" name="brand" id="exampleFormControlSelect1">
                                <option value="Nike">Nike </option>
                                <option value="Gucci">Gucci </option>
                                <option value="Polo">Polo</option>
                                <option value="Adidas">Adidas </option>
                                <option value="Zara">Zara</option>
                            </select>
                        </div>
                        <div class="mb-3">
                        <label for="size">Size:</label>
                            <div class="form-check">
                                <input class="form-check-input"  type="checkbox" name="size[]" value="s" id="sizeS">
                                <label class="form-check-label" for="sizeS">Small</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="size[]" value="m" id="sizeM">
                                <label class="form-check-label" for="sizeM">Medium</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input"  type="checkbox" name="size[]" value="l" id="sizeL">
                                <label class="form-check-label" for="sizeL">Large</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input"  type="checkbox" name="size[]" value="xl" id="sizeXL">
                                <label class="form-check-label" for="sizeXL">Extra large</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="size[]" value="2xl" id="size2XL">
                                <label class="form-check-label" for="size2XL">Double Extra large</label>
                            </div>
                        </div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlSelect3">Category: </label><select class="form-control form-control-solid" name="category" id="exampleFormControlSelect3">
                                <option value="best-selling">Best Selling</option>
                                <option value="new-arrivals">New Arrivals</option>
                                <option value="hot-sales">Hot Sales</option>
                            </select>
                        </div>

                        <div class="mb-3"><label for="exampleFormControlInput5">Dress Material Type: </label><input class="form-control form-control-solid" id="exampleFormControlInput5" type="text" name="material" placeholder="Dress material type"></div>
                  
                        <div class="mb-0"><label for="exampleFormControlTextarea1">Description:</label><textarea class="form-control form-control-solid" id="exampleFormControlTextarea1" name="description" rows="3"></textarea></div>       
                        <button class="mt-4 btn btn-primary" name="submit" type="submit">Add Product</button>
                    </form>
                </div>
            </div>
        </div>    <!-- End of Main Content -->
    </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>
    <script>
    $(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});</script>
</body>

</html>