<?php  
	$conn = mysqli_connect("localhost","root","","forecasting-kelompok6-des");

	if (mysqli_connect_errno()){
		echo "Koneksi database gagal : " . mysqli_connect_error();
	}
?>
