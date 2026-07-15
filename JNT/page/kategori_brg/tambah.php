<?php
if (isset($_POST['simpan'])){

$kd_brg = $_POST['kd_brg'];
$nama_brg = $_POST['nama_brg'];

//membuat id otomatis


$query = "SELECT max(kd_brg) as maxid from kategori_brg WHERE kd_brg";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);
$id_daily = $data['maxid'];

$nourut = (int) substr($id_daily,3,3);
$nourut++;
$newid = $kd_brg . sprintf("%03s" , $nourut);

// menambah data
  $query = "INSERT INTO kategori_brg VALUES('$kd_brg','$nama_brg')";
  $sql = $koneksi->query($query);

  if ($sql) {
    ?>
    <script type="text/javascript">
      alert("Data Berhasil Disimpan")
      window.location.href="?page=kategori_brg";
    </script>
    <?php
  }


}
?>
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Kategori Barang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Kode Barang</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="kd_brg"  >
                  </div>    
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Barang</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_brg"  >
                  </div> 
                               
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="simpan"  class="btn btn-primary">Submit</button>
                  <a href="?page=kategori_brg"><button type="submit" name="batal"  class="btn btn-danger">Batal</a>
                </div>
                
              </form>
            </div>
