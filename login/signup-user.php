<?php require_once "register_process.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
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
            <div class="col-md-4 offset-md-4 form"  style="margin-top:160px;">
                <form action="signup-user.php" method="POST" autocomplete="">
                    <h2 class="text-center">Signup Form</h2>
                    <p class="text-center">It's quick and easy.</p>
                    <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" id="name" placeholder="Full Name" required value="<?php echo $name ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" id="email" placeholder="Email Address" required value="<?php echo $email ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="email must be eg. a.dramani@gmail.com">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="city" id="email" placeholder="City" required  value="<?php echo $city ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="phone" id="phone" placeholder="Phone Number" value="<?php echo $phone ?>" pattern="^[\W][0-9]{3}?[\s]?[0-9]{2}?[\s]?[0-9]{3}[\s]?[0-9]{4}$" title="Phone number should start with +233 and remaining 9 digit with 0-9. eg +233 548342821"> 
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" id="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="con_password" id="cpassword" placeholder="Confirm password" required >
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="signup" value="Signup">
                    </div>
                    <div class="link login-link text-center">Already a member? <a href="login-user.php">Login here</a></div>
                </form>
            </div>
        </div>
    </div>

        <script type="text/javascript" src="../assets/js/script.js"></script>
</body>
</html>