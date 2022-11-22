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
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../../dash/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../dash/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <link rel="stylesheet" href="../../dash/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../dash/css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="shortcut icon" href="../../dash/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="dashboard.php"><img src="../images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img src="../images/logo-mini.svg" alt="logo"/></a>
        <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex" type="button" data-toggle="minimize">
          <span class="typcn typcn-th-menu"></span>
        </button>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item  d-none d-lg-flex">
            <a class="nav-link" href="#">
              Home
            </a>
          </li>
          <li class="nav-item  d-none d-lg-flex">
            <a class="nav-link" href="#">
              About Us
            </a>
          </li>
          <li class="nav-item  d-none d-lg-flex">
            <a class="nav-link" href="#">
              Shop
            </a>
          </li>
          <li class="nav-item  d-none d-lg-flex">
            <a class="nav-link" href="#">
              Contact Us
            </a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown  d-flex">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-cart mr-0"></i>
              <span class="count bg-danger">2</span>
            </a>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle  pl-0 pr-0" href="#" data-toggle="dropdown" id="profileDropdown">
              <i class="typcn typcn-user-outline mr-0"></i>
              <span class="nav-profile-name">Evan Morales</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
              <i class="typcn typcn-cog text-primary"></i>
              Settings
              </a>
              <a class="dropdown-item">
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
      <!-- partial -->
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
                  Kenneth Osborne
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
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card" style="position:relative; margin-left:auto; margin-right:auto">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Your Account</h4>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Full Name</label>
                      <input type="text" class="form-control" id="exampleInputUsername1">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">City</label>
                      <input type="text" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-check form-check-flat form-check-primary">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com</a> 2020</span>
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
  <!-- endinject -->
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
