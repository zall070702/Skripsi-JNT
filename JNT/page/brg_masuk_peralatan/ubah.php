<?php
$id = $_GET['id'];
$sql=mysqli_query($koneksi,"SELECT * FROM brg_masuk_peralatan WHERE kd_asset='$id'");
$data=mysqli_fetch_assoc($sql);

if (isset($_POST['batal'])){
  ?>
  <script type="text/javascript">
      window.location.href="?page=brg_masuk_peralatan";
  </script>
  <?php
}
?>

<div class="card mt-3 card-primary">
  <div class="card-header">
    <h3 class="card-title">Ubah Data Asset Peralatan</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form role="form" method="POST" enctype="multipart/form-data">
    <div class="card-body"> 
      <div class="row">
        <div class="col-md-6 col-12">
          <div class="form-group">
            <label for="exampleInputEmail1">Kode Asset</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="kd_asset"   
            value="<?php echo $data['kd_asset'];?>"  readonly>
          </div>
        </div>
      <div class="col-md-6 col-12">
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Asset</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="nama_barang"  
        value="<?php echo $data['nama_barang'];?>">
      </div>  
      </div>
      <div class="col-md-6 col-12">
      <div class="form-group">
        <label for="exampleInputEmail1">Merek</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="merek" 
        value="<?php echo $data['merek'];?>">
      </div> 
      </div>
      <div class="col-md-6 col-12">
      <div class="form-group">
        <label for="exampleInputEmail1">Serial number</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="sn"  
        value="<?php echo $data['sn'];?>">
      </div>  
      </div>
      <div class="col-md-6 col-12">
      <div class="form-group">
        <label for="exampleInputEmail1">Model</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="model" 
        value="<?php echo $data['model'];?>" >
      </div>  
      </div>
      <div class="col-md-6 col-12">
      <div class="form-group">
        <label for="exampleInputEmail1">MDA</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="mda"  
        value="<?php echo $data['mda'];?>">
      </div>    
      </div>
      <div class="col-md-6 col-12">
        <div class="form-group">
        <label for="exampleInputEmail1">Tanggal Diterima</label>
          <input type="date" class="form-control" id="exampleInputEmail1" name='tgl_diterima' value="<?php echo $data['tgl_diterima'];?>" >
          </div>
      </div>
      <div class="col-md-6 col-12">
      <div class="form-group">
        <label for="exampleInputEmail1">Harga</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="harga"  
        value="<?php echo $data['harga'];?>">
      </div>    
      </div>
      <div class="col-md-6 col-12">
        <div class="form-group ">
          <label for="inputDescription">Keterangan</label>
          <textarea class="form-control" name="keterangan" placeholder="isi keterangan atau catatan" id="exampleInputEmail1" value="<?php echo $data['keterangan'];?>"></textarea>
                        <p><small class="text-muted">Tidak wajib diisi.</small></p>
        </div>
      </div>
    </div>
    <!-- /.card-body -->

    <div class="col-12 d-flex justify-content-end">
      <button type="submit" name="selesai"  class="btn btn-primary btn">Selesai</button>
      <button type="submit" name="batal" class="btn btn-danger ">Batal</button></a>
    </div>
    
  </form>
  </div>
</div>
<?php
if (isset($_POST['selesai'])){

  $merek = $_POST['merek'];
  $model = $_POST['model'];
  $nama_barang = $_POST['nama_barang'];
  $sn = $_POST['sn'];
  $mda = $_POST['mda'];
  $tgl_diterima = $_POST['tgl_diterima'];
  $harga = $_POST['harga'];
  $keterangan = $_POST['keterangan'];

  $sql = mysqli_query($koneksi,"UPDATE brg_masuk_peralatan SET merek='$merek', model='$model',nama_barang='$nama_barang', sn='$sn', mda='$mda', tgl_diterima='$tgl_diterima', harga='$harga',keterangan='$keterangan' WHERE kd_asset='$id'");

  if ($sql) {

    ?>
    <script type="text/javascript">
      alert("Data Berhasil Diubah")
      window.location.href="?page=brg_masuk_peralatan";
    </script>
    <?php
  }
}

