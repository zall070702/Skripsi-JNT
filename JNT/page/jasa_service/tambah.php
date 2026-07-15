<?php

$query = "SELECT max(id_jasa) as maxid from jasa_service";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);
$id_jasa = $data['maxid'];

$nourut = (int) substr($id_jasa,2,3);
$nourut++;
$char = "JS";
$newid = $char . sprintf("%03s" , $nourut);


?>
<div class="card mt-3 card-gray">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Tempat Service</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">
               
                  <div class="form-group">
                    <label for="exampleInputEmail1">Id Jasa Service</label>
                    <input type="text" class="form-control di" id="exampleInputEmail1" name="id_jasa" 
                    value="<?php echo $newid;?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Service</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_service" >
                  </div>    
                  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="alamat_service"  >
                  </div>   
                  <div class="form-group">
                    <label for="exampleInputEmail1">No Telpon</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="no_hp"  >
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Service</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="jenis_service"  >
                  </div>  


                  <button type="submit" name="simpan"  class="btn btn-primary">Submit</button>
               
                
              </form>
            </div>
<?php
if (isset($_POST['simpan'])){

 
  $nama_service = $_POST['nama_service'];
  $alamat_service = $_POST['alamat_service'];
  $no_hp = $_POST['no_hp'];
  $jenis_service = $_POST['jenis_service'];
  
  // menambah data
    $query = "INSERT INTO jasa_service  VALUES ('$newid','$nama_service','$alamat_service','$no_hp','$jenis_service')";
    $sql = $koneksi->query($query);
  
    if ($sql) {
      ?>
      <script type="text/javascript">
        alert("Data Berhasil Disimpan")
        window.location.href="?page=jasa_service";
      </script>
      <?php
    }
  
  
  }
  ?>