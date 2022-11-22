<?php require_once "register_process.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
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
            <div class="col-md-4 offset-md-4 form">
                <form action="forgot-password.php" method="POST" autocomplete="">
                    <h2 class="text-center">Forgot Password</h2>
                    <p class="text-center">Enter your email address</p>
                    <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Enter email address" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check-email" value="Continue">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>