<?php

$query = "SELECT max(id_supplier) as maxid from supplier";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);
$id_supplier = $data['maxid'];

$nourut = (int) substr($id_supplier,2,3);
$nourut++;
$char = "SP";
$newid = $char . sprintf("%03s" , $nourut);


?>
<div class="card mt-3 card-gray">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Asset Radio HT</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">
               
                  <div class="form-group">
                    <label for="exampleInputEmail1">Id Supplier</label>
                    <input type="text" class="form-control di" id="exampleInputEmail1" name="id_supplier" 
                    value="<?php echo $newid;?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Supplier</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_supplier" >
                  </div>    
                  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="alamat_supplier"  >
                  </div>   
                  <div class="form-group">
                    <label for="exampleInputEmail1">No Telpon</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="no_hp"  >
                  </div>  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="email"  >
                  </div>  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Supplier</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="jenis_supplier"  >
                  </div>  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Sales</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_sales"  >
                  </div> 


                  <button type="submit" name="simpan"  class="btn btn-primary">Submit</button>
               
                
              </form>
            </div>
<?php
if (isset($_POST['simpan'])){

 
  $nama_supplier = $_POST['nama_supplier'];
  $alamat_supplier = $_POST['alamat_supplier'];
  $no_hp = $_POST['no_hp'];
  $email = $_POST['email'];
  $jenis_supplier = $_POST['jenis_supplier'];
  $nama_sales = $_POST['nama_sales'];
  
  // menambah data
    $query = "INSERT INTO supplier  VALUES ('$newid','$nama_supplier','$alamat_supplier','$no_hp','$email','$jenis_supplier','$nama_sales')";
    $sql = $koneksi->query($query);
  
    if ($sql) {
      ?>
      <script type="text/javascript">
        alert("Data Berhasil Disimpan")
        window.location.href="?page=supplier";
      </script>
      <?php
    }
  
  
  }
  ?>