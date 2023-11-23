<?php

session_start();
include 'koneksi.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Login</title>
	<!--favicon-->
	<link rel="icon" href="assets/images/icon.png" type="image/png" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="assets/css/icons.css" />
	<!-- App CSS -->
	<link rel="stylesheet" href="assets/css/app.css" />
</head>

<body>
	<!-- wrapper -->
	<div class="wrapper">
		<div class="container align-items-center justify-content-center mt-5">
			
		<div class="row">
			<div class="col-12 col-lg-10 mx-auto">	
				<div class="card radius-15">
					<div class="card-header">
						<div class="text-center">

							<h3 class="mt-4 font-weight-bold">Silahkan Login</h3>
						</div>
					</div>
					<div class="card-body p-md-5">
						<form method="post">
							<div class="form-group">
								<label for="">Username</label>
								<input type="text" name="username" id="" placeholder="Masukkan username Anda" class="form-control">
							</div>
							<div class="form-group">
								<label for="">Password</label>
								<input type="password" name="password" id="" placeholder="Masukkan password Anda" class="form-control">
								<br>
								<a href="lupa_password.php">Lupa Password?</a>
							</div>
							
							<div class="btn-group mt-3 w-100">
								
								<input type="submit" name="submit" value="Login" class="btn btn-secondary btn-block">
								<!-- <button type="button" class="btn btn-secondary"><i class="lni lni-arrow-right"></i> -->
								</button>
							</div>
						</form>
					</div>
					<div class="card-footer">
						<p>Belum punya akun? <a href="register.php">Register</a> </p>
					</div>
				</div>
			</div>
		</div>
		
		</div>
	</div>
	<!-- end wrapper -->
</body>

</html>

<?php

if(isset($_POST['submit'])){

	$username = $_POST['username'];
	$password = $_POST['password'];


	$query = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE username = '$username' AND password = '$password'") or die(mysqli_error());

	$cek = $query->num_rows; 

	if($cek == 1){
		$_SESSION['masyarakat'] = $query->fetch_assoc();

		echo "<script>alert('Login Sukses');</script>";
		echo "<script>document.location.href='index.php'; </script>";
	} else {
		echo "<script>alert('Gagal melakukan login');</script>";
		echo "<script>document.location.href='login.php';</script>";
	}
}



?>