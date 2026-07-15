<?php
$today = date("Y-m-d");
$id =$_GET['idrusak'];

$sql=mysqli_query($koneksi,"SELECT * FROM brg_masuk_peralatan
INNER JOIN perawatan_brg Using (kd_asset) 
INNER JOIN kategori_brg Using (id_kategori)
INNER JOIN service Using (id_perawatan)
WHERE id_service='$id'
");
$data1= mysqli_fetch_assoc($sql);


$query="SELECT max(id_disposal)as maxid from disposal";
$hasil= mysqli_query($koneksi, $query);
$data=mysqli_fetch_array($hasil);
$id_disposal = $data['maxid'];

$no_urut = (int) substr($id_disposal,3,6);
$no_urut++;
$char ="DPS";
$newid =$char.sprintf("%06s", $no_urut);

?>

<div class="container-fluid">
<div class="row">
<div class="col-sm-5 mt-3">
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Data Aset</h3>
    </div>
    <form role="form"method="POST" enctype="multipart/form-data">
      <div class="card-body"> 
                  
        <div class="form-group">
          <label for="exampleInputEmail1">Kode Asset</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?php  echo $data1['kd_asset'] ?>" placeholder="Masukkan Nama Kategori"name="kd_asset"readonly>
        </div>   
      
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Aset</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?php  echo $data1['nama_barang'] ?>" placeholder="Masukkan Nama Kategori"name="nama_barang"readonly>
        </div>    
        
        <div class="form-group">
          <label for="exampleInputEmail1">Kategori</label>
          
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?php  echo $data1['kategori'] ?>" placeholder="Masukkan Nama Kategori"name="kategori"readonly>
        </div>     
                  

        <div class="form-group">
          <label for="exampleInputEmail1">Status</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?php  echo $data1['kondisi_brg'] ?>" placeholder="Masukkan Nama Kategori"name="kondisi_brg"readonly>
        </div>   
        <div class="form-group">
          <label for="exampleInputEmail1">Catatan Kerusakan</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?php  echo $data1['catatan'] ?>" placeholder="Masukkan Nama Kategori"name="catatan"readonly>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Jumlah Aset</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?php  echo $data1['quantity'] ?>" placeholder="Masukkan Nama Kategori"name="quantity"readonly>
        </div>         
                  
      </div>
</div>
</div>


<div class="col-sm-7 mt-3">
<div class="card card-danger">
    <div class="card-header">
        <h3 class="card-title">Disposal Asset</h3>
    </div>
    <form role="form"method="POST" enctype="multipart/form-data">
      <div class="card-body"> 
          
        <div class="form-group">
        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Tanggal Disposal</label>
            <div class="col-sm-5">
                <input type="date" class="form-control" class="form-control" name="tgl_disposal" id="exampleInputEmail1" value="<?= $today; ?>" >
            </div>
        </div> 
      
        <div class="form-group">
          <label for="exampleInputEmail1">Status Barang</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="Disposal" placeholder="Masukkan Nama Kategori"name="status_brg"readonly>
        </div>    
        <div class="form-group">
            <h5><b> Catatan Disposal</b></h5>
            <textarea name="catatan_disposal" id="" cols="20" rows="2"class="form-control"id="exampleInputEmail1"placeholder="Input Perbaikan"></textarea>
        </div> 
        <div class="">
            <button onclick="return confirm('Apakah Anda Yakin untuk Melakukan Disposal Pada Asset Ini ??')" type="submit" name="simpan"  class="btn btn-success btn">Simpan</button>
        </div>             
      </div>
    </form>
</div>
</div>
  </div>
</div>
<?php
            
            if(isset($_POST['simpan'])){
              $kd_asset = $data1['kd_asset'];

              $tgl_disposal= $_POST['tgl_disposal'];
              $catatan_disposal= $_POST['catatan_disposal'];
          
              $masalah= $_POST['masalah'];
              $status_brg= $_POST['status_brg'];
              $kondisi_brg='Disposal';

                $query = "INSERT INTO disposal (id_disposal, id_service, tgl_disposal, catatan_disposal) VALUES
                  ('$newid', '$id', '$tgl_disposal', '$catatan_disposal')";
                $sql = $koneksi->query($query);

                $query4 = "UPDATE brg_masuk_peralatan SET kondisi_brg='$kondisi_brg' WHERE kd_asset='$kd_asset'";
                $sql4 = $koneksi->query($query4);

            if($sql){
              ?>
            <script type="text/javascript">
              alert("DATA BERHASIL DISIMPAN")
              window.location.href="?page=kerusakan_brg";
            </script>
            <?php
            }

            
          }
            

            ?>
            <?php
            
         