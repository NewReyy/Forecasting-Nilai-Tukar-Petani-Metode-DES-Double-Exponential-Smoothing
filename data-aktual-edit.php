<?php  
	session_start();
	require "function.php";
	if (!isset($_SESSION['login'])) {
		header("location:newlogin.php");
		exit;
	}
	$data = mysqli_query($conn, "SELECT * FROM pengunjung");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="v1.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="font/css/all.css">
	<title> Edit Data Aktual </title>
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
			<h3>Edit Data</h3>
			<div class="box">
				<?php
					$data_view= mysqli_query($conn, "SELECT * FROM pengunjung 
												WHERE id = '".$_GET['id']."' ");
					$row = mysqli_fetch_assoc($data_view);
				?>	
				<form method="post" action="">
				<p style="margin-bottom: 5px;">ID</p>
				<input type="text" name="id" class="input-control" value="<?php echo $row['id']?>" readonly>
				
				<p style="margin-bottom: 5px;">Bulan</p>
				<input type="text" name="bulan" class="input-control" value="<?php echo $row['bulan']?>" readonly>
				
				<p style="margin-bottom: 5px;">Nilai Tukar Petani</p>
				<input type="text" name="kunjungan" class="input-control" value="<?php echo $row['kunjungan']?>" requaired>	<br>
				<button type="submit" name="edit" class="edit">Ubah Data</button>
				</form>
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
		<?php 
			if(isset($_POST['edit'])){
				$update = mysqli_query($conn, "UPDATE pengunjung SET
						   	bulan = '".$_POST['bulan']."', 
						   	kunjungan = '".$_POST['kunjungan']."'
					    WHERE id = '".$_GET['id']."' ");
				if($update){
					echo "
					    <script>
					        alert('data berhasil diubah!');
					        document.location.href = 'data-aktual.php';
					    </script>
					";

				}else{
					echo "
					    <script>
					        alert('data gagal diubah!');
					        document.location.href = 'data-aktual.php';
					    </script>
					";
				}
			}
		?>