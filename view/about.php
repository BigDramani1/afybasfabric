<?php 
require('../settings/core.php');
if (empty($_SESSION['id'])) {
	$link="../login/login-user.php";
    $cart="../login/login-user.php";
}
else{
	$link="../view/dash/dashboard.php";
    $cart="cart.php";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Afybas Fabric Haven - About Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="../assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/templatemo.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
    <link rel="stylesheet" href="../https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="../index.php">
            Afybas 
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="<?php echo $cart; ?>">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="<?php echo $link; ?>">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                    </a>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <section class="bg-success">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 text-white">
                    <h1>About Us</h1>
                    <p><span style="font-size:30px; font-family:'Noto Serif Oriya', serif;">
                    My name is Sandra Obiani Bonsu. I am the founder and CEO of <em>Afybas Fabric Haven</em>.
                    There's a saying that "Choosing the right fabric is the foundation to every style" and for that matter myself and my team are here to help you choose the perfect fabrics for your outfit styles. 
We deal in all kinds of fabrics including laces, brocades, crepe, chiffon, kaftan/senator fabrics and many more. </span>
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="../assets/img/owner.svg" alt="About Hero"style="height:690px" >
                </div>
            </div>
        </div>
    </section>
    <!-- Close Banner -->

    <!-- Start Section -->
    <section class="container py-5">
        <div class="row text-center pt-5 pb-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Our Services</h1>
                <p>
                    We provide full services at every step.
                </p>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-truck fa-lg"></i></div>
                    <h2 class="h5 mt-4 text-center">Delivery Services</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-handshake fa-lg"></i></div>
                    <h2 class="h5 mt-4 text-center">Trusted by thousands</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-percent"></i></div>
                    <h2 class="h5 mt-4 text-center">Promotions & Discounts</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-user"></i></div>
                    <h2 class="h5 mt-4 text-center">24 Hours Service</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section -->

    <!-- Start Brands -->
    <section class="bg-light py-5">
        <div class="container my-4">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Our Brands</h1>
                    <p>
                        We deal in Brocade, Lace, Polka, Cotton, Crepe, Satins and Silk Fabrics!!!
                    </p>
                </div>
                <div class="col-lg-9 m-auto tempaltemo-carousel">
    <div class="row d-flex flex-row">
        <!--Controls-->
        <div class="col-1 align-self-center">
            <a class="h1" href="#templatemo-slide-brand" role="button" data-bs-slide="prev">
                <i class="text-light fas fa-chevron-left"></i>
            </a>
        </div>
        <!--End Controls-->

        <!--Carousel Wrapper-->
        <div class="col">
            <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="templatemo-slide-brand" data-bs-ride="carousel">
                <!--Slides-->
                <div class="carousel-inner product-links-wap" role="listbox">

                    <!--First slide-->
                    <div class="carousel-item active">
                    <div class="row">
                                        <div class="col-md-3" style="width:200px; height:200px;">
                                                <a href="#"><img class="img-fluid brand-img" src="../assets/img/3.svg" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-md-3" style="width:200px; height:200px;">
                                                <a href="#"><img class="img-fluid brand-img" src="../assets/img/4.svg" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-md-3" style="width:200px; height:200px;">
                                                <a href="#"><img class="img-fluid brand-img" src="../assets/img/2.svg" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-md-3" style="width:200px; height:200px;">
                                                <a href="#"><img class="img-fluid brand-img" src="../assets/img/1.svg" alt="Brand Logo"></a>
                                            </div>
                                        </div>
                    </div>
                    <!--End First slide-->

                    <!--Second slide-->
                    <div class="carousel-item">
                    <div class="row">
                                        <div class="col-md-3" style="width:200px; height:200px;">
                                                <a href="#"><img class="img-fluid brand-img" src="../assets/img/5.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-md-3" style="width:200px; height:200px;">
                                                <a href="#"><img class="img-fluid brand-img" src="../assets/img/6.svg" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-md-3" style="width:200px; height:200px;">
                                                <a href="#"><img class="img-fluid brand-img" src="../assets/img/7.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-md-3" style="width:200px; height:200px;">
                                                <a href="#"><img class="img-fluid brand-img" src="../assets/img/3.svg" alt="Brand Logo"></a>
                                            </div>
                                        </div>
                    </div>
                    <!--End Second slide-->

                </div>
                <!--End Slides-->
            </div>
        </div>
        <!--End Carousel Wrapper-->

        <!--Controls-->
        <div class="col-1 align-self-center">
            <a class="h1" href="#templatemo-slide-brand" role="button" data-bs-slide="next">
                <i class="text-light fas fa-chevron-right"></i>
            </a>
        </div>
        <!--End Controls-->
    </div>
</div>
</div>
</div>
</section>
    <!--End Brands-->


    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Afybas Fabric Haven</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            Haatso Pear Street 4
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none">+233 553058208</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:sandybons28@gmail.com">sandybons28@gmail.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Products</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="shop.php">Brocade Fabrics</a></li>
                        <li><a class="text-decoration-none" href="shop.php">Lace Fabrics</a></li>
                        <li><a class="text-decoration-none" href="shop.php">Cotton Fabrics</a></li>
                        <li><a class="text-decoration-none" href="shop.php">Crepe Fabrics</a></li>
                        <li><a class="text-decoration-none" href="shop.php">Satins Fabrics</a></li>
                        <li><a class="text-decoration-none" href="shop.php">Silk Fabrics</a></li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="index.php">Home</a></li>
                        <li><a class="text-decoration-none" href="about.php">About Us</a></li>
                        <li><a class="text-decoration-none" href="contact.php">Shop Locations</a></li>
                        <li><a class="text-decoration-none" href="#">FAQs</a></li>
                        <li><a class="text-decoration-none" href="contact.php">Contact</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.facebook.com/profile.php?id=100075874705542&mibextid=ZbWKwL"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://instagram.com/afybas_fabric_haven?igshid=YmMyMTA2M2Y="><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href=""><i class="fab fa-tiktok fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://wa.me/233553058208"><i class="fab fa-whatsapp fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
               
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            2022 © Copyright - All Rights Reserved.
                            | Made By <a href="mailto:alhassan.dramani@ashesi.edu.gh">Dramani Alhassan </a>

                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->
    <!-- Start Script -->
    <script src="../assets/js/jquery-1.11.0.min.js"></script>
    <script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/templatemo.js"></script>
    <script src="../assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>