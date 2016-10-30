<?php
	ob_start();
	session_start();
	require_once 'db_connect.php';

	if(!isset($_SESSION['user'])) {
		header("Location: index.php");
		exit;
	}

	$res = mysql_query("SELECT * FROM user WHERE id=".$_SESSION['user']);
	$userRow = mysql_fetch_array($res);
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
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="home.php" class="navbar-brand">KCPU</a>
				</div> <!--/ navbar-header -->

				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="">Home</a></li>
						<li><a href="">Production</a></li>
						<li><a href="">Contact</a></li>
					</ul> <!--/ navbar-nav -->

					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expaned="false">
								<span class="glyphicon glyphicon-user">&nbsp; <?php echo $userRow['uesername']; ?>&nbsp;<span class="caret"></span></span>
							</a> <!--/ dropdown-toggle -->
							<ul class="dropdown-menu">
								<li><a href="logout.php?logout">
									<span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out
								</a></li>
							</ul> <!--/ dropdown-menu -->
						</li> <!--/ dropdown -->
					</ul> <!--/ navbar-right -->
				</div> <!--/ navbar-collapse collapse -->
			</div> <!--/ container -->
		</nav> <!--/ .navbar -->

		<!-- Bootstrap Javascript & jQuery plugin -->
		<script src="bootstrap/js/jquery.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>