<?php
$id = $_GET['id'];
$sql=mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE id_mahasiswa='$id'");
$data=mysqli_fetch_assoc($sql);
?>

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ubah Data Mahasiswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID Mahasiswa</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="id_mahasiswa" 
                    value="<?php echo $data['id_mahasiswa'];?>" placeholder="Masukkan Id" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama"  value="<?php echo $data['nama'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jenis kelamin</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="jenis_kelamin"  value="<?php echo $data['jenis_kelamin'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">alamat</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="alamat"  value="<?php echo $data['alamat'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Telepon</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="telepon"  value="<?php echo $data['telepon'];?>">
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

$id_mahasiswa = $_POST['id_mahasiswa'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];


  $sql = mysqli_query($koneksi,"UPDATE mahasiswa SET nama='$nama',jenis_kelamin='$jenis_kelamin',alamat='$alamat',telepon='$telepon' WHERE id_mahasiswa='$id_mahasiswa'");

  if ($sql) {
    ?>
    <script type="text/javascript">
      alert("Data Berhasil Diubah")
      window.location.href="?page=mahasiswa";
    </script>
    <?php
  }


}
?>