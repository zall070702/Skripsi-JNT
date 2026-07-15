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
          <h3 class="card-title">KERUSAKAN</h3>
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
            <label for="exampleInputEmail1">Foto Kerusakan</label>
            <div><center>
            <img class="overlay"src="dist/img/<?php echo $data1['foto_kerusakan']?>"height="200px" width="300px">
            </center>
            </div>
          </div> 
          <div class="form-group">
            <label for="exampleInputEmail1">Tempat Service</label>
            <input type="text-area" class="form-control" id="exampleInputEmail1" name="jasa_service"
            value="<?php echo $data1['nama_service'];?>"readonly>
          </div> 
          <div class="form-group">
            <label for="exampleInputEmail1">Pilih Status Barang</label>
            <select name="status_brg"class="form-control" >
              <option value=""> <b> -->PILIH<-- </b></option>
              <option value="Bagus"> <b> Bagus </b></option>
              <option value="Rusak"> <b> Rusak </b></option>
              
            </select> 
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Pilih Kondisi Barang</label>
              <select class="form-control" name="kondisi" required oninvalid="this.setCustomValidity('Kondisi Barang Belum Dimasukkan')" oninput="setCustomValidity('')">
                <option value="">Pilih Kondisi...</option>
                <option value="100%">100%</option>
                <option value="80%">80%</option>
                <option value="50%">50%</option>
                <option value="10%">10%</option>
              </select>
            </div>
          <div class="form-group">
            <label for="exampleInputFile">Upload Nota</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file"  id="exampleInputFile"name="foto_nota">
                
              </div>
              <div class="input-group-append">
                <span class="input-group-text" id="">Upload</span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Harga</label>
            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Harga"name="harga_service">
          </div>
          
          <div class="form-group">
                    <h5><b> Catatan Perbaikan</b></h5>
                        <textarea name="catatan_perbaikan" id="" cols="20" rows="2"class="form-control"id="exampleInputEmail1"placeholder="Tambah catatan service dari TOKO"></textarea>
            
                    </div>
          
          <!-- <div class="form-group">
            <label for="exampleInputEmail1">Harga Perbaiakn 1 Aset</label>
            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Harga"name="hargap"value="<?php echo $data1['hargap'];?>"readonly>
          </div> -->


        
          
        </div>  
        <div class="card-footer">
          <button type="submit" class="btn btn-success" name="simpan">Submit</button>
        </div>
      </div>
    </div>
                <?php
            
                if(isset($_POST['simpan'])){
                  $kd_asset = $data1['kd_asset'];

                  $id_service = $_POST['id_service'];
                  $harga_service = $_POST['harga_service'];
                  $id_perawatan = $data1['id_perawatan'];
                  $catatan_perbaikan = $_POST['catatan_perbaikan'];


                  $foto_nota = $_FILES['foto_nota']['name'];
                  $lokasi = $_FILES['foto_nota']['tmp_name'];


                  $status_brg= $_POST['status_brg'];
                  $kondisi= $_POST['kondisi'];
                  $proses='SELESAI';

                  if(!empty($lokasi)){

                    $upload = move_uploaded_file($lokasi,"dist/img/".$foto_nota);
            
                  $sql = mysqli_query($koneksi,"UPDATE service SET foto_nota='$foto_nota', harga_service='$harga_service', tgl_selesai=CURDATE(), catatan_perbaikan='$catatan_perbaikan' WHERE id_service='$id'"); 

                  $sql2 = mysqli_query($koneksi,"UPDATE perawatan_brg SET proses='$proses' WHERE id_perawatan='$id_perawatan'"); 
                  
                  $query4 = "UPDATE brg_masuk_komputer SET kondisi_asset='$kondisi', kondisi_brg='$status_brg' WHERE kd_asset='$kd_asset'";
                $sql4 = $koneksi->query($query4);

                if($sql){
                  ?>
                <script type="text/javascript">
                  alert("DATA BERHASIL DISIMPAN")
                  window.location.href="?page=service_brg";
                </script>
                <?php
                }

                
              }
                

              }
                ?>
                
              </form>
            
            </div>
            </div>
            </section>
         