<?php
session_start();
if ($_SESSION['user_role'] != 2 and empty($_SESSION['id'])){
  header("Location: ../../login/login-user.php");// this will take the customer to a new page
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Afybas Dashboard</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../dash/vendors/typicons.font/font/typicons.css">
  <link rel="stylesheet" href="../../dash/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <link rel="stylesheet" href="../../dash/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../dash/css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="shortcut icon" href="../../dash/images/logo.svg" />
</head>

<body>
  <div class="container-scroller">
  <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="../dashboard.php"><img src="../images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../dashboard.php"><img src="../images/logo-mini.svg" alt="logo"/></a>
        <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex" type="button" data-toggle="minimize">
          <span class="typcn typcn-th-menu"></span>
        </button>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <ul class="navbar-nav mr-lg-2">
            <li class="nav-item  d-none d-lg-flex">
              <a class="nav-link" href="../../index.php">
                Home
              </a>
            </li>
            <li class="nav-item  d-none d-lg-flex">
              <a class="nav-link" href="../../about.php">
                About Us
              </a>
            </li>
            <li class="nav-item  d-none d-lg-flex">
              <a class="nav-link" href="../../shop.php">
                Shop
              </a>
            </li>
            <li class="nav-item  d-none d-lg-flex">
              <a class="nav-link" href="../../contact.php">
                Contact Us
              </a>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown  d-flex">
              <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="../cart.php">
                <i class="mdi mdi-cart mr-0"></i>
                <span class="count bg-danger">4</span>
              </a>
            </li>
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle  pl-0 pr-0" href="#" data-toggle="dropdown" id="profileDropdown">
                <i class="typcn typcn-user-outline mr-0"></i>
                <span class="nav-profile-name"><?php echo $_SESSION['name']; ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="../user/settings.php">
                <i class="typcn typcn-cog text-primary"></i>
                Settings
                </a>
                <a class="dropdown-item" href="../log_out.php">
                <i class="typcn typcn-power text-primary"></i>
                Logout
                </a>
              </div>
            </li>
          </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="typcn typcn-th-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <div class="d-flex sidebar-profile">
              <div class="sidebar-profile-image">
                <i class="fa fa-user fa-2x" style="color:white; margin-right:10px"></i>
                <span class="sidebar-status-indicator"></span>
              </div>
              <div class="sidebar-profile-name">
                <p class="sidebar-name">
                <?php echo $_SESSION['name']; ?>
                </p>
                <p class="sidebar-designation"style="color:white;">
                  Welcome
                </p>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../dashboard.php">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../purchases/purchases.php">
              <i class="fa fa-money menu-icon"></i>
              <span class="menu-title">My Purchases </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../favorites/favorites.php">
              <i class="mdi mdi-heart menu-icon"></i>
              <span class="menu-title">Favorite Materials </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../user/settings.php">
              <i class="mdi mdi-settings menu-icon"></i>
              <span class="menu-title">Settings</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../log_out.php">
              <i class="mdi mdi-exit-to-app menu-icon"></i>
              <span class="menu-title">Log out </span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">View Favorites</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Brand Name</th>
                          <th>Price</th>
                          <th>Title</th>
                          <th>View Product</th>
                          <th>Delete Product</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Brocade</td>
                          <td>GH??? 70</td>
                          <td>Material</td>
                          <td><button class="btn btn-success">View</button></td>
                          <td><button class="btn btn-primary">Delete</button></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>
            </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-center text-sm-left d-block d-sm-inline-block">Copyright ?? <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com</a> 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard </a>templates from Bootstrapdash.com</span>
            </div>
          </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../../dash/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../dash/js/off-canvas.js"></script>
  <script src="../../dash/js/hoverable-collapse.js"></script>
  <script src="../../dash/js/template.js"></script>
  <script src="../../dash/js/settings.js"></script>
  <script src="../../dash/js/todolist.js"></script>
 

</html>
