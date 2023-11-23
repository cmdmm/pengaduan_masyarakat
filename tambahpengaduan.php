<?php
include 'koneksi.php';

?>

<div class="col-12 col-lg-10 mx-auto">
          <div class="card radius-15">
            <div class="card-header">
              <h3 class="mt-4">Tambah Pengaduan</h3>
            </div>
            
            <div class="card-body">
                
            <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="">Tanggal</label>
                <input type="date" name="tgl_pengaduan" id="" class="form-control" required> 
            </div>
            
            <div class="form-group">
                <label for="">Foto</label>
                <input type="file" class="form-control" name="foto" id="" required>
            </div>
            
            <div class="form-group">
                <label for="">Isi Laporan</label>
                <textarea name="isi_laporan" id="" cols="30" rows="10" class="form-control" required></textarea>
            </div>

           
            <button onclick="window.history.back()" type="button" class="btn btn-sm btn-secondary">Kembali</button>
                
                <input type="submit" name="submit" value="Simpan" class="btn btn-sm btn-primary">
          

            </form>

            </div>
    </div>
</div>

<?php

if(isset($_POST['submit'])){

    $nik = $_SESSION['masyarakat']['nik'];
    $tgl = $_POST['tgl_pengaduan'];
    $isi = $_POST['isi_laporan'];
    $status = '0';

    $foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasi, "foto/".$foto);

    $query = mysqli_query($koneksi, "INSERT INTO pengaduan(tgl_pengaduan, nik, isi_laporan, foto, status)
                                    VALUES('$tgl', '$nik', '$isi', '$foto', '$status')") or die(mysqli_error());

    if($query){
        echo "<script>alert('Berhasil membuat pengaduan');</script>";
        echo "<script>location.href='index.php';</script>";

    } else {
        echo "<script>alert('Terjadi kesalahan waktu tambah data');</script>";
        echo "<script>location.href='index.php?halaman=tambahpengaduan';</script>";
    }
}

?>