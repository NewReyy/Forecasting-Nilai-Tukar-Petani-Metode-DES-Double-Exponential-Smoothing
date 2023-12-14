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
	<script src="js/Chart.js"></script>
	<title> Forecasting </title>
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
			<h3>Hasil Forecasting</h3>
			<div class="box">

				<h4> Nilai Alpha </h4><br>
				<form method="post" action="">
					<select name="n_alpha" class="input-control-2" required>
						<option value=""> Pilih Nilai Alpha </option>
						<option value="0.1">0,1</option>
						<option value="0.2">0,2</option>
						<option value="0.3">0,3</option>
						<option value="0.4">0,4</option>
						<option value="0.5">0,5</option>
						<option value="0.6">0,6</option>
						<option value="0.7">0,7</option>
						<option value="0.8">0,8</option>
						<option value="0.9">0,9</option>
					</select>
					<button type="submit" name="submit" class="hitung"> Hitung </button>
				</form>

				<br><hr><br>

				<?php
					if(isset($_POST['submit'])){
						$alpha = $_POST['n_alpha'];
				?>
					<h4> Menghitung Nilai Forecasting, MSE, dan MAPE (α = <?php echo $alpha?>)</h4><br>
					<table border="1" cellspacing="0" class="table">
						<thead>
							<tr>
								<th> No </th>
								<th> Bulan </th>
								<th> Banyak Pengunjung (Y) </th>
								<th> Y' </th>
								<th> Y" </th>
								<th> A </th>
								<th> B </th>
								<th> Forecasting (Ŷ)</th>
								<th> MSE </th>
								<th> MAPE </th>
							</tr>
						</thead>
						<tbody style="text-align: center;">
						<?php
							$i = 1;
							$d_perkiraan = "";
							$d_perkiraan1 = "";
							$a = "";
							$b = "";
							$query = mysqli_query($conn, "SELECT * FROM pengunjung");
							$n = mysqli_num_rows($query);
							$n_data = $n-1;

							$total_eror = 0;
							$total_mape = 0;
							$total_mse = 0;

							while($tampil = mysqli_fetch_assoc($query)) {
								$kunjungan = $tampil['kunjungan'];
								$bulan = $tampil['bulan'];

								//forecasting pertama
								if($d_perkiraan === ""){
									$d_perkiraan = $kunjungan;
									$d_perkiraan1 = $kunjungan;
									$a = $kunjungan;
									$b = 0;

									if($b == 0){
										$d_forecasting = '';
									}

								} else {
									$h_perkiraan = ($alpha*$kunjungan)+(1-$alpha)*$d_perkiraan;
									$h_perkiraan1 = ($alpha*$h_perkiraan)+(1-$alpha)*$d_perkiraan1;
									$h_a = (2*$h_perkiraan)-$h_perkiraan1;
									$h_b = ($alpha/(1-$alpha))*($h_perkiraan-$h_perkiraan1);

									$d_forecasting = $a+($b*1);

									$d_perkiraan = $h_perkiraan;
									$d_perkiraan1 = $h_perkiraan1;

									$a = $h_a;
									$b = $h_b;
								}

								$array_forecasting[] = $d_forecasting;

								if($d_forecasting == ''){
									$ttl_eror = '';
									$ttl_mse = '';
									$ttl_mape = '';
								}else{
									$ttl_eror = $kunjungan - $d_forecasting;
									$total_eror = $total_eror + $ttl_eror;
									$ttl_mse = $ttl_eror**2;
									$total_mse = $total_mse + $ttl_mse;
									$ttl_mape = abs($kunjungan-$d_forecasting)/$kunjungan;
									$total_mape = $total_mape + $ttl_mape;
								}
						?>

							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $bulan; ?></td>
								<td><?php echo floatval($kunjungan);?></td>
								<td> <?php echo round($d_perkiraan,3); ?></td>
								<td> <?php echo round($d_perkiraan1,3);;?></td>
								<td> <?php echo round($a,3);?></td>
								<td> <?php echo round($b,3);?></td>
								<td> <?php echo number_format((float)$d_forecasting,3);?></td>
								<td> <?php echo number_format((float)$ttl_mse,3);?></td>
								<td> <?php echo number_format((float)$ttl_mape,5); ?></td>
							</tr>

						<?php
							$i++;
							}
						?>

							<tr>
								<td colspan="8">Jumlah</td>
								<td><?=round($total_mse,4)?></td>
								<td><?=round($total_mape,4)?></td>
							</tr>			        
						</tbody>
					</table>

					<?php
						$a_akhir = $a;
						$b_akhir = $b;					
						$mse_akhir = $total_mse/$n_data;
						$mape_akhir = (100/$n_data*$total_mape);
					?>
					<div class="hitung-mse-mape">
						<h3>
							MSE  = <?php echo $total_mse." / ".$n_data." = ".round($mse_akhir,3);?><br>
							MAPE = <?php echo $total_mape." / ".$n_data." = ".round($mape_akhir,4)?>
						</h3>
					</div>

				<br><br><br><br>

				<br><hr><br>
								
        		<canvas id="linechart" width="300" height="300"></canvas>

        		<br><hr><br>

				<center><h3>Forecasting Kunjungan Kepustakaan Presiden Nasional 10 Bulan Ke Depan</h3></center><br>
				<?php
					$query0 = mysqli_query($conn, "SELECT * FROM pengunjung ORDER BY id DESC LIMIT 1");
					$tampil = mysqli_fetch_array($query0);
					$simpan1 = $tampil['bulan'];
				?>

					<table border="1" class="table">
						<tr>
							<th colspan=2>Nilai A dan Nilai B yang digunakan adalah data dari bulan <?php echo $simpan1; ?></th>
						</tr>
						<tr>
							<td>Nilai A</td>
							<td><?php echo $a_akhir; ?></td>
						</tr>
						<tr>
							<td>Nilai B</td>
							<td><?php echo $b_akhir; ?></td>
						</tr>
						<tr>
							<td>Ŷ</td>
							<td><?php echo $a_akhir; ?> + (<?php echo $b_akhir; ?> * m)</td>
						</tr>
					</table>

					<br>

				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Bulan</th>
							<th>Jangka Waktu (m)</th>
							<th>Forecasting (Ŷ)</th>
						</tr>
					</thead>
					<tbody style="text-align: center;">
						<?php
						$m = 1; // Start from 1 to include the initial month (Nov 2023)
						$i = 0;
						// Assuming $simpan1 is in the format "M Y" (e.g., "Nov 2023")
						$bln = substr($simpan1, 0, 3);
						$tahun = substr($simpan1, 4, 4);

						$bulanMap = [
							'Jan' => 1, 'Feb' => 2, 'Mar' => 3, 'Apr' => 4, 'Mei' => 5, 'Jun' => 6,
							'Jul' => 7, 'Ags' => 8, 'Sep' => 9, 'Okt' => 10, 'Nov' => 11, 'Des' => 12,
						];

						$bulan = $bulanMap[$bln];

						while ($m <= 10) {
							$forecast = $a_akhir + ($b_akhir * $m);
							$tgl2 = date('Y-m', strtotime("+$m months", strtotime("$tahun-$bulan")));

							$tahunx = date('Y', strtotime($tgl2));
							$blnx = date('m', strtotime($tgl2));

							$bulanx = date('M', strtotime($tgl2));

							$tgl2x = $bulanx . " " . $tahunx;
							?>

							<tr>
								<td><?php echo $m; ?></td>
								<td><?php echo $tgl2x; ?></td>
								<td><?php echo $m; ?></td>
								<td><?php echo round($forecast, 3); ?></td>
							</tr>

						<?php
							$m++;
							$i++;
						}
						?>
					</tbody>
				</table>

				<?php
					}
				?>

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

<script type="text/javascript">
  var ctx = document.getElementById("linechart").getContext("2d");
  var alpha = <?php echo $alpha; ?>; // Nilai Alpha
  var data = {
    labels: [ <?php 
                $query = mysqli_query($conn, "SELECT bulan FROM pengunjung");
                while($tgl = mysqli_fetch_array($query)){
                    echo "\"$tgl[bulan]\", ";
                }
              ?>
            ],
    datasets:  [
            {
                label: "Aktual",
                fill: false,
                lineTension: 0.3,
                backgroundColor: "rgba(0, 123, 255, 0.5)", // Warna biru
                borderColor: "#007bff", // Warna biru
                pointBackgroundColor: "#007bff", // Warna biru
                pointBorderColor: "#fff",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "#007bff", // Warna biru
                data: [<?php 
                    $aktual = mysqli_query($conn, "SELECT kunjungan FROM pengunjung");
                    while ($data_aktual = mysqli_fetch_array($aktual)) {
                        $d_akt = $data_aktual['kunjungan'];
                        echo $d_akt.',';
                    }
                    ?>]
            },
            {
                label: "Forecasting",
                fill: false,
                lineTension: 0.3,
                backgroundColor: "rgba(255, 160, 122, 0.5)", // Warna oranye muda
                borderColor: "#ffa07a", // Warna oranye muda
                pointBackgroundColor: "#ffa07a", // Warna oranye muda
                pointBorderColor: "#fff",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "#ffa07a", // Warna oranye muda
                data: [<?php 
                    foreach ($array_forecasting as $arfor) {
                        echo "".$arfor.", ";
                    }
                    ?>]
            }
               ]
      };

  var options = {
	tooltips: {
          headerFormat: '<span style="font-size:14px">{point.key}</span><table>',
          pointFormat: '<tr><td style="color:{color};padding:0">{label}: </td>' +
              '<td style="padding:0"><b>{point.y:.0f} </b></td></tr>',
          footerFormat: '</table>',
          shared: true,
          useHTML: true
      },
      plotOptions: {
          line: {
              pointPadding: 0.2,
              borderWidth: 0
          }
      },
      responsive: true,
    //   legend: {
    //       display: true,
    //       position: 'bottom',
    //   },
      title: {
          display: true,
          text: 'Grafik Perbandingan Data Aktual dan Hasil Forecasting Menggunakan Nilai Alpha ' + alpha,
          fontSize: 18, // Ukuran font judul
          fontFamily: 'Roboto, sans-serif', // Font family judul
      },
      scales: {
          yAxes: [{
              scaleLabel: {
                  display: true,
                  labelString: 'Jumlah NTP Nasional Perbulan',
                  fontSize: 16, // Ukuran font label y
                  fontFamily: 'Roboto, sans-serif', // Font family label y
              },
              ticks: {
                  min: 96,
                  fontSize: 14, // Ukuran font angka di sumbu y
                  fontFamily: 'Roboto, sans-serif', // Font family angka di sumbu y
              }
          }],
          xAxes: [{
              gridLines: {
                  color: "rgba(0, 0, 0, 0)",
              },
              ticks: {
                  fontSize: 14, // Ukuran font angka di sumbu x
                  fontFamily: 'Roboto, sans-serif', // Font family angka di sumbu x
              },
			  crosshair: true
          }],
      }
  };

  var myLineChart = new Chart(ctx, {
      type: 'line',
      data: data,
      options: options
  });
</script>