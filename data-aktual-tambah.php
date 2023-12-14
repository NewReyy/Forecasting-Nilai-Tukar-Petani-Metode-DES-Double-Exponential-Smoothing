<?php  
	session_start();
	require "function.php";
	if (!isset($_SESSION['login'])) {
		header("location:newlogin.php");
		exit;
	}
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
	<title> Tambah Data Aktual </title>
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
			<h3>Tambah Data</h3>
			<div class="box">
				<form method="post" action="">
					<p style="margin-bottom: 5px;">Bulan</p>
					<input type="month" name="bulan" class="input-control" required>
					
					<p style="margin-bottom: 5px;">Nilai Tukar Petani</p>
					<input type="text" name="kunjungan" class="input-control" requaired><br>

					<button type="submit" name="tambah" class="tambah">Tambah Data</button>
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
			if(isset($_POST['tambah'])){
				$bulan = $_POST['bulan'];
				$hrg = $_POST['kunjungan'];

				$tahun = substr($bulan,0,4);
				$bln = substr($bulan,5,2);
				$tanggal = substr($bulan,8,2);

				if ($bln == 01) {
					$bulan = 'Jan';
				}elseif ($bln == 02) {
					$bulan = 'Feb';
				}elseif ($bln == 03) {
					$bulan = 'Mar';
				}elseif ($bln == 04) {
					$bulan = 'Apr';
				}elseif ($bln == 05) {
					$bulan = 'Mei';
				}elseif ($bln == 06) {
					$bulan = 'Jun';
				}elseif ($bln == 07) {
					$bulan = 'Jul';
				}elseif ($bln == 8) {
					$bulan = 'Ags';
				}elseif ($bln == 9) {
					$bulan = 'Sep';
				}elseif ($bln == 10) {
					$bulan = 'Okt';
				}elseif ($bln == 11) {
					$bulan = 'Nov';
				}else {
					$bulan = 'Des';
				}

				$inpbulan = $tanggal." ".$bulan." ".$tahun;

				$cek_bulan = mysqli_query($conn, "SELECT * FROM pengunjung
													WHERE bulan = '$inpbulan'");
				$cek_data = mysqli_num_rows($cek_bulan);

				if ($cek_data > 0){
					echo "
					    <script>
					    	alert('data gagal ditambahkan, tanggal tersebut sudah ada!');
					        document.location.href = 'data-aktual-tambah.php';
					    </script>
					";
				}else{
					$tambah = mysqli_query($conn, "INSERT INTO pengunjung
                            VALUES('', '$inpbulan', '$hrg')");

	                if($tambah){
	                    echo "
	                        <script>
	                            alert('data berhasil ditambahkan!');
	                            document.location.href = 'data-aktual.php';
	                        </script>
	                    ";

	                }else{
	                    echo "
	                        <script>
	                            alert('data gagal ditambahkan!');
	                            document.location.href = 'data-aktual.php';
	                        </script>
	                    ";
	                }
				}

			}
		?>