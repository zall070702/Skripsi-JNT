<?php
$today = date("Y-m-d");
$id =$_GET['idservice'];

$sql=mysqli_query($koneksi,"SELECT * FROM service 
INNER JOIN perawatan_brg Using (id_perawatan)
INNER JOIN brg_masuk_peralatan Using (kd_asset)
INNER JOIN kategori_brg Using (id_kategori)
INNER JOIN jasa_service Using (id_jasa)
WHERE id_service='$id'");
$data1= mysqli_fetch_assoc($sql);

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
              <label for="exampleInputEmail1">Id Service</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="<?php  echo $data1['id_service'] ?>" placeholder="Masukkan Nama Kategori"name="kd_asset"readonly>
            </div> 

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
              <label for="exampleInputEmail1">Kerusakan</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="<?php  echo $data1['jenis_maintenance'] ?>" placeholder="Masukkan Nama Kategori"name="jenis_maintenance"readonly>
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
      <div class="card card-yellow ">
        <div class="card-header">
          <h3 class="card-title">DATA SERVICE SELESAI</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <div class="card-body"> 
          <div class="form-group">
            <label for="exampleInputEmail1">Tanggal Service </label>
            <input type="date" class="form-control" id="exampleInputEmail1" name="tgl_service"
            value="<?php echo $data1['tgl_pengajuan_service'];?>"readonly>
          </div> 
          <div class="form-group">
            <label for="exampleInputEmail1">Kerusakan</label>
            <input type="text-area" class="form-control" id="exampleInputEmail1" name="kerusakan"
            value="<?php echo $data1['catatan'];?>"readonly>
          </div> 
          <div class="form-group">
            <label for="exampleInputEmail1">Tempat Service</label>
            <input type="text-area" class="form-control" id="exampleInputEmail1" name="jasa_service"
            value="<?php echo $data1['nama_service'];?>"readonly>
          </div> 
          <div class="form-group">
            <label for="exampleInputEmail1">Foto Kerusakan</label>
            <div><center>
            <img class="overlay"src="dist/img/<?php echo $data1['foto_kerusakan']?>"height="200px" width="300px">
            </center>
            </div>
          </div> 
          <div class="form-group">
            <label for="exampleInputEmail1">Foto Nota</label>
            <div><center>
            <img class="overlay"src="dist/img/<?php echo $data1['foto_nota']?>"height="200px" width="300px">
            </center>
            </div>
          </div>  
          <div class="form-group">
            <label for="exampleInputEmail1">Harga Service</label>
            <input type="text-area" class="form-control" id="exampleInputEmail1" name="kerusakan"
            value="<?php echo $data1['harga_service'];?>"readonly>
          </div>   
          <div class="form-group">
            <label for="exampleInputEmail1">Catatan Service</label>
            <input type="text-area" class="form-control" id="exampleInputEmail1" name="catatan_perbaikan" placeholder="Tambah catatan service dari TOKO">
          </div> 
          
          <!-- <div class="form-group">
            <label for="exampleInputEmail1">Harga Perbaiakn 1 Aset</label>
            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Harga"name="hargap"value="<?php echo $data1['hargap'];?>"readonly>
          </div> -->


        
         
                
              </form>
            
            </div>
            </div>
            </section>
         