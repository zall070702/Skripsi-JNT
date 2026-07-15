<?php
$query = "SELECT max(id_pr) as maxid from pr";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);
$id_pr = $data['maxid'];

$nourut = (int) substr($id_pr,3,3);
$nourut++;
$char = "PR";
$newid = $char . sprintf("%03s" , $nourut);

?>
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data PR/PO</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID PR</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="id_pr" 
                    value="<?php echo $newid;?>" placeholder="Masukkan Id" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">No PR</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="no_pr"  >
                  </div>    
                  <div class="form-group">
                    <label for="exampleInputEmail1">Item</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="item"  >
                  </div>    
                  <div class="form-group">
                  <label for="exampleInputEmail1">Quality</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="quality"  >
                  </div>    
                  <div class="form-group">
                    <label for="exampleInputEmail1">Harga</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="harga"  >
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">MDA</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="mda"  >
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1" >Tanggal PR</label>
                            <div class="col-sm-4">
                                <input type="date" request  class="form-control" name="tgl_pr" id="exampleInputEmail1">
                            </div>
                  </div>    
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status PR</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="status_pr"  >
                  </div>               
                  <div class="form-group">
                    <label for="exampleInputEmail1">No PO</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="no_po"  >
                  </div>    
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status PO</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="status_po"  >
                  </div>     
                  <div class="form-group">
                    <label for="exampleInputEmail1" >Tanggal Tiba</label>
                            <div class="col-sm-4">
                                <input type="date"   class="form-control" name="tgl_tiba" id="exampleInputEmail1">
                            </div>
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="status"  >
                  </div>   
                  <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="keterangan"  >
                  </div>       
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="simpan"  class="btn btn-primary">Submit</button>
                  <a href="?page=pr"><button type="submit" name="batal"  class="btn btn-danger">Batal</a>
                </div>
                
              </form>
            </div>
<?php
if (isset($_POST['simpan'])){

$id_pr = $_POST['id_pr'];
$no_pr = $_POST['no_pr'];
$item = $_POST['item'];
$quality = $_POST['quality'];
$harga = $_POST['harga'];
$mda = $_POST['mda'];
$tgl_pr = $_POST['tgl_pr'];
$status_pr = $_POST['status_pr'];
$no_po = $_POST['no_po'];
$status_po = $_POST['status_po'];
$tgl_tiba = $_POST['tgl_tiba'];
$status = $_POST['status'];
$keterangan = $_POST['keterangan'];



$sql = mysqli_query($koneksi,"INSERT INTO pr (id_pr,no_pr,item,quality,harga,mda,tgl_pr,status_pr,no_po,status_po,tgl_tiba,status,keterangan)VALUES('$id_pr','$no_pr','$item','$quality','$harga','$mda','$tgl_pr','$status_pr','$no_po','$status_po','$tgl_tiba','$status','$keterangan')");

  
  if ($sql) {
    ?>
    <script type="text/javascript">
      alert("Data Berhasil Disimpan")
      window.location.href="?page=pr";
    </script>
    <?php
  }


}
?>