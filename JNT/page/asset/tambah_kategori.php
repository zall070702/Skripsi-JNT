<?php
$today = date("Y-m-d");

if (isset($_POST['batal'])){
  ?>
  <script type="text/javascript">
      window.location.href="?page=brg_keluar_peralatan";
  </script>
  <?php
}

if (isset($_POST['simpan'])){

$kd_asset = $_POST['kd_asset'];
$karyawan = $_POST['karyawan'];
$tgl_keluar = $_POST['tgl_keluar'];
$keterangan = $_POST['keterangan'];

$ket= 'Diambil Oleh ' . $nrp; 

$status='Terpakai';


// menambah data
  $query = "INSERT INTO brg_keluar_peralatan (id_karyawan,kd_asset,tgl_keluar,keterangan) VALUES ('$karyawan','$kd_asset','$tgl_keluar','$keterangan')";
  $sql = $koneksi->query($query);

  //mengubah status
  $query2 = "UPDATE brg_masuk_peralatan SET status='$status' WHERE kd_asset='$kd_asset'";
  $sql2 = $koneksi->query($query2);
  $query3 = "UPDATE asset_peralatan SET status='$status' WHERE kd_asset='$kd_asset'";
  $sql3 = $koneksi->query($query3);

  if ($sql) {
    ?>
    <script type="text/javascript">
      alert("Data Berhasil Disimpan")
      window.location.href="?page=brg_keluar_peralatan";
    </script>
    <?php
  }


}
?>
<div class="card mt-3 card-primary">
  <div class="card-header">
    <h3 class="card-title">Tambah Data Asset</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form role="form" method="POST" enctype="multipart/form-data">
    <div class="card-body">
      <div class="form-group">
          <label for="exampleInputEmail1">Pilih Kode Asset</label>
          <select class="choices form-control" name="kd_asset" required >
            <option value="" required>Pilih Barang...</option>
            
            <?php 
            $sql = mysqli_query($koneksi,"SELECT * FROM asset_peralatan  WHERE status='Belum Terpakai' ORDER BY kd_asset DESC");
            while($row = $sql->fetch_assoc()) :
            ?>
            <option value="<?= $row['kd_asset']; ?>"><?= $row['kd_asset']; ?> : <?= $row['nama_barang']; ?>/<?= $row['sn']; ?></option>
            
            <?php endwhile; ?>

          </select>
        </div>
        
        <div class="form-group">
          <label for="exampleInputEmail1">Pilih Nama Pengambil</label>
          <select class="form-control" name="karyawan" required>
            <option value="">Pilih Karyawan...</option>
            <?php 
            $sql = mysqli_query($koneksi,"SELECT * FROM karyawan");
            while($row = $sql->fetch_assoc()) :
            ?>
            <option value="<?= $row['id_karyawan']; ?>"><?= $row['nrp']; ?> - <?= $row['nama']; ?> - <?= $row['departemen']; ?></option>
            
            <?php endwhile; ?>

          </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Tanggal keluar</label>
            <div class="col-sm-4">
                <input type="date" class="form-control" class="form-control" name="tgl_keluar" id="exampleInputEmail1" value="<?= $today; ?>" >
            </div>
        </div>
        <div class="form-group">
          <label for="inputDescription">Keterangan</label>
          <textarea id="inputDescription" class="form-control" rows="4" type="text" class="form-control" id="exampleInputEmail1" name="keterangan"></textarea>
        </div>               
        
      <!-- /.card-body -->

      <div class="">
        <button type="submit" name="simpan"  class="btn btn-primary btn">Simpan</button>
        <button type="submit" name="batal" class="btn btn-danger btn">Batal</button></a>
      </div>
    </div>
    
  </form>
</div>

<!-- Include Choices JavaScript -->
<script src="dist/assets/vendors/choices.js/choices.min.js"></script>
            </body>
</html>
