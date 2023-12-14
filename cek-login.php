<?php 
session_start();

include 'function.php';

$username = $_POST['user'];
$password = $_POST['pass'];

$login = mysqli_query($conn,"SELECT * FROM user
						WHERE username = '$username' AND password = '$password'");


$cek = mysqli_num_rows($login);

if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
	$_SESSION['login'] = true;
	$_SESSION['username'] = $data['username'];
	header("location:index.php");

}else{
	header("location:newlogin.php?pesan=gagal");
}

?>