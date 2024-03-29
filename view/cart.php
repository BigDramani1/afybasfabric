<?php
require('../settings/core.php');
require('../controllers/cart_controller.php');
if (empty($_SESSION['id'])) {
    $link = "../login/login-user.php";
    $cart = "../login/login-user.php";
} else {
    $link = "../view/dash/dashboard.php";
    $cart = "cart.php";
}
$customer_id = $_SESSION['id'];
$products = select_all_from_cart_controller($customer_id);
$amount = total_amount_controller($customer_id);


    // this is for cart counting
$cart_count = cart_count_controller($customer_id);

//  print_r($products);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Afybas Fabric Haven - Cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/templatemo.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"> <?php echo $cart_count['counting'];?></span>
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


    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Shopping Cart</h1>
            <p>
                Home - <span style="font-size:20px;color:green">Shopping Cart</span>
            </p>
        </div>
    </div>
    <!-- 
start carting -->
    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <h6><i class="fa fa-exclamation-circle" style="color:red;"></i>Delivery fee is going to be a separate payment and it fee is going to be based on your location</h6>
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead>
                        <tr>
                            <th>Product Image</th>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Update Quantity</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php foreach ($products as $product) {
                            $each_item =each_total_amount_controller($customer_id, $product['p_id']);
                            echo "
                        <tr>
                            <td><img src='../images/products/{$product['product_image']}' style=\"width:100px; height:100px;\"></td>
                            <input type='hidden' name='product_id' value= {$product['product_id']} ?>	
                            <td class=\"align-middle\"> {$product['product_title']}</td>
                            <td class=\"align-middle\">{$product['product_price']}</td>
                            <form method = 'post' action='../actions/update_quantity.php'>
                            <td class=\"align-middle\">
                            <input type='hidden' name='product_id' id='product_id' value= {$product['product_id']}>	
                            <input type='hidden' name='total' id='total' value= {$each_item['each_amount']}>	
                                <input style=\"width:50%; text-align:center;\" name='quantity' value={$product['qty']}>
                            </td>
                            <td class=\"align-middle\">{$each_item['each_amount']}</td>
                            <td class=\"align-middle\"> <input class='btn btn-success' name = 'updateQty' type = 'submit'  value = 'Update'></td>
                            <td class=\"align-middle\"><a href='../actions/remove_from_cart.php?product_id={$product['p_id']}' class=\"btn btn-sm btn-danger\"><i class=\"fa fa-times\"></i></a></td>
                            </form>
                            <div id=\"postData\"></div>
                        </tr>
                   ";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <div class="card border-success mb-5">
                    <div class="card-header" style="background-color:#17a2b8;">
                        <h4 class="font-weight-semi-bold m-0 text-white">Cart Summary</h4>
                    </div>
                    <form id='paymentForm'>
                        <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">GH₵<?php echo $amount['Amount'];?></h6>
                        </div>
                        <input type='hidden' id='amount'value='<?php echo $amount['Amount'];?>'>
                        <input type='hidden' id='email'value='<?php echo $_SESSION['email']; ?>'>
                    </div>
                        <button class="btn btn-success btn-lg" onclick="payWithPaystack()" style="width:100%;">Proceed To Checkout</button>
                    </div>
                    </form>
            
            </div>
        </div>
    </div>
    </div>
    <!-- Cart End -->

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
    <script src="../assets/js/jquery-1.11.0.min.js"></script>
    <script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/templatemo.js"></script>
    <script src="../assets/js/custom.js"></script>
    <!-- End Script -->
    <script src="https://js.paystack.co/v1/inline.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  const paymentForm = document.getElementById('paymentForm');
  paymentForm.addEventListener("submit", payWithPaystack, false);

  // PAYMENT FUNCTION
  function payWithPaystack(e) {
	e.preventDefault();
	let handler = PaystackPop.setup({
		key: 'pk_test_9a66f0be5bdc776def0d8776416b637dc1060720', // Replace with your public key
		email: document.getElementById("email").value,
		amount: document.getElementById("amount").value * 100,
        currency:'GHS',
		onClose: function(){
		alert('Window closed.');
		},
		callback: function(response){
			window.location = `../actions/processing.php?email=${document.getElementById("email").value}&amount=${document.getElementById("amount").value}&reference=${response.reference}`
            Swal.fire({
                title: 'Please Wait !',
                html: 'Payment processing',// add html attribute if you want or remove
                allowOutsideClick: false,
                showConfirmButton: false,
                willOpen: () => {
                    Swal.showLoading()
                },
            });
		}
	});
	handler.openIframe();
}
</script> 
</body>

</html>