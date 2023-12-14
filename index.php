<?php  
	session_start();
	require "function.php";
	if (!isset($_SESSION['login'])) {
		header("location:newlogin.php");
		exit;
	}
	$queryakt = mysqli_query($conn, 'SELECT * FROM pengunjung');
	$jml_akt = mysqli_num_rows($queryakt);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<link rel="stylesheet" type="text/css" href="v1.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="font/css/all.css">
	<title> Dashboard </title>
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href=""> KELOMPOK 6 </h1>
			<ul>
				<li><a href="index.php"> Dashboard </a></li>
				<li><a href="data-aktual.php"> Data Aktual </a></li>							
				<li><a href="forecasting.php"> Forecasting </a></li>				
				<li><a href="user-profil.php"> Profil </a></li>
				<li><a href="about-us.php"> Tentang </a></li>
				<li><a href="logout.php"> Logout </a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Dashboard</h3>
			<div class="box">
				<div class="col-3">
					<div class="panel-header">						
						<h3><i class="fa-solid fa-file-pen"></i> Data Nilai Tukar Petani Nasional </h3>
						<hr>
					</div>
					<div class="panel-body">
						<p><?php echo $jml_akt?></p>
						<hr>
					</div>
					<div class="panel-footer">
						<a href="data-aktual.php"> Tabel Data Aktual >> </a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small> Copyright &copy; Forecasting Kelompok 6</small>
		</div>
	</footer>
</body>
</html>