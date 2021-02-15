<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> eCommerce</title>
        <!-- <?=$domain_title?> | <?=$meta_title?> --> 
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url()?>awedget/plugins/fontawesome-free/css/all.min.css">    
    <!-- Favicon -->
    <link rel="icon" type="image/ico" href="<?=base_url()?>awedget/img/mini_logo.png"/>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="<?=base_url()?>awedget/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <!-- Select2 -->
   <link rel="stylesheet" href="<?=base_url()?>awedget/plugins/select2/css/select2.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?=base_url()?>awedget/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?=base_url()?>awedget/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url()?>awedget/css/adminlte.min.css">
    <link rel="stylesheet" href="<?=base_url()?>awedget/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?=base_url()?>awedget/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?=base_url()?>awedget/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?=base_url()?>awedget/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- jQuery -->
   <script src="<?=base_url()?>awedget/plugins/jquery/jquery.min.js"></script>
   <script src="<?=base_url()?>awedget/plugins/jquery-validation/dist/jquery.validate.js"></script>
   <script src="<?=base_url()?>awedget/plugins/chart.js/Chart.min.js"></script>
   <script src="<?=base_url()?>awedget/plugins/flot/jquery.flot.js"></script>

   <script type="text/javascript">var hostname='<?php echo base_url();?>';</script>

    <!-- Custom Style -->
    <link rel="stylesheet" href="<?=base_url()?>awedget/css/wizard.css">
    <link rel="stylesheet" href="<?=base_url()?>awedget/css/custom.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
               <a href="index3.html" class="nav-link">Home</a>
               </li>
               <li class="nav-item d-none d-sm-inline-block">
               <a href="#" class="nav-link">Contact</a>
               </li> -->
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                     <!-- <b><?=$userDetails->first_name?> (<?=$userDetails->user_group_description;?>)</b>   -->
                     <img src="<?=base_url()?>awedget/img/default-profile-img.png" class="img-circle" alt="User Image" style="max-height: 30px;">
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <!-- <a href="<?=base_url('my_profile')?>" class="dropdown-item">
                    My Profile
                   <span class="float-right text-muted text-sm"><i class="fas fa-user mr-2"></i></span>
                 </a> -->
                 <!-- <div class="dropdown-divider"></div>
                     <a href="<?=base_url('my_profile/change_password')?>" class="dropdown-item">
                    Change Password
                   <span class="float-right text-muted text-sm"><i class="fas fa-envelope mr-2"></i></span>
                 </a> -->
                 <div class="dropdown-divider"></div>
                 <a href="<?=base_url('logout')?>" class="dropdown-item">
                    Logout
                   <span class="float-right text-muted text-sm"><i class="fas fa-sign-out-alt mr-2"></i></span>
                 </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?=base_url('dashboard')?>" class="brand-link">
                <img src="<?=base_url()?>awedget/img/eCommercs.png" alt="Logo"
                    class="brand-image elevation-3" style="max-width: 185px; max-height: 80px;">
                <span class="brand-text font-weight-bold" > AP </span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?=base_url('dashboard')?>" class="nav-link <?=active_menu_class('dashboard')?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p> Dashboard </p>
                            </a>
                        </li>

                        <?php if ($this->ion_auth->in_group(array('admin'))){ ?>
                        <li class="nav-item has-treeview <?=active_menu_open('manage_user')?>">
                            <a href="#" class="nav-link <?=active_menu_class('manage_user')?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p> <i class="fas fa-angle-left right"></i> Manage Users </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?=base_url('manage_user/create_user')?>"
                                        class="nav-link <?=active_menu_method('create_user')?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add User</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?=base_url('manage_user/user_list')?>" class="nav-link <?=active_menu_method('user_list')?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Users</p>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>

                        <li class="nav-item has-treeview <?=active_menu_open('settings')?>">
                            <a href="#" class="nav-link <?=active_menu_class('settings')?>" >
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                  <i class="fas fa-angle-left right"></i>
                                    Settings
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?=base_url()?>settings/brand" class="nav-link <?=active_menu_method('brand')?> <?=active_menu_method('brand_edit')?> <?=active_menu_method('brand_add')?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Brand</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?=base_url()?>settings/product_category" class="nav-link <?=active_menu_method('product_category')?> <?=active_menu_method('product_category_edit')?> <?=active_menu_method('product_category_add')?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Product Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?=base_url()?>settings/product_sub_category" class="nav-link <?=active_menu_method('product_sub_category')?> <?=active_menu_method('product_sub_category_add')?> <?=active_menu_method('product_sub_category_edit')?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Product Sub Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?=base_url()?>settings/item" class="nav-link <?=active_menu_method('item')?> <?=active_menu_method('item_add')?> <?=active_menu_method('item_edit')?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Item</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>

                        <li class="nav-item">
                            <a href="<?=base_url()?>logout" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    <i class="fas fa-sign-out-alt text-danger right"></i>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content BODY Information -->
        <div class="content-wrapper">