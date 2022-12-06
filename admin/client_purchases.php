<?php
require('../settings/core.php'); 
require('../controllers/cart_controller.php');
if (check_permission() != 1) {
    header('Location: ../login/login-user.php');
  }
?>
<!doctype html>
 <html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Afybas Admin Dashboard</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  
    <link rel="apple-touch-icon" href="https://drive.google.com/file/d/1a8CEeSSus9KlJkF0LZj8f-w0PqfEJnc1/view?usp=share_link">
    <link rel="shortcut icon" href="https://drive.google.com/file/d/1a8CEeSSus9KlJkF0LZj8f-w0PqfEJnc1/view?usp=share_link">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="menu-title">General</li>
                    <li>
                        <a href="index.php"><i class="menu-icon fa fa-dashboard"></i>Dashboard</a> 
                    </li>
                    <li class="active">
                        <a href="client_purchases.php"><i class="menu-icon fa fa-dollar"></i>Client Purchases</a> 
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-shopping-bag"></i>Brands</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="add_brand.php">Add Brand</a></li>
                            <li><i class="fa fa-table"></i><a href="brands.php">View brand</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-tag"></i>Categories</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-tag" style="color:black"></i><a href="add_category.php">Add Category</a></li>
                            <li><i class="fa fa-tag"  style="color:black"></i><a href="categories.php">View Categories</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-product-hunt "></i>Products</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-product-hunt" style="color:black"></i><a href="add_product.php">Add Product</a></li>
                            <li><i class="fa fa-product-hunt" style="color:black"></i><a href="products.php">View Products</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="log_out.php"><i class="menu-icon fa fa-sign-out"></i>Log Out</a> 
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"style=" height:40px; width:60px;"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..."
                                    aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>


                        <div class="user-area dropdown float-right">
                            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="fa fa-user fa-2x"></i>
                            </a>

                            <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="log_out.php"><i class="fa fa-power -off"></i>Log out</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
        </header>

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    
                                    <li class="active">Clients purchases</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Order list</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Order Id</th>
                                            <th>Customer ID</th>
                                            <th>Invoice Number</th>
                                            <th>Order Date</th>
                                            <th>Total Amount</th>
                                            <th>Order Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                            $orders = show_orders_controller(); 
                                            foreach($orders as $order){
                                              echo 
                                                    "
                                                    <tr>
                                                        <td>{$order['order_id']}</td>
                                                        <td>{$order['customer_name']}</td>
                                                        <td>{$order['invoice_no']}</td>
                                                        <td>{$order['order_date']}</td>
                                                        <td>{$order['amount']}</td>
                                                        <td>{$order['order_status']}</td>
                                                    </tr>
                                                    ";
                                                }

                                                 ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>

       

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>


</body>
</html>
