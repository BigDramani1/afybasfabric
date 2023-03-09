<?php 
require __DIR__.'/settings/core.php';
require __DIR__.'/controllers/cart_controller.phpp';
require __DIR__.'/controllers/product_controller.phpp';

 $user_role = isset($_SESSION['user_role'])? $_SESSION['user_role']: "";
if ($user_role != 2 and empty($_SESSION['customer_id'])) {
  session_unset();
session_destroy();
	$link="login/index.php";
    $cart="login/index.php";

}
else{
	$link="history.php";
    $cart="cart.php";
}
$customer_id = isset($_SESSION['customer_id'])? $_SESSION['customer_id']: "";
 // this is for cart counting
    $cart_count = cart_count_controller($customer_id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Afrikanah Store: Home</title>
    <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Favicon icon-->
  <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/logo1.png">

  <!-- Libs CSS -->
  <link href="assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="assets/libs/feather-webfont/dist/feather-icons.css" rel="stylesheet" />
  <link href="assets/libs/slick-carousel/slick/slick.css" rel="stylesheet" />
  <link href="assets/libs/slick-carousel/slick/slick-theme.css" rel="stylesheet" />
  <link href="assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet" />
  <link href="assets/libs/nouislider/dist/nouislider.min.css" rel="stylesheet">
  <link href="assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
  <link href="assets/libs/dropzone/dist/min/dropzone.min.css" rel="stylesheet" />
  <link href="assets/libs/prismjs/themes/prism-okaidia.min.css" rel="stylesheet">

  <!-- Theme CSS -->
  <link rel="stylesheet" href="assets/css/theme.min.css">
</head>
<body>
  <style>
    .fa.fa-instagram {
  color: transparent;
  background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
  background: -webkit-radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
  background-clip: text;
  -webkit-background-clip: text;
}
  </style>
  <!-- navigation -->
  <header>

    <div class="navbar navbar-light py-lg-4 pt-3 px-0 pb-0">
      <div class="container">
        <div class="row w-100 align-items-center g-lg-2 g-0">
          <div class="col-xxl-2 col-lg-3">
            <a class="navbar-brand d-none d-lg-block" href="index.php">
              <img src="assets/images/logo/logo.png" style="height:100px;">
            </a>
            <div class="d-flex justify-content-between w-100 d-lg-none">
              <a class="navbar-brand" href="index.php">
                <img src="assets/images/logo/logo.png" style="width:100px">
              </a>
              <div class="d-flex align-items-center lh-1">

                <div class="list-inline me-2">
                  <div class="list-inline-item">

                    <a href="<?php echo $link; ?>"><i class='fa fa-user' style="font-size:20px;    
                     color:#284b70"></i></a>
                  </div>
                  <div class="list-inline-item">
                    <a href="<?php echo $cart; ?>" class="text-muted position-relative"><i class="fa fa-shopping-cart"
                      style="font-size:20px; color:#E75480"></i>
                    <span class="position-absolute translate-middle badge rounded-pill bg-dark">
                    <?php
                    if($cart_count['counting']== 0){
                      echo "0";
                    } else{
                      echo $cart_count['counting'];
                    }
                    ?>
                    </span>
                  </a>
                  </div>

                </div>
                <!-- Button -->
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas"
                  data-bs-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false"
                  aria-label="Toggle navigation">
                  <span class="icon-bar top-bar mt-0"></span>
                  <span class="icon-bar middle-bar"></span>
                  <span class="icon-bar bottom-bar"></span>
                </button>

              </div>
            </div>

          </div>
          <div class="col-xxl-6 col-lg-5 d-none d-lg-block">
          <form action="action/all_process.php" method="GET">
                  <div class="input-group">
                    <input type="text" class="form-control" id="inputModalSearch" name="query" placeholder="Search ..." >
                    <button type="submit" name=search class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
                </form>
          </div>
          <div class="col-md-2 col-xxl-3 d-none d-lg-block">
          </div>
          <div class="col-md-2 col-xxl-1 text-end d-none d-lg-block">
            <div class="list-inline">
              <div class="list-inline-item">
                <a href="<?php echo $cart; ?>" class="text-muted position-relative"><i class="fa fa-shopping-cart"
                  style="font-size:20px; color:#E75480"></i>
                <span class="position-absolute translate-middle badge rounded-pill bg-dark">
                <?php
                    if($cart_count['counting']== 0){
                      echo "0";
                    } else{
                      echo $cart_count['counting'];
                    }
                    ?>
                </span>
              </a>
              </div>
              <div class="list-inline-item">

                <a href="<?php echo $link; ?>"><i class='fa fa-user' style="font-size:20px; color:#284b70"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="border-bottom pb-lg-4 pb-3">
    <nav class="navbar navbar-expand-lg navbar-light navbar-default pt-0 pb-0">
      <div class="container px-0 px-md-3">
        <div class="offcanvas offcanvas-start p-4 p-lg-0" id="navbar-default">

          <div class="d-flex justify-content-between align-items-center mb-2 d-block d-lg-none">
            <a href="index.php"> <img src="assets/images/logo/logo.png" style="width:200px"></a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="d-none d-lg-block">
            <ul class="navbar-nav ">
              <li class="nav-item dropdown">
                <a class="nav-link" href="index.php" role="button">
                  Home
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Categories
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="shoes.php">
                      &nbsp; Shoes</a></li>
                  <li><a class="dropdown-item" href="bags.php">
                      &nbsp; Bags</a></li>
                      <li><a class="dropdown-item" href="clothing.php">
                      &nbsp; Clothing</a></li>
                  <li><a class="dropdown-item" href="fabrics.php">
                      &nbsp; Fabrics</a></li>
                  <li><a class="dropdown-item" href="accessories.php">
                      &nbsp; Accessories</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="about.php" role="button">
                  About Us
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php" role="button" aria-expanded="false">
                  Contact
                </a>
              </li>
            </ul>
          </div>
          <div class="d-block d-lg-none">
            <ul class="navbar-nav ">
              <li class="nav-item">
                <form action="action/all_process.php" method="GET">
                  <div class="input-group">
                    <input type="text" class="form-control" id="inputModalSearch" name="query" placeholder="Search ..." >
                    <button type="submit" name=search class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
                </form>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php">
                  Home
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Categories
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="shoes.php">
                    &nbsp; Shoes</a></li>
                <li><a class="dropdown-item" href="bags.php">
                    &nbsp; Bags</a></li>
                    <li><a class="dropdown-item" href="clothing.php">
                    &nbsp; Clothing</a></li>
                <li><a class="dropdown-item" href="fabrics.php">
                    &nbsp; Fabrics</a></li>
                <li><a class="dropdown-item" href="accessories.php">
                    &nbsp; Accessories</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php" role="button" aria-expanded="false">
                  About Us
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="contact.php" role="button">
                  Contact
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </div>
  <main>
      <section class="mt-8">
   <div class="container">
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <ol class="carousel-indicators">
    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active" style="background-color:#434754; border-radius: .5rem;">
      <div class="container">
        <div class="row p-5">
            <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                <img class="img-fluid" src="assets/images/logo/couple.png" alt="" style="height:600px">
            </div>
            <div class="col-lg-6 mb-0 d-flex align-items-center">
                <div class="text-align-left" style="padding-left:10px;">
                    <h1 class="h1 text-white">Our prices are Cheap!!!</h1>
                    <p class="text-white"> The starting price for everything is GH₵ 50</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="carousel-item" style="background-color:#284b70; border-radius: .5rem;">
      <div class="container">
        <div class="row p-5">
            <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                <img class="img-fluid" src="assets/images/logo/7.png" alt="" style="height:600px">
            </div>
            <div class="col-lg-6 mb-0 d-flex align-items-center">
                <div class="text-align-left"  style="padding-left:10px;">
                    <h1 class="h1 text-white">Explore your true style</h1>
                    <p class="text-white"> Don't Hold Back!</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="carousel-item" style="background-color:#77a290; border-radius: .5rem;">
      <div class="container">
        <div class="row p-5">
            <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                <img class="img-fluid" src="assets/images/logo/shoe.png" alt="" style="height:600px">
            </div>
            <div class="col-lg-6 mb-0 d-flex align-items-center">
                <div class="text-align-left"  style="padding-left:10px;">
                    <h1 class="h1 text-white">See What We Have!!!</h1>
                    <p class="text-white"> We promise comfort!</p>
                </div>
            </div>
        </div>
    </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>
</div>
</section>
    <section class="mb-lg-10 mt-lg-14 my-8">
      <div class="container">
        <div class="row">
          <div class="col-12 mb-6">
            <h3 class="mb-0">Featured Categories</h3>
          </div>
        </div>
        <div class="category-slider">
          <div class="item"> <a href="shoes.php" class="text-decoration-none text-inherit">
            <div class="card card-product mb-lg-4">
              <div class="card-body text-center py-8">
                <img src="assets/images/logo/22.png" class="mb-3" height="85">
                <div class="text-truncate" style="font-size:16px">Shoes</div>
              </div>
            </div>
          </a></div>
          <div class="item"> <a href="bags.php" class="text-decoration-none text-inherit">
            <div class="card card-product mb-lg-4">
              <div class="card-body text-center py-8">
                <img src="assets/images/logo/21.png" class="mb-3" height="85">
                <div class="text-truncate"  style="font-size:16px">Bags</div>
              </div>
            </div>
          </a></div>
          <div class="item"> <a href="clothing.php" class="text-decoration-none text-inherit">
            <div class="card card-product mb-lg-4">
              <div class="card-body text-center py-8">
                <img src="assets/images/logo/25.png" class="mb-3" height="85">
                <div class="text-truncate"  style="font-size:16px">Clothing</div>
              </div>
            </div>
          </a></div>
          <div class="item"> <a href="fabrics.php" class="text-decoration-none text-inherit">
            <div class="card card-product mb-lg-4">
              <div class="card-body text-center py-8">
                <img src="assets/images/logo/24.png" class="mb-3" height="85" width="200">
                <div class="text-truncate" style="font-size:16px">Fabrics</div>
              </div>
            </div>
          </a></div>
            <div class="item"><a href="accessories.php" class="text-decoration-none text-inherit">
              <div class="card card-product mb-lg-4">
                <div class="card-body text-center py-8">
                  <img src="assets/images/logo/23.png" class="mb-3" height="85">
                  <div class="text-truncate" style="font-size:16px">Accessories</div>
                </div>
              </div>
            </a></div>
        </div>
      </div>
    </section>

    <!-- Popular Products End-->
    <section class="my-lg-14 my-8">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-6" style="text-align:center;">
            <h3 class="mb-0" style="padding-bottom:10px">Categories of the Month</h3>
            <a href="all_products.php" class="btn btn-primary">View All Product</a>
        </div>
        <div class="row row-cols-lg-3 row-cols-1 row-cols-md-2 g-4">
        <?php
        $products = select_6_products_controller();
        foreach ($products as $bag){
        echo"
          <div class=\"col\">
            <div class=\"card card-product\">
              <div class=\"card-body\">
                <div class=\"text-center  position-relative \"> <a href=\"product_detail.php?product_id={$bag["product_id"]}\"><img
                      src=\"assets/images/products/{$bag['image_1']}\" style=\"height:300px\" class=\"mb-3 img-fluid\"></a></div>
                      <div class=\"d-flex justify-content-between align-items-center mt-3\">
                      <a href='product_detail.php?product_id={$bag["product_id"]}' style='font-size:20px;'>{$bag['title']}</a>
                      <div><span style=\"font-size:16px; color:#277b35\">In stock</span></div>
                      </div>
                      <div class=\"d-flex justify-content-between align-items-center mt-3\">
                        <div><span style=\"font-size:16px; color:#277b35\">GH₵ {$bag['price']}</div>
                          <div><span style=\"font-size:16px; color:#DC143C\"><i class=\"fa fa-map-marker\"></i>{$bag['country']}</div>
                      </div>
                    </div>
                  </div>
                </div>";}
          ?>
      </div>
      <?php if(!$products){
            echo "<h3>😟Sorry, no product is available</h3>";
         }
         ?>
    </section>
  </main>


  <!-- Modal for displaying product -->
  <div class="modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body p-8">
          <div class="position-absolute top-0 end-0 me-3 mt-3">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <!-- img slide -->
              <div class="product productModal" id="productModal">
                <div class="zoom" onmousemove="zoom(event)" style="
                  background-image: url(assets/images/products/bikin2.jpg);
                ">
                  <!-- img -->
                  <img src="assets/images/products/bikin2.jpgF" style="height:400px" alt="" />
                </div>
                <div>
                  <div class="zoom" onmousemove="zoom(event)" style="
                    background-image: url(assets/images/products/bikini1.webp);
                  ">
                    <!-- img -->
                    <img src="assets/images/products/bikini1.webp" style="height:400px" alt="" />
                  </div>
                </div>
                <div>
                  <div class="zoom" onmousemove="zoom(event)" style="
                    background-image: url(assets/images/products/bikini2.webp);
                  ">
                    <!-- img -->
                    <img src="assets/images/products/bikini2.webp" style="height:400px" alt="" />
                  </div>
                </div>
                <div>
                  <div class="zoom" onmousemove="zoom(event)" style="
                    background-image: url(assets/images/products/bikini3.webp);
                  ">
                    <!-- img -->
                    <img src="assets/images/products/bikini3.webp"style="height:400px" alt="" />
                  </div>
                </div>
              </div>
              <!-- product tools -->
              <div class="product-tools">
                <div class="thumbnails row g-3" id="productModalThumbnails">
                  <div class="col-3">
                    <div class="thumbnails-img">
                      <!-- img -->
                      <img src="assets/images/products/bikin2.jpg" alt="" />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="thumbnails-img">
                      <!-- img -->
                      <img src="assets/images/products/bikini1.webp" alt="" />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="thumbnails-img">
                      <!-- img -->
                      <img src="assets/images/products/bikini2.webp" alt="" />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="thumbnails-img">
                      <!-- img -->
                      <img src="assets/images/products/bikini3.webp" alt="" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  </div>
  <footer class="footer">
  <div class="container">
    <div class="row">
          <div class="col-md-3">
            <h3 class="mb-4 text-white">Categories</h3>
            <ul class="nav flex-column border-top py-4">
              <li class="nav-item mb-2"><a href="shoes.php" class="nav-link"> Shoes</span></a></li>
              <li class="nav-item mb-2"><a href="bags.php" class="nav-link">Bags</a></li>
              <li class="nav-item mb-2"><a href="clothing.php" class="nav-link">Clothing</a></li>
              <li class="nav-item mb-2"><a href="fabrics.php" class="nav-link">Fabrics</a></li>
              <li class="nav-item mb-2"><a href="accessories.php" class="nav-link"> Accessories</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <h3 class="mb-4 text-white">Further Information</h3>
            <ul class="nav flex-column border-top py-4">
              <li class="nav-item mb-2"><a href="faq.php" class="nav-link">FAQ</a></li>
              <li class="nav-item mb-2"><a href="return_&_refund.php" class="nav-link">Return & Refund Policy</a></li>
              <li class="nav-item mb-2"><a href="login/seller_register.php" class="nav-link">Want to be a seller?</a></li>
              <li class="nav-item mb-2"><a href="faq.php" class="nav-link">Want to Report?</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <h3 class="mb-4 text-white">Get to know us</h3>
            <ul class="nav flex-column border-top py-4">
              <li class="nav-item mb-2"><a href="about.php" class="nav-link">Company</a></li>
              <li class="nav-item mb-2"><a href="about.php" class="nav-link">About</a></li>
              <li class="nav-item mb-2"><a href="privacy_policy.php" class="nav-link">Privacy Policy</a></li>
              <li class="nav-item mb-2"><a href="terms_and_conditions.php" class="nav-link">Terms and Conditions</a></li>
              <li class="nav-item mb-2"><a href="contact.php" class="nav-link">Help Center</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <h3 class="mb-4 text-white">Reach us on</h3>
            <ul class="nav flex-column border-top py-4">
              <li class="nav-item mb-2"><a href="https://wa.me/233548342821"><i class="fa fa-twitter fa-2x" style="color:#4169e1"></i> <span class='text-white'>Twitter</span></a></li>
              <li class="nav-item mb-2"><a href="https://wa.me/233548342821"><i class="fa fa-instagram fa-2x"></i><span class='text-white'>&nbsp; Instagram</span></a></li>
              <li class="nav-item mb-2">  <a href="https://wa.me/233548342821"><i class="fa fa-whatsapp fa-2x"style="color:green"></i> <span class='text-white'>&nbsp;WhatsApp</span></a></li>
            </ul>
          </div>
          <div class="border-top py-4">
      <div class="row align-items-center">
        <div class="col-lg-5 text-lg-start text-center mb-2 mb-lg-0">
          <ul class="list-inline mb-0">
            <li class="list-inline-item text-white">Our Payment Platforms</li>
            <li class="list-inline-item">
              <a href="#!"><img src="assets/images/payment/american-express.svg" alt=""></a>
            </li>
            <li class="list-inline-item">
              <a href="#!"><img src="assets/images/payment/mastercard.svg" alt=""></a>
            </li>
            <li class="list-inline-item">
              <a href="#!"><img src="assets/images/payment/visa.svg" alt=""></a>
            </li>
            <li class="list-inline-item">
              <a href="#!"><img src="assets/images/payment/momo.png" alt="" style='width:100px'></a>
            </li>
          </ul>
        </div>
        
      </div>
    </div>
    <div class="border-top py-4">
      <div class="row align-items-center" >
        <div class="col-md-12" style="text-align:center;"><span class="text-white">2022 © Copyright - All Rights Reserved. |
         Created by <a href="mailto:a.dramani@aisghana.org" style="color:yellow;">Dramani Alhassan</a></span></div>
      </div>
    </div>
</footer>
    <!-- Javascript-->
    <!-- Libs JS -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/jquery-countdown/dist/jquery.countdown.min.js"></script>
    <script src="assets/libs/slick-carousel/slick/slick.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="assets/libs/nouislider/dist/nouislider.min.js"></script>
    <script src="assets/libs/wnumb/wNumb.min.js"></script>
    <script src="assets/libs/rater-js/index.js"></script>
    <script src="assets/libs/prismjs/prism.js"></script>
    <script src="assets/libs/prismjs/components/prism-scss.min.js"></script>
    <script src="assets/libs/prismjs/plugins/toolbar/prism-toolbar.min.js"></script>
    <script src="assets/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>
    <script src="assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
    <script src="assets/libs/dropzone/dist/min/dropzone.min.js"></script>
    <script src="assets/libs/flatpickr/dist/flatpickr.min.js"></script>
    <script src="assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
    <!-- Theme JS -->
    <script src="assets/js/theme.min.js"></script>
</body>

</html>
