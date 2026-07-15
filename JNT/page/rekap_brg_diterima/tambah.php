<?php
$query = "SELECT max(id_kelas) as maxid from kelas";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);
$id_kelas = $data['maxid'];

$nourut = (int) substr($id_kelas,3,3);
$nourut++;
$char = "KLS";
$newid = $char . sprintf("%03s" , $nourut);

?>
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ubah Data Kelas</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID kelas</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="id_kelas" 
                    value="<?php echo $newid;?>" placeholder="Masukkan Id" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kelas</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="kelas" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ruangan</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="ruangan"  >
                  </div>                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="simpan"  class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
<?php
if (isset($_POST['simpan'])){

$id_kelas = $_POST['id_kelas'];
$kelas = $_POST['kelas'];
$ruangan = $_POST['ruangan'];


  $sql = mysqli_query($koneksi,"INSERT INTO kelas (id_kelas,kelas,ruangan)VALUES('$id_kelas','$kelas','$ruangan')");

  if ($sql) {
    ?>
    <script type="text/javascript">
      alert("Data Berhasil Disimpan")
      window.location.href="?page=kelas";
    </script>
    <?php
  }


}
?>