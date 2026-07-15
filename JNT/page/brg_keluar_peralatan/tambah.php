<?php
$today = date("Y-m-d");

if (isset($_POST['batal'])){
  ?>
  <script type="text/javascript">
      window.location.href="?page=brg_keluar_peralatan";
  </script>
  <?php
}

$id = $_GET['idpinjam'];
$sql=mysqli_query($koneksi,"SELECT * FROM pinjam
INNER JOIN pinjam_dtl using(id_dtl_pnjm)
INNER JOIN karyawan using(id_karyawan)
INNER JOIN kategori_brg using(id_kategori)
WHERE id_pinjam='$id'");
$data1=mysqli_fetch_assoc($sql);

$id2 = $data1['id_kategori'];


if (isset($_POST['simpan'])){

$id_kry = $data1['id_karyawan'];
$id_dp = $data1['id_dp'];
$id_pinjam = $data1['id_pinjam'];
$kd_asset = $_POST['kd_asset'];
$tgl_keluar = $_POST['tgl_keluar'];
$keterangan = $_POST['keterangan'];

$ket= 'Diambil Oleh ' . $nrp; 

$status='Terpakai';
$status_brg='DIKIRIM';


// menambah data
  $query = "INSERT INTO brg_keluar_peralatan (id_pinjam,id_karyawan,kd_asset,tgl_keluar,keterangan) VALUES ('$id','$id_kry','$kd_asset','$tgl_keluar','$keterangan')";
  $sql = $koneksi->query($query);

  //mengubah status
  $query2 = "UPDATE brg_masuk_peralatan SET id_dp='$id_dp',status='$status' WHERE kd_asset='$kd_asset'";
  $sql2 = $koneksi->query($query2);
  $query3 = "UPDATE asset_peralatan SET id_dp='$id_dp',status='$status' WHERE kd_asset='$kd_asset'";
  $sql3 = $koneksi->query($query3);
  $query4 = "UPDATE pinjam SET status_brg='$status_brg' WHERE id_pinjam='$id_pinjam'";
  $sql4 = $koneksi->query($query4);

  if ($sql) {
    ?>
    <script type="text/javascript">
      window.location.href="?page=brg_keluar_peralatan&aksi=tambah";
    </script>
    <?php
  }


}
?>
<div class="card mt-3 card-primary">
  <div class="card-header">
    <h3 class="card-title">Tambah Data Aset Keluar</h3>
  </div>
  <!-- /.card-header -->
   <div class="card">
         
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-striped table-borderless table-hover table-sm table-dark m-b-0">
                        <thead>
                            <tr align='center'>
                            <th>No</th>
                              <th>Tanggal Pengajuan</th>
                              <th>Kode Pengajuan</th>
                              <th>Kode Barang Pengajuan</th>
                              <th>Nama Pengaju</th>
                              <th>Kode Drop Point</th>
                              <th>Aset</th>
                              <th>Status Barang</th>
                              <th>Aksi</th>  
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                       <?php
                        $no = 1;

                        $sql = mysqli_query($koneksi," 
                            SELECT * FROM pinjam
                            INNER JOIN pinjam_dtl USING(id_dtl_pnjm)
                            INNER JOIN karyawan USING(id_karyawan)
                            INNER JOIN kategori_brg USING(id_kategori)  
                            WHERE status_brg='PROSES'
                            ORDER BY id_dtl_pnjm ASC 
                        ");

                        if(mysqli_num_rows($sql) > 0){

                            while($data = mysqli_fetch_array($sql)){
                        ?>
                                <tr align='center'>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['tgl_pinjam']; ?></td>
                                    <td><?= $data['id_dtl_pnjm']; ?></td>
                                    <td><?= $data['id_pinjam']; ?></td>
                                    <td><?= $data['nama']; ?></td>
                                    <td><?= $data['id_dp']; ?></td>
                                    <td><?= $data['kategori']; ?></td>
                                    <td><?= $data['status_brg']; ?></td>
                                    <td>
                                        <a href="?page=brg_keluar_peralatan&aksi=tambah&idpinjam=<?= $data['id_pinjam']; ?>">
                                            <button class="btn btn-sm btn-primary">Tambah</button>
                                        </a>
                                    </td>
                                </tr>
                        <?php
                            }

                        } else {
                        ?>
                            <tr align="center">
                                <td colspan="11">Tidak Ada Data Aset</td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>

                    </table>
					
        </div>

        
  <!-- form start -->
  <form role="form" method="POST" enctype="multipart/form-data">
    
    <div class="card-body">
      <div class="row">
        <div class="col-md-6 col-12">
          <div class="form-group">
          <label for="exampleInputEmail1">Pilih Kode Aset</label>
          <select class="choices form-control" name="kd_asset" required >
            <option value="" required>Pilih Barang...</option>
            
            <?php 
            $sql = mysqli_query($koneksi,"SELECT * FROM brg_masuk_peralatan  
            INNER JOIN kategori_brg using(id_kategori)
            WHERE status='Belum Terpakai' 
            AND id_kategori='$id2'
            ORDER BY kd_asset DESC");
            while($row = $sql->fetch_assoc()) :
            ?>
            <option value="<?= $row['kd_asset']; ?>">
              <?= $row['kd_asset']; ?> 
              : 
              <?= $row['nama_barang']; ?>
              /
              <?= $row['kategori']; ?></option>
            
            <?php endwhile; ?>

          </select>
            <p><small class="text-muted">Silahkan Pilih Aset yang Tersedia.</small></p>

        </div>
        </div>
        <div class="col-md-6 col-12">
      <div class="form-group">
        <label for="exampleInputEmail1">Kategori Aset</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="id_kategori" value="<?php echo $data1['kategori'];?>" readonly>
      </div>  
      </div> 
      <div class="col-md-6 col-12">
      <div class="form-group">
          <label for="exampleInputEmail1">Nama Admin DP</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="karyawan" value="<?php echo $data1['nama'];?>" readonly>
        </div>
      </div>
      <div class="col-md-6 col-12">
        <div class="form-group">
        <label for="exampleInputEmail1">Tanggal Penyerahan</label>
          <input type="date" class="form-control" id="exampleInputEmail1" name='tgl_keluar' value="<?= $today; ?>" >
          </div>
      </div>
      <div class="col-md-6 col-12">
      <div class="form-group">
          <label for="exampleInputEmail1">Kode Drop Point</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="id_dp" value="<?php echo $data1['id_dp'];?>" readonly>
        </div> 
      </div>
      <div class="col-md-6 col-12">
        <div class="form-group ">
          <div class="col-12 d-flex justify-content-end">
            <button type="submit" name="simpan"  class="btn btn-primary btn">Simpan</button>
          </div>
        </div>
      </div>
    </div>
      
       
    <hr>
    <div class="container-fluid " align="center">
      <a href="?page=brg_keluar_peralatan" onclick="return confirm('Apakah Anda Yakin untuk Menyimpan Data Ini??')" class="btn btn-primary">Selesai</a>
    </div>
  </form>
</div>

<!-- Include Choices JavaScript -->
<script src="dist/assets/vendors/choices.js/choices.min.js"></script>
            </body>
</html>
