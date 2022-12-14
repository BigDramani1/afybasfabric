<?php
require('../settings/core.php');
require('../controllers/product_controller.php');
require('../controllers/cart_controller.php');
$product = select_one_product_controller($_GET['product_id']);
if (empty($_SESSION['id'])) {
	$link="../login/login-user.php";
    $cart="../login/login-user.php";
}
else{
	$link="../view/dash/dashboard.php";
    $cart="cart.php";
}
$customer_id = isset($_SESSION['id'])? $_SESSION['id']: "";
 // this is for cart counting
    $cart_count = cart_count_controller($customer_id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Afybas Fabric Haven</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../assets/img/logo.svg">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo.svg">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/templatemo.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/slick-theme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    .forms{
    width: 10%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    color: #555;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
    box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
    }
</style>
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
                            <a class="nav-link" href="shop.html">Shop</a>
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
                    <input type="text" class="form-control" id="inputModalSearch" name="query" placeholder="Search ...">
                    <button type="submit" name=search class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3" >
                    <img src="../images/products/<?php echo htmlentities($product['product_image']); ?>" style="height:450px" alt="Card image cap" id="product-detail">
                    </div>
                    <div class="row"> 
                        <!--Start Controls-->
                        <!-- <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div> -->
                        <!--End Controls-->
                        <!--Start Carousel Wrapper-->
                        <!-- <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel"> -->
                            <!--Start Slides-->
                            <!-- <div class="carousel-inner product-links-wap" role="listbox"> -->

                                <!--First slide-->
                                <!-- <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-4" style="height:200px">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="../assets/img/1.jpg" style="height:120px" alt="Product Image 1">
                                            </a>
                                        </div>
                                        <div class="col-4" style="height:200px">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="../assets/img/4.jpg" style="height:120px" alt="Product Image 2">
                                            </a>
                                        </div>
                                        <div class="col-4" style="height:200px">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="../assets/img/5.jpg" style="height:120px" alt="Product Image 3">
                                            </a>
                                        </div>
                                    </div>
                                </div> -->
                                <!--/.First slide-->

                                <!--Second slide-->
                                <!-- <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="../assets/img/10.jpg" style="height:120px" alt="Product Image 4">
                                            </a>
                                        </div>
                                        <div class="col-4" >
                                            <a href="#">
                                                <img class="card-img img-fluid" src="../assets/img/2.jpg"  style="height:120px" alt="Product Image 5">
                                            </a>
                                        </div>
                                    </div>
                                </div> -->
                                <!--/.Second slide-->
                            <!-- </div> -->
                            <!--End Slides-->
                        <!-- </div> -->
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                        <!-- <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div> -->
                        <!--End Controls-->
                     </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 style="margin-bottom:10px;"><?php echo "{$product['product_title']}"; ?></h1>
                            <p class="h4"><strong>Price:</strong><?php echo" GH??? {$product['product_price']}";?></p>
                            <ul class="list-inline">
                                <!-- <li class="list-inline-item">
                                    <h6>Brand:<?php echo "{$product['product_brand']}"; ?></h6>
                                </li> -->
                                <li><strong>Warning</strong>
                                <i class="fa fa-warning fa-2x" style="color:red"></i>
                                <i class="fa fa-warning fa-2x" style="color:red"></i>
                                <i class="fa fa-warning fa-2x" style="color:red"></i></li>
                            </ul>
                           <p  style="font-size:16px; font-style:italic"><strong>Please reach out to us before and after you make payment. Either click on the whatsapp logo <a href="https://wa.me/233553058208" ><i class="fa fa-whatsapp fa-lg" style="color:green"></i></a> to chat with us or call us @ +233 553058208</strong></p>
                            <h6>Description:</h6>
                            <p>Dealers in all kinds of fabrics, including laces, brocades, crepe, chiffon, kaftan/senator fabrics and more. The other images shown on the left are some designs you can create with this material.</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Available Color:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p><?php echo "{$product['product_keywords']}"; ?></p>
                                </li>
                            </ul>
                            <form method = "post" action='../actions/add_to_cart.php'>
                                <input type="hidden" name="product-title" value="Activewear">
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Quantity
                                            </li>
                                            <input type="hidden" name="product_id" value= "<?php echo $product['product_id'] ?>">
                                            <button id="minus" class="btn btn-success">???</button>
                                            <input type="number" name="quantity" value="1" class="forms" id="input">
                                            <button id="plus" class="btn btn-success">+</button>
                                        </ul>
                                    </div>
                                <div class="row pb-3">              
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg" name="add_cart">Add To Cart</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

    <!-- Start Article -->
    <section class="py-5">
        <div class="container">
            <div class="row text-left p-2 pb-3">
                <h4>Related Products</h4>
            </div>
            <div class="row">
            <?php
                $displays = random_four_controller();
                foreach ($displays as $display) {
                    echo "
                <div class=\"col-md-3\">
                <div class=\"p-2 pb-3\">
                <input type='hidden' name='product_id' value={$display['product_id']}>
                    <div class=\"product-wap card rounded-0\">
                        <div class=\"card rounded-0\" style=\"height:200px\">
                            <img class=\"card-img rounded-0 img-fluid\" src='../images/products/{$display["product_image"]}'  style=\"height:200px\">
                            <div class=\"card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center\">
                                <ul class=\"list-unstyled\">
                                    
                                    <li><a class=\"btn btn-success text-white mt-2\" href=\"shop_detail.php?product_id={$display["product_id"]}\"><i class=\"far fa-eye\"></i></a></li>
                                    <li><a class=\"btn btn-success text-white mt-2\" href=\"shop_detail.php?product_id={$display["product_id"]}\"><i class=\"fas fa-cart-plus\"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class=\"card-body\">
                            <a href=\"view/shop_detail.php\" class=\"p text-decoration-none text-dark\">{$display['product_title']}</a>
                            <p class=\"card-text\">
                            <strong>GH??? {$display['product_price']}</strong>     &nbsp;{$display['product_yards']}
                            </p>
                        </div>
                    </div>
                </div>
                </div>";
                }
                ?>
        </div>
    </section>


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
<script>

const minusButton = document.getElementById('minus');
const plusButton = document.getElementById('plus');
const inputField = document.getElementById('input');

minusButton.addEventListener('click', event => {
  event.preventDefault();
  const currentValue = Number(inputField.value) || 0;
  inputField.value = currentValue - 1;
});

plusButton.addEventListener('click', event => {
  event.preventDefault();
  const currentValue = Number(inputField.value) || 0;
  inputField.value = currentValue + 1;
});
</script>

    <!-- Start Script -->
    <script src="../assets/js/jquery-1.11.0.min.js"></script>
    <script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/templatemo.js"></script>
    <script src="../assets/js/custom.js"></script>
    <!-- End Script -->

    <!-- Start Slider Script -->
    <script src="assets/js/slick.min.js"></script>
    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });
    </script>
    <!-- End Slider Script -->

</body>

</html>