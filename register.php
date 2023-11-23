<?php

include 'koneksi.php';



?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Registrasi Akun</title>
	<!--icon-->
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
								
								<h3 class="mt-4 font-weight-bold">Silahkan Register</h3>
							</div>
						</div>
						<div class="body p-md-5">
						<form method="POST" auto-complete="off">

							<div class="form-group">
								<label>NIK</label>
								<input type="text" name="nik" class="form-control" placeholder="Masukkan NIK Anda dengan benar" required/>
							</div>

							<div class="form-group mt-4">
								<label>Nama</label>
								<input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap Anda" required/>
							</div>

							<div class="form-group mt-4">
								<label>Nomor Telepon</label>
								<input type="text" name="telp" max="32" class="form-control" placeholder="Masukkan nama lengkap Anda" required/>
							</div>

							<div class="form-group mt-4">
								<label>Username</label>
								<input type="text" max="25" name="username" class="form-control" placeholder="Masukkan username Anda" required/>
								<span>* Maksimal 25 karakter</span>
							</div>

							<div class="form-group">
								<label>Password</label>
								<div class="input-group" id="show_hide_password">
									<input class="form-control border-right-0" name="password" type="password" placeholder="Masukkan password Anda" max="32" required>
									<div class="input-group-append">	<a href="javascript:;" class="input-group-text bg-transparent border-left-0"><i class='bx bx-hide'></i></a>
									</div>
								</div>
							</div>

							<div class="btn-group mt-3 w-100">
								
								<input type="submit" name="submit" value="Register" class="btn btn-secondary btn-block">
								<!-- <button type="button" class="btn btn-secondary"><i class="lni lni-arrow-right"></i> -->
								</button>
							</div>

							</form>
						</div>
						<div class="card-footer">
							<p>Sudah punya akun ? <a href="login.php">Login</a> </p>
						</div>
						<!--end row-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
	<!-- JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="assets/js/jquery.min.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
</body>

</html>

<?php

if(isset($_POST['submit'])){
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "INSERT INTO masyarakat(nik, nama, username, password, telp)
                            VALUES('$nik','$nama','$username','$password','$telp')") or die(mysqli_error());

    if($query){
        echo "
            <script>
            alert('Berhasil registrasi, silahkan login.');
            document.location.href='login.php';
            </script>;
            ";
    } else {
        echo "
            <script>
            alert('Terjadi kesalahan ketika registrasi,silahkan ulang kembali.');
            document.location.href='register.php';
            </script>;
            ";
    }
}

?>