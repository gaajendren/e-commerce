<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" style="" id="accordionSidebar">

<?php require 'path.php' ?>
<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon ">
       <img width="50px" height="50px" style="border-radius: 50%;" src="<?php echo $imagePath ?>">
    </div>
    <div class="sidebar-brand-text mx-3">Admin Portal</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="<?php echo $dashboard ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Product</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Product :</h6>
            <a class="collapse-item" href="<?php echo $list_product ?>">List Product</a>
            <a class="collapse-item" href="<?php echo $add_product ?>">Add Product</a>
        </div>
    </div>
</li>
            <li class="nav-item">
                    <a class="nav-link" href="<?php echo $order ?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Orders</span></a>
            </li>


<hr class="sidebar-divider">


<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>