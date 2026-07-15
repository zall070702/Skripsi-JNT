<?php
$id = $_GET['id'];
$sql=mysqli_query($koneksi,"SELECT * FROM jasa_service WHERE id_jasa='$id'");
$data=mysqli_fetch_assoc($sql);
?>


<div class="card mt-3 card-gray">
              <div class="card-header">
                <h3 class="card-title">Ubah Data Tempat Service</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">
               
                  <div class="form-group">
                    <label for="exampleInputEmail1">Id service</label>
                    <input type="text" class="form-control di" id="exampleInputEmail1" name="id_jasa" 
                    value="<?php echo $data['id_jasa'];?>"  readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama service</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_service"
                    value="<?php echo $data['nama_service'];?>" >
                  </div>    
                  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="alamat_service" 
                    value="<?php echo $data['alamat_service'];?>" >
                  </div>   
                  <div class="form-group">
                    <label for="exampleInputEmail1">No Telpon</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="no_hp" 
                    value="<?php echo $data['no_hp'];?>" >
                  </div>  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jenis service</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="jenis_service" 
                    value="<?php echo $data['jenis_service'];?>" >
                  </div>  


                  <button type="submit" name="simpan"  class="btn btn-primary">Submit</button>
               
                
              </form>
            </div>
            <!-- /.card -->
<?php
if (isset($_POST['simpan'])){

  $nama_service = $_POST['nama_service'];
  $alamat_service = $_POST['alamat_service'];
  $no_hp = $_POST['no_hp'];
  $jenis_service = $_POST['jenis_service'];


  $sql = mysqli_query($koneksi,"UPDATE jasa_service SET nama_service='$nama_service',alamat_service='$alamat_service',no_hp='$no_hp',jenis_service='$jenis_service'WHERE id_jasa='$id'");

  if ($sql) {

    ?>
    <script type="text/javascript">
      alert("Data Berhasil Diubah")
      window.location.href="?page=jasa_service";
    </script>
    <?php
  }
}

