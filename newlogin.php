<?php 
	require "function.php";
	if (isset($_SESSION['login'])) {
		header("location:user-index.php");
		exit;
	}
?>
<html lang="en"><head>
	<title>Aplikasi Peramalan Perkembangan Nilai Tukar Petani Nasional</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="http://localhost/peramalan-pajak-dengan-metode-des-tes-master/assets/login/images/icons/favicon.ico">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="http://localhost/peramalan-pajak-dengan-metode-des-tes-master/assets/login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="http://localhost/peramalan-pajak-dengan-metode-des-tes-master/assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="http://localhost/peramalan-pajak-dengan-metode-des-tes-master/assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="http://localhost/peramalan-pajak-dengan-metode-des-tes-master/assets/login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="http://localhost/peramalan-pajak-dengan-metode-des-tes-master/assets/login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="http://localhost/peramalan-pajak-dengan-metode-des-tes-master/assets/login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="http://localhost/peramalan-pajak-dengan-metode-des-tes-master/assets/login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="http://localhost/peramalan-pajak-dengan-metode-des-tes-master/assets/login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="http://localhost/peramalan-pajak-dengan-metode-des-tes-master/assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/peramalan-pajak-dengan-metode-des-tes-master/assets/login/css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-b-160 p-t-50">
				<form class="login100-form validate-form" method="post" action="cek-login.php">
					<span class="login100-form-title p-b-43">
						Silahkan Login
					</span>

					<div class="wrap-input100 rs1 validate-input" data-validate="Username is required">
						<input class="input100" type="text" name="user">
						<span class="label-input100">Username</span>
					</div>


					<div class="wrap-input100 rs2 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass">
						<span class="label-input100">Password</span>
					</div>

					<div class="container-login100-form-btn">
						<button name="submit" class="login100-form-btn">
							Masuk
						</button>
                        <p style="margin-top: 10px; text-align: center; color: #000000"> Belum punya akun? <a href="user-sign-up.php" style="color: #FFFFFF;"> Buat akun </a></p>
					</div>

					<div class="text-center w-full p-t-23">
						<a>
							Selamat Datang di Aplikasi Perkembangan Nilai Tukar Petani Nasional
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
    <!-- content -->
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "<script>
                    alert('Login gagal! username dan password salah!');
            </script>";
		}else if($_GET['pesan'] == "logout"){
			echo "<script>
                    alert('Anda telah berhasil logout!');
            </script>";
		}else if($_GET['pesan'] == "belum_login"){
			echo "<script>
                    alert('Anda harus login untuk mengakses halaman user!');
            </script>";
		}
	}
	?>

	<!--===============================================================================================-->
	<script src="http://localhost/peramalan-pajak-dengan-metode-des-tes-master/assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="http://localhost/peramalan-pajak-dengan-metode-des-tes-master/assets/login/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="http://localhost/peramalan-pajak-dengan-metode-des-tes-master/assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="http://localhost/peramalan-pajak-dengan-metode-des-tes-master/assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="http://localhost/peramalan-pajak-dengan-metode-des-tes-master/assets/login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="http://localhost/peramalan-pajak-dengan-metode-des-tes-master/assets/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="http://localhost/peramalan-pajak-dengan-metode-des-tes-master/assets/login/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="http://localhost/peramalan-pajak-dengan-metode-des-tes-master/assets/login/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="http://localhost/peramalan-pajak-dengan-metode-des-tes-master/assets/login/js/main.js"></script>



</body></html>