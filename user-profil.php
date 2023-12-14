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
	<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
	<title> Profil Pengguna </title>
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href=""> Kelompok 6 </h1>
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
			<h3>Profil</h3>
			<div class="box">
				<?php
				    $data_edit= mysqli_query($conn, "SELECT * FROM user WHERE username = '".$_SESSION['username']."' ");
				    $row = mysqli_fetch_array($data_edit);
			    ?>
			    <form action="" method="post">
					<p style="margin-bottom: 5px;">Nama </p>
					<input type="text" name="nm" class="input-control" value="<?php echo $row['nama']?>" required>

					<p style="margin-bottom: 5px;">Alamat</p>
					<input type="text" name="almt" class="input-control" value="<?php echo $row['alamat']?>" required>

					<p style="margin-bottom: 5px;">No Telepon</p>
					<input type="text" name="notelp" class="input-control" value="<?php echo $row['notelp']?>" required>
					
					<button type="submit" name="editprofil" class="edit"> Ubah Profil</button>
			    </form>
		    </div>

	    <!-- php -->
	    <?php 
			if(isset($_POST['editprofil'])){
				$update = mysqli_query($conn, "UPDATE user SET
						   	nama = '".$_POST['nm']."', 
						   	alamat = '".$_POST['almt']."',
						   	notelp = '".$_POST['notelp']."'
					    WHERE username = '".$_SESSION['username']."' ");
				if($update){
					echo "
					    <script>
					        alert('profil berhasil diperbaharui!');
					        document.location.href = 'user-profil.php';
					    </script>
					";

				}else{
					echo "
					    <script>
					        alert('profil gagal diperbaharui!');
					        document.location.href = 'user-profil.php';
					    </script>
					";
				}
			}
		?>

			<h3>Ubah Password</h3>
			<div class="box">
			    <form action="" method="post">
				    <p style="margin-bottom: 5px;">Password Lama</p>
					<input type="password" name="passlama" class="input-control" required>

					<p style="margin-bottom: 5px;">Password Baru</p>
					<input type="password" name="passbaru" class="input-control" required>
					
					<button type="submit" name="ubah" class="edit"> Ubah Password</button>
			    </form>
			    </div>
		</div>
	</div>

	<!-- php -->
	<?php
	    if(isset($_POST['ubah'])){

	    	if(!empty($_POST['passbaru'])){

	    		if($_POST['passbaru'] != $_POST['passlama']){

		    		$update = mysqli_query($conn, "UPDATE user SET
			    	password = '".$_POST['passbaru']."'
			    	WHERE username = '".$_SESSION['username']."'");

				    if($update){
			            echo "
			                <script>
			                    alert('password berhasil diubah!');
			                    document.location.href = 'user-profil.php';
			                </script>
			            ";

			        }else{
			            echo "
			                <script>
			                    alert('password gagal diubah!');
			                    document.location.href = 'user-profil.php';
			                </script>
			            ";
			        }
	    		}else{
					echo "
				        <script>
			                alert('password baru tidak boleh sama dengan password lama!');
		                    document.location.href = 'user-profil.php';
			            </script>
			        ";
				}

	    	}else{
			    echo "
		            <script>
	                    alert('password baru tidak boleh kosong!');
		                    document.location.href = 'user-profil.php';
		            </script>
			        ";
			}
	    	
	    }
    ?>

	<!-- footer -->
	<footer>
		<div class="container">
			<small> Copyright &copy; Forecasting Kelompok 6</small>
		</div>
	</footer>
</body>
</html>