<?php
	ob_start();
	session_start();
	require_once 'db_connect.php';

	if(isset($_SESSION['user']) != "") {
		header("Location: home.php");
		exit;
	}

	$error = false;
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		function data_input($data) {
			$data = trim($data);
			$data = strip_tags($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$username = data_input($_POST['username']);
		$pass = data_input($_POST['password']);

		if(empty($username)) {
			$error = true;
			$userError = "Please Enter Correct Username";
		}

		if(empty($pass)) {
			$error = true;
			$passError = "Please Enter Correct Password";
		}

		if(!$error) {
			$password = hash('sha256', $pass);
			$res = mysql_query("SELECT id, username, password FROM user WHERE username='$username'");
			$row = mysql_fetch_array($res);
			$count = mysql_num_rows($res);

			if($count == 1 && $row['password'] == $password) {
				$_SESSION['user'] = $row['id'];
				header("Location: home.php");
			} else {
				$errMSG = "Invalid User Information!";
			}
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>KCPU || Production Management System</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/style.css">
	</head>
	<body>
		
		<header>
			<div class="container">
				<div class="site-heading">
					<h1>KCPU</h1>
					<h2>Knit Concern Printing Unit</h2>
				</div> <!--/ site-heading -->
			</div> <!--/ container -->
		</header> <!--/ header -->

		<section class="user-login">
			<div class="container">
				<div class="login-form">
					<header class="login-form-header">
						<h3>User Login</h3>
					</header> <!--/ login-form-header -->
					<hr>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off">
						<div class="col-md-12">

							<?php if(isset($errMSG)) { ?>
								<div class="form-group">
									<div class="alert alert-danger">
										<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
									</div> <!--/ alert alert-danger -->
								</div> <!--/ form-group -->
							<?php } ?>

							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
									<input type="text" name="username" class="form-control" placeholder="User Name" value="" maxlength="30">
								</div> <!--/ input-group -->
								<span class="text-danger"><?php echo $userError; ?></span>
							</div> <!--/ form-group -->

							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
									<input type="password" name="password" class="form-control" placeholder="Password" maxlength="15">
								</div> <!--/ input-group -->
								<span class="text-danger"><?php echo $passError; ?></span>
							</div> <!--/ form-group -->

							<div class="form-group">
								<button type="button" class="btn btn-block btn-info signin-btn" name="btn-login">Sign In</button>
							</div> <!--/ form-group -->
						</div> <!--/ col-md-12 -->
					</form> <!--/ end of form -->
				</div> <!--/ login-form -->
			</div> <!--/ .container -->
		</section> <!--/ .user-login -->

	</body>
</html>

<?php ob_end_flush(); ?>