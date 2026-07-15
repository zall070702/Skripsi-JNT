<?php
$id = $_GET['id'];
$sql=mysqli_query($koneksi,"SELECT * FROM karyawan WHERE id_karyawan='$id'");
$data=mysqli_fetch_assoc($sql);
?>


<div class="card mt-3 card-gray">
              <div class="card-header">
                <h3 class="card-title">Ubah Data Karyawan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">
               
                  <div class="form-group">
                    <label for="exampleInputEmail1">NRP</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nrp" 
                    value="<?php echo $data['nrp'];?>" placeholder="Masukkan Id">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" 
                    value="<?php echo $data['nama'];?>">
                  </div>    
                  <div class="form-group">
                    <label for="exampleInputEmail1">Departemen</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="departemen" 
                    value="<?php echo $data['departemen'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jabatan</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="jabatan" 
                    value="<?php echo $data['jabatan'];?>">
                  </div>

                  <button type="submit" name="selesai"  class="btn btn-primary">Submit</button>
               
                
              </form>
            </div>
            <!-- /.card -->
<?php
if (isset($_POST['selesai'])){

  $nrp = $_POST['nrp'];
  $nama = $_POST['nama'];
  $departemen = $_POST['departemen'];
  $jabatan = $_POST['jabatan'];


  $sql = mysqli_query($koneksi,"UPDATE karyawan SET nrp='$nrp',nama='$nama',departemen='$departemen',jabatan='$jabatan' WHERE id_karyawan='$id'");

  if ($sql) {

    ?>
    <script type="text/javascript">
      alert("Data Berhasil Diubah")
      window.location.href="?page=karyawan";
    </script>
    <?php
  }
}

