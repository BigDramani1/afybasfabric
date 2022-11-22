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
    <title>Code Verification</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
            <div class="col-md-4 offset-md-4 form">
                <form action="reset_password_otp.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Code Verification</h2>
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
                        <input class="form-control" type="number" name="otp" placeholder="Enter verification code">
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="reseting" value="Submit">
                    </div>
                    <div class="link login-link text-center">Didn't receive it? <input type="submit" value="Click Here"name="resending" class="btn btn-success"></a></div>
                </form>
            </div>
        </div>
    </div>
    <?php if(isset($_GET['message'])) : ?>
        <div class='flash-data' data-flashdata="<? $_GET['message'];?>"></div>
    <?php endif; ?>

    <script>
    const flashdata = $('.flash-data').data('flashdata');

        if(flashdata) {
            Swal.fire({
                icon: 'success',
                title: "Verification sent!",
                text: "A new verification code has been sent to you",
                type: "success" 
            });
        }

    </script> 
</body>
</html>

