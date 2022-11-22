<?php require_once "register_process.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a New Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
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
                <form action="new-password.php" method="POST" autocomplete="off">
                    <h2 class="text-center">New Password</h2>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
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
                        <input class="form-control" type="password" name="password" placeholder="Create new password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password"  name="cpassword" placeholder="Confirm your password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" id='submitting' name="change-password" value="Change">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../assets/js/script.js"></script>
</body>
</html>