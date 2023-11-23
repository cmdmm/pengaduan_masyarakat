<?php
include 'koneksi.php';

$id = $_GET['id_pengaduan'];

$pengaduan = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan = '$id'") or die(mysqli_error());

while($data = $pengaduan->fetch_assoc()){



?>

<div class="col-12 col-lg-10 mx-auto">
          <div class="card radius-15">
            <div class="card-header">
              <h3 class="mt-4">Edit Pengaduan</h3>
            </div>
            
            <div class="card-body">
                
            <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="">Tanggal</label>
                <input type="date" value="<?php echo $data['tgl_pengaduan']; ?>" name="tgl_pengaduan" id="" class="form-control"> 
            </div>
            
            <div class="form-group">
                <label for="">Foto</label>
                <input type="file" value="<?php echo $data['foto']; ?>" class="form-control" name="foto" id="">
            </div>
            
            <div class="form-group">
                <label for="">Isi Laporan</label>
                <textarea name="isi_laporan" id="" cols="30" rows="10" class="form-control"><?php echo $data['isi_laporan']; ?></textarea>
            </div>

           
                <button onclick="window.history.back()" type="button" class="btn btn-sm btn-secondary">Kembali</button>
                
                <input type="submit" name="submit" value="Simpan" class="btn btn-sm btn-primary">
          

            </form>

            </div>
    </div>
</div>

<?php

}

if(isset($_POST['submit'])){

    $tgl = $_POST['tgl_pengaduan'];
    $isi = $_POST['isi_laporan'];

    $query_show = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan = '$id'")or die(mysqli_error());
    $data_lama = $query_show->fetch_assoc();

    if($_FILES['foto']['name'] == null) {
        
        $foto = $data_lama['foto'];
    
    } else {
        
        $foto = $_FILES['foto']['name'];
        unlink("foto/".$data_lama['foto']);
        $lokasi = $_FILES['foto']['tmp_name'];
        move_uploaded_file($lokasi, "foto/".$foto);
    }

    

    $query = mysqli_query($koneksi, "UPDATE pengaduan SET tgl_pengaduan = '$tgl', isi_laporan = '$isi', foto = '$foto' WHERE id_pengaduan = '$id'") or die(mysqli_error());

    if($query){
        echo "<script>alert('Berhasil mengubah pengaduan');</script>";
        echo "<script>location.href='index.php';</script>";

    } else {
        echo "<script>alert('Terjadi kesalahan waktu mengubah data');</script>";
        echo "<script>location.href='index.php?halaman=editpengaduan';
        </script>";
    }
}

?>