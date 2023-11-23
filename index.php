<?php

session_start();
include 'koneksi.php';

if(!isset($_SESSION['masyarakat']))
{
    echo "<script>alert('Tidak bisa masuk, harus login dulu');</script>";
    echo "<script>document.location.href='login.php';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 text-white bg-dark border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal"><?php echo $_SESSION['masyarakat']['nama']; ?></h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-white" href="index.php">Ajukan Pengaduan</a>
    <!-- <a class="p-2 text-white" href="#">Enterprise</a> -->
    <a class="p-2 text-white" href="?halaman=narahubung">Narahubung</a>
  </nav>
  <a class="btn btn-outline-info" onclick="return confirm('Yakin logout?')" href="logout.php">Logout</a>
</div>

  <div class="wrapper">
    <div class="container align-items-center justify-content-center mt-5">
      <div class="row">
   
                
              <?php

                  if(isset($_GET['halaman'])){
                    
                    if($_GET['halaman'] == 'narahubung'){
                      include 'narahubung.php';

                    } else if($_GET['halaman'] == 'tambahpengaduan'){
                      include 'tambahpengaduan.php';
                    
                    } else if($_GET['halaman'] == 'editpengaduan'){
                      include 'editpengaduan.php';
                    
                    } else if($_GET['halaman'] == 'hapuspengaduan') {
                      include 'hapuspengaduan.php';
                    } else if($_GET['halaman'] == 'pengaduandetail') {
                      include 'pengaduandetail.php';
                    }

                  } else {
                    include 'home.php';
                  } 

                ?>

          
      </div>
    </div>
  </div>


</body>
</html>