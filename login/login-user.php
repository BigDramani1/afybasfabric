<?php require_once "login_process.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>
<header>
		<span style="font-size:40px; color:#59ab6e">AFybas</span> 

		<ul class="navbar">
			<li><a href="../index.php">Home</a></li>
			<li><a href="../view/about.php">About Us</a></li>
			<li><a href="../view/shop.php">Shop</a></li>
			<li><a href="../view/contact.php">Contact</a></li>
		</ul>

		<div class="main">
			<a href="login-user.php" class="user"><i class="ri-user-fill" style="color:#59ab6e;"></i>Sign In</a>
			<a href="signup-user.php">Register</a>
			<div class="bx bx-menu" id="menu-icon"></div>
		</div>
	</header>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="login-user.php" method="POST" autocomplete="">
                    <h2 class="text-center">Login Form</h2>
                    <p class="text-center">Login with your email and password.</p>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address"  required onfocus="this.placeholder = ''" value="<?php echo $email ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Email must be eg. a.dramani@gmail.com">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" required>
                    </div>
                    <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Login">
                    </div>
                    <div class="link login-link text-center">Not yet a member? <a href="signup-user.php">Signup now</a></div>
                </form>
            </div>
        </div>
    </div>
    </section>
    <?php if(isset($_GET['message'])) : ?>
        <div class='flash-data' data-flashdata="<? $_GET['message'];?>"></div>
    <?php endif; ?>

    <script>
    const flashdata = $('.flash-data').data('flashdata');

        if(flashdata) {
            Swal.fire({
                icon: 'success',
                title: "Congratulations!",
                text: "Password has been changed!",
                type: "success" 
            }).then(function () {
                window.location.href = 'login-user.php';
            });
        }

    </script> 
    <script type="text/javascript" src="../assets/js/script.js"></script>
</body>
</html>