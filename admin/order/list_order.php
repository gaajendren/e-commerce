<?php include '../admin_sesion.php'?>
<?php include 'controller.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://kit.fontawesome.com/ff3606fe13.js" crossorigin="anonymous"></script>
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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-black-800">Order </h1>
                   
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                       
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-9" style="display:flex; align-items:center;">
                                     <h6 class="m-0 font-weight-bold text-black" >Order List</h6> 
                                    </div>
                            </div>
                           
                        </div>
                        
                       
                        <div class="card-body">
                            <div class="table-responsive">
                                <table style="color:black;" class="table table-bordered" id="dataTable" width="100%" cellspacing="1">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Buyer Name</th>
                                            <th>Quantity</th>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th>Design</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 
                                    $list = index();     
                                    foreach ($list as $key => $data) {   
                                          $product =$data['product_id'] ;
                                           $order = show($product);
                                            $user = user($data['user_id']);
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-center" width="100%">
                                                    <div class="avatar me-2" width="100%"><img width="140px" height="110px" style="background-fit:fill" class="avatar-img" src="<?php 
                                                       echo $product_image.$order['img'] ?>" />   
                                                    </div>    
                                                </div>
                                            </td>
                                            <td><?php echo $order['prd_name']?></td>
                                            <td><?php echo $user['name']?></td>
                                           
                                            <td><?php echo $data['qty']?></td>
                                            <td><?php echo $data['color']?></td>
                                            <td><?php if($data['size'] == 's'){
                                                    echo 'Small';
                                            }else if($data['size'] == 'm'){
                                                echo 'Medium';
                                            }else if($data['size'] == 'l'){
                                                echo 'Large';
                                            }else if($data['size'] == 'xl'){
                                                echo 'Extra Large';
                                            }else{
                                                echo 'Double Extra Large';
                                            } ?></td>
                                            <td class="m-auto">
                                                <a class="btn btn-datatable btn-icon btn-transparent-dark m-auto d-flex justify-content-center align-items-center" 
                                                href="/dressPrinting/user/uploads/<?php echo $data['prd_design'] ?>" 
                                                download>
                                                    <i class="fas fa-download fa-sm"></i>
                                                </a>
                                            </td>
                                            <td><?php  if($data['status'] == 'Pending'){
                                                    $val = "btn btn-primary";
                                                }else if($data['status'] ==  'On Process'){
                                                    $val = "btn btn-info";
                                                }else if($data['status'] ==  'Paid'){
                                                        $val = "btn btn-info";
                                                }else if($data['status'] == 'Pending Pickup'){
                                                    $val = "btn btn-warning";
                                                }else if($data['status'] == 'Settle'){
                                                    $val = "btn btn-success";
                                                }else{
                                                    $val = "btn btn-danger";
                                                }?>
                                                <div class="<?php echo $val?>"><?php echo $data['status']?></div>
                                            </td>
                                            <td>
                                                <a class="btn btn-datatable btn-icon btn-transparent-dark p-1" href="<?php echo $edit_order . '?id=' . $data['id'] ?>"><i class="fa-solid fa-pen-to-square fa-sm"></i></a>
                                                
                                         </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
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
                    <a class="btn btn-primary" href="../product/login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script>

function confirmationDelete(anchor){
    
		let conf = confirm("Are you sure you want to delete this record?");
		if(conf){
			window.location = anchor.attr("href");
		}
	} 
    
    
   </script>

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

</body>

</html>