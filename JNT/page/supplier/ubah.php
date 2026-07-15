<?php
$id = $_GET['id'];
$sql=mysqli_query($koneksi,"SELECT * FROM supplier WHERE id_supplier='$id'");
$data=mysqli_fetch_assoc($sql);
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
                    value="<?php echo $data['id_supplier'];?>"  readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Supplier</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_supplier"
                    value="<?php echo $data['nama_supplier'];?>" >
                  </div>    
                  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="alamat_supplier" 
                    value="<?php echo $data['alamat_supplier'];?>" >
                  </div>   
                  <div class="form-group">
                    <label for="exampleInputEmail1">No Telpon</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="no_hp" 
                    value="<?php echo $data['no_hp'];?>" >
                  </div>  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="email" 
                    value="<?php echo $data['email'];?>" >
                  </div>  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Supplier</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="jenis_supplier" 
                    value="<?php echo $data['jenis_supplier'];?>" >
                  </div>  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Sales</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_sales" 
                    value="<?php echo $data['nama_sales'];?>" >
                  </div> 


                  <button type="submit" name="simpan"  class="btn btn-primary">Submit</button>
               
                
              </form>
            </div>
            <!-- /.card -->
<?php
if (isset($_POST['simpan'])){

  $nama_supplier = $_POST['nama_supplier'];
  $alamat_supplier = $_POST['alamat_supplier'];
  $no_hp = $_POST['no_hp'];
  $email = $_POST['email'];
  $jenis_supplier = $_POST['jenis_supplier'];
  $nama_sales = $_POST['nama_sales'];


  $sql = mysqli_query($koneksi,"UPDATE supplier SET nama_supplier='$nama_supplier',alamat_supplier='$alamat_supplier',no_hp='$no_hp',email='$email',jenis_supplier='$jenis_supplier',nama_sales='$nama_sales' WHERE id_supplier='$id'");

  if ($sql) {

    ?>
    <script type="text/javascript">
      alert("Data Berhasil Diubah")
      window.location.href="?page=supplier";
    </script>
    <?php
  }
}

