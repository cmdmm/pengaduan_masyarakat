<!-- 
<div class="col-12 col-lg-10 mx-auto">

          <div class="card radius-15">
            
            <div class="card-header">
              <h3 class="mt-4">Daftar Laporan Saya</h3>
            </div>
            <div class="card-body p-md-5">

            <div class="btn-group">
              <a href="?halaman=tambahpengaduan" class="btn btn-sm btn-info">+ Tambah Pengaduan</a>
            </div>

            <div class="row">

            <?php

                    $nik = $_SESSION['masyarakat']['nik'];

                    $daftar_pengaduan = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE nik = '$nik'")or die(mysqli_error());

                    $jumlah = $daftar_pengaduan->num_rows;

                    if($jumlah > 0) {

                    

                    while($pengaduan = $daftar_pengaduan->fetch_assoc()) {

                    

            ?>

                  <div class="col-5 col-lg-4">
                    <div class="card radius-15">
                      <img src="foto/<?php echo $pengaduan['foto']; ?>" class="card-img-top" alt="">
                      <div class="card-body">

                      <span class="badge badge-<?php 
                      if($pengaduan['status'] == '0'){ echo 'secondary'; }
                      else if($pengaduan['status'] == 'proses')  { echo 'warning'; } 
                      else if($pengaduan['status'] == 'selesai') { echo 'info'; }?>">
                      
                      <?php  
                      if($pengaduan['status'] == '0'){ echo 'Belum Diverifikasi'; } 
                      else if($pengaduan['status'] == 'proses')  { echo 'Diproses'; }
                      else if($pengaduan['status'] == 'selesai') { echo 'Selesai'; }  ?></span>

                        <h6 class="card-title"><?php echo $pengaduan['tgl_pengaduan']; ?></h6>

                        <p class="card-text"><?php echo $pengaduan['isi_laporan']; ?></p>
                        <a href="?halaman=pengaduandetail&id_pengaduan=<?php echo $pengaduan['id_pengaduan']; ?>" class="btn btn-sm btn-primary">Lihat Detail</a>
                      </div>
                    </div>
                  </div>
            <?php

                    }

                  } else {

            ?>
 

        </div>

        <h4 class="text-center mt-5">Belum ada data laporan</h4>

        <?php
            }
        ?>
    </div>
  </div>
</div>
</div> -->

<div class="col-12 col-lg-10 mx-auto">
    <div class="card radius-15">
      <div class="card-header mt-4">
        <h3>Tabel Data Pengaduan</h3>
      </div>

      

      <div class="card-body">

          <div class="col-12 col-lg-12">  
              
               
      <div class="btn-group mb-3">
            <a href="?halaman=tambahpengaduan" class="btn btn-sm btn-info">+ Tambah Pengaduan</a>
      </div>

              <div class="table-responsive">
                      <table class="table">
                          <thead class="thead-dark">
                              <tr>
                              <th>#</th>
                              <th>Tanggal Pengaduan</th>    
                              <th>Gambar</th>    
                              <th>Isi Laporan</th>    
                              <th>Status</th>    
                              <th>Aksi</th>    
                          </tr>
                          </thead>
                          <tbody>
                            <?php

                            $nik = $_SESSION['masyarakat']['nik'];

                            $daftar_pengaduan = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE nik = '$nik'")or die(mysqli_error());

                            $no = 1;

                            $jumlah = $daftar_pengaduan->num_rows;

                            if($jumlah > 0) {

                            

                            while($pengaduan = $daftar_pengaduan->fetch_assoc()) {

                            
                            ?>
                              <tr>
                              <td><?php echo $no++; ?></td>
                              <td><?php echo $pengaduan['tgl_pengaduan']; ?></td>
                              <td>
                                <img src="foto/<?php echo $pengaduan['foto']; ?>" class="img-fluid" alt="<?php echo $pengaduan['foto']; ?>" srcset="">
                              </td>
                              <td><?php echo $pengaduan['isi_laporan']; ?></td>
                              <td>  <button disabled class="btn btn-sm btn-<?php if($pengaduan['status'] == '0'){ echo 'secondary'; }
                                                                        else if($pengaduan['status'] == 'proses')  { echo 'warning'; } 
                                                                        else if($pengaduan['status'] == 'selesai') { echo 'success'; }?>">
                              
                              <?php 
                                    if($pengaduan['status'] == '0'){ echo 'Belum Diverifikasi'; } 
                                    else if($pengaduan['status'] == 'proses')  { echo 'Diproses'; }
                                    else if($pengaduan['status'] == 'selesai') { echo 'Selesai'; }  ?>
                              </button>
                            
                            </td>
                              <td>
                                
                                <?php  if($pengaduan['status'] == 'proses' || $pengaduan['status'] == 'selesai'){ ?>
                                  
                                  <a href="?halaman=pengaduandetail&id_pengaduan=<?php echo $pengaduan['id_pengaduan']; ?>" class="btn btn-sm btn-primary">Lihat Tanggapan</a>

                                  
                                <?php  } else { ?>

                                  <a href="?halaman=editpengaduan&id_pengaduan=<?php echo $pengaduan['id_pengaduan']; ?>" class="btn btn-sm btn-success">Edit</a>
                                  <a onclick="return confirm('Yakin hapus data?')" href="?halaman=hapuspengaduan&id_pengaduan=<?php echo $pengaduan['id_pengaduan']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                                
                                <?php } ?>
                                
                              
                              </td>
                              </tr>

                            <?php
                            
                            }

                          }else {
                            

                            ?>
                          </tbody>
                      </table>

                      
                      <?php

                      echo "<h4 class='text-center mt-5'>Belum ada data laporan</h4>";
                      
                      }
                      ?>
              </div>

          </div>
              
      </div>
    </div>
</div>