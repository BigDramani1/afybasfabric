<?php
require('../settings/core.php');
require('../controllers/product_controller.php');
require('../controllers/cart_controller.php');

if (empty($_SESSION['id'])) {
	$link="../login/login-user.php";
    $cart="../login/login-user.php";
}
else{
	$link="../view/dash/dashboard.php";
    $cart="cart.php";
}

if(isset($_GET['page']))
{
    $page = $_GET['page'];
}
else
{
    $page = 1;
}
$num_per_page = 6;
$start_from = ((int)$page-1)*6;
$search = $_GET['query'];

$customer_id = isset($_SESSION['id'])? $_SESSION['id']: "";
 // this is for cart counting
    $cart_count = cart_count_controller($customer_id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Afybas Fabric Haven Search</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../assets/img/logo.svg">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo.svg">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/templatemo.css">
    <link rel="stylesheet" href="../assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.php">
                Afybas
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
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
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i><span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"><?php echo $cart_count['counting'];?></span>
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
            <form action="../actions/search.php" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" value="<?php echo $_GET['query']; ?>" name="query" placeholder="Search ...">
                    <button type="submit" name=search class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-9">
                <div class="col-md-6">
                    <ul class="list-inline shop-top-menu pb-3 pt-1">
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none mr-3" href="#">All Results</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <?php
                $results = search_pagination_controller($search, $start_from, $num_per_page);
                foreach($results as $product){
                    echo "
                    <div class=\"col-md-4\">
                    <input type='hidden' name='product_id' value={$product['product_id']}>
                        <div class=\"card mb-4 product-wap rounded-0\">
                            <div class=\"card rounded-0\">
                                <img class=\"card-img rounded-0 img-fluid\" src='../images/products/{$product["product_image"]}' style=\"height:355px\">
                                <div class=\"card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center\">
                                    <ul class=\"list-unstyled\">
                                        <li><a class=\"btn btn-success text-white mt-2\" href=\"shop_detail.php?product_id={$product["product_id"]}\"><i class=\"far fa-eye\"></i></a></li>
                                        <li><a class=\"btn btn-success text-white mt-2\" href=\"shop_detail.php?product_id={$product["product_id"]}\"><i class=\"fas fa-cart-plus\"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class=\"card-body\">
                                <a href=\"shop_detail.php\" class=\"p text-decoration-none text-dark\"> {$product['product_title']}</a>
                                <p class=\"card-text\">
                                    <strong>GH??? {$product['product_price']}</strong>     &nbsp;{$product['product_yards']}
                                </p>
                            </div>
                        </div>
                    </div>";
                }if(!$results){
                    echo "Sorry no results found";
                 }
                ?>

                <div div="row">
                    <ul class="pagination pagination-lg justify-content-end">
                        <?php
                       
                        $total_record = search_count_controller($search);
                        $total_page = ($total_record/$num_per_page);
                        if ($page > 1) {
                            echo "<a class=\"page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark\" href='search.php?query=$search&page=" . ((int)$page - 1) . "'>Previous</a>";
                        }
                        for ($i = 1; $i < $total_page; $i++) {

                            echo "  <a class=\"page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark\" href='search.php?query=$search&page=". $i. "'>$i</a>";
                        }
                        if ($i > $page) {
                            echo "<a class=\"page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark\" href='search.php?query=$search&page=" . ((int)$page + 1) . "'>Next</a>";
                        }
                        ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- End Content -->


    <!-- Start Footer -->
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
                            2022 ?? Copyright - All Rights Reserved.
                            | Made By <a href="mailto:alhassan.dramani@ashesi.edu.gh">Dramani Alhassan </a>

                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- Start Script -->
    <script src="../assets/js/jquery-1.11.0.min.js"></script>
    <script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/templatemo.js"></script>
    <script src="../assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>