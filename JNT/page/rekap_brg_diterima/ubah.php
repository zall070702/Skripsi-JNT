<?php
$id = $_GET['id'];
$sql=mysqli_query($koneksi,"SELECT * FROM kelas WHERE id_kelas='$id'");
$data=mysqli_fetch_assoc($sql);
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
                    <label for="exampleInputEmail1">ID Kelas</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="id_kelas" 
                    value="<?php echo $data['id_kelas'];?>" placeholder="Masukkan Id" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">kelas</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="kelas"  value="<?php echo $data['kelas'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">ruangan</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="ruangan"  value="<?php echo $data['ruangan'];?>">
                  </div>                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="simpan"  class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
<?php
if (isset($_POST['simpan'])){

$id_kelas = $_POST['id_kelas'];
$kelas = $_POST['kelas'];
$ruangan = $_POST['ruangan'];


  $sql = mysqli_query($koneksi,"UPDATE kelas SET kelas='$kelas',ruangan='$ruangan' WHERE id_kelas='$id_kelas'");

  if ($sql) {
    ?>
    <script type="text/javascript">
      alert("Data Berhasil Diubah")
      window.location.href="?page=kelas";
    </script>
    <?php
  }


}
?>