<?php
include 'koneksi.php';

$id = $_GET['id_pengaduan'];

$query_data = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan = '$id'") or die(mysqli_error());

$query_tanggapan = mysqli_query($koneksi, "SELECT * FROM tanggapan JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas WHERE id_pengaduan ='$id'") or die(mysqli_error());

while($pengaduan = $query_data->fetch_assoc()) {

?>

<div class="col-12 col-lg-10 mx-auto">
          <div class="card radius-15">
            <div class="card-header">
              <h3 class="mt-4">Detail Pengaduan</h3>
            </div>
            
            <div class="card-body">
                
            <div class="form-group">
                <label class="font-weight-bold" for="">Tanggal Pengaduan</label>
                <p><?php echo $pengaduan['tgl_pengaduan']; ?></p>
            </div>
            
            <div class="form-group">
                <label class="font-weight-bold" for="">Foto</label>
                <br>
                <img src="foto/<?php echo $pengaduan['foto']; ?>" class="img-fluid w-50" alt="">
            </div>
            
            <div class="form-group">
                <label class="font-weight-bold" for="">Isi Laporan</label>
                <p><?php echo $pengaduan['isi_laporan'] ?></p>
            </div>

           
            <button onclick="window.history.back()" type="button" class="btn btn-sm btn-secondary">Kembali</button>
                          
            </form>

            </div>
    </div>
</div>

<?php

}







?>


<div class="col-12 col-lg-10 mx-auto">
    <div class="card radius-15">
        <div class="card-header">
            <h3 class="mt-4">Tanggapan</h3>
        </div>
        <div class="card-body p-md-5">

        <?php
            
            $cek = $query_tanggapan->num_rows;

            if($cek > 0)
            {

                while($tanggapan = $query_tanggapan->fetch_assoc()) {
                    
        ?>
                <div class="form-group">
                    <label class="font-weight-bold" for="">Tanggal Tanggapan</label>
                    <p><?php echo $tanggapan['tgl_tanggapan']; ?></p>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="">Ditanggapi Oleh</label>
                    <p><?php echo $tanggapan['nama_petugas']; ?> - [<?php echo strtoupper($tanggapan['level']); ?>]</p>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="">Isi Tanggapan</label>
                    <p><?php echo $tanggapan['tanggapan'] ?></p>
                </div>
        
       <?php
                                                                    }    
        
            } else {
            
        ?>

            <h5 class="text-center">Belum Ada Tanggapan</h5>
        </div>

    </div>
</div>

             <?php } ?>