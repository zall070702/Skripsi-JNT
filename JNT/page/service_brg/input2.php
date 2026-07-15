<?php
$today = date("Y-m-d");
$id =$_GET['idservice'];

$sql=mysqli_query($koneksi,"SELECT * FROM brg_masuk_peralatan
INNER JOIN perawatan_brg Using (kd_asset) 
INNER JOIN kategori_brg Using (id_kategori)
WHERE id_perawatan='$id'");
$data1= mysqli_fetch_assoc($sql);


$query="SELECT max(id_service)as maxid from service";
$hasil= mysqli_query($koneksi, $query);
$data=mysqli_fetch_array($hasil);
$id_service = $data['maxid'];

$no_urut = (int) substr($id_service,3,6);
$no_urut++;
$char ="SRV";
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


<div class="col sm-7 mt-3">
<div class="card card-primary card-tabs">
  <div class="card-header p-0 pt-1">
    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
      <li class="pt-2 px-3"><h3 class="card-title">Pilih Tempat Sevice</h3></li>
      <li class="nav-item">
        <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Office GW J&T Express </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Jasa Service</a>
      </li>
    </ul>
</div>
  <div class="card-body">
    <div class="tab-content" id="custom-tabs-two-tabContent">
      <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
        <div class="card mt-1 card-gray">
          <div class="card-header">
            <h3 class="card-title">Input Perbaikan</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="POST" enctype="multipart/form-data">
            <div class="card-body">             
                
            <div class="form-group">
                    <label for="exampleInputEmail1">Pilih Tempat Service</label>
                   <input type="text" name="id_jasa"class="form-control" value="Karywan IT GW J&T Express" placeholder="Karywan IT GW J&T Express"> 
                   
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Tanggal Service</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" class="form-control" name="tgl_pengajuan" id="exampleInputEmail1" value="<?= $today; ?>" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Upload Foto Kerusakan</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file"  id="exampleInputFile"name="foto_kerusakan">
                            
                        </div>
                        </div>
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
                    <option value="0%">0%</option>
                  </select>
                </div>

                    <div class="form-group">
                    <h5><b> Catatan Perbaikan</b></h5>
                        <textarea name="catatan_perbaikan" id="" cols="20" rows="2"class="form-control"id="exampleInputEmail1"placeholder="Input Perbaikan"></textarea>
            
                    </div>
              <!-- /.card-body -->

              <div class="">
                <button type="submit" name="simpan_1"  class="btn btn-success btn">Simpan</button>
              </div>
            </div>
            
          </form>
        </div>
      </div>
      <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
      <div class="card mt-1 card-gray">
          <div class="card-header">
            <h3 class="card-title">Tambah Pengajuan Service</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Pilih Tempat Service</label>
                   <select name="id_jasa"class="form-control" >
                      <option value=""> <b> -->PILIH<-- </b></option>
                      <?php
                        
                       $sql= mysqli_query($koneksi,"SELECT * FROM jasa_service ");
                       while ($data= mysqli_fetch_array($sql)){
                         echo "<option value='$data[id_jasa]'>$data[nama_service]</option>";
                       
                    
                        }
                     
                      ?>
                   </select> 
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Tanggal Pengajuan Service</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" class="form-control" name="tgl_pengajuan" id="exampleInputEmail1" value="<?= $today; ?>" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Upload Foto Kerusakan</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file"  id="exampleInputFile"name="foto_kerusakan">
                            
                        </div>
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
                        <option value="0%">0%</option>
                      </select>
                    </div>

                    </div>
                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">Harga Estimasi</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Harga"name="harga_perbaikan">
                    </div> -->
                             
                
              <!-- /.card-body -->

              <div class="">
                <button type="submit" name="simpan_2"  class="btn btn-success btn">Simpan</button>
              </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
                <?php
            
                if(isset($_POST['simpan_1'])){
                  $kd_asset = $data1['kd_asset'];

                  $tgl_pengajuan= $_POST['tgl_pengajuan'];
                  $catatan_perbaikan= $_POST['catatan_perbaikan'];
              
                  $masalah= $_POST['masalah'];
                  $id_jasa= 'JS001';
                  $status_brg= $_POST['status_brg'];
                  $kondisi= $_POST['kondisi'];
    
                  $proses= 'SELESAI';
                
                  $foto_kerusakan = $_FILES['foto_kerusakan']['name'];
                  $lokasi = $_FILES['foto_kerusakan']['tmp_name'];
                  $upload = move_uploaded_file($lokasi,"dist/img/".$foto_kerusakan);
    
                  if($upload){
                    $query = "INSERT INTO service (id_service,id_perawatan,tgl_pengajuan_service,tgl_service_diterima, tgl_selesai, foto_kerusakan,id_jasa,catatan_perbaikan) VALUES
                      ('$newid','$id','$tgl_pengajuan','$tgl_pengajuan','$tgl_pengajuan','$foto_kerusakan','$id_jasa','$catatan_perbaikan')";
                    $sql = $koneksi->query($query);

                    $query3 = "UPDATE perawatan_brg SET proses='$proses' WHERE id_perawatan='$id'";
                    $sql3 = $koneksi->query($query3);

                    $query4 = "UPDATE brg_masuk_peralatan SET kondisi_asset='$kondisi', kondisi_brg='$status_brg' WHERE kd_asset='$kd_asset'";
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
                <?php
            
            if(isset($_POST['simpan_2'])){

              $tgl_pengajuan= $_POST['tgl_pengajuan'];
              
              $masalah= $_POST['masalah'];
              $id_jasa= $_POST['id_jasa'];
                  $status_brg= $_POST['status_brg'];
                  $kondisi= $_POST['kondisi'];



              $status1= 'PENDING';
            
              $foto_kerusakan = $_FILES['foto_kerusakan']['name'];
              $lokasi = $_FILES['foto_kerusakan']['tmp_name'];
              $upload = move_uploaded_file($lokasi,"dist/img/".$foto_kerusakan);


              if($upload){
            $query = "INSERT INTO service (id_service,id_perawatan,tgl_pengajuan_service,status1,foto_kerusakan,id_jasa) VALUES
              ('$newid','$id','$tgl_pengajuan','$status1','$foto_kerusakan','$id_jasa')";
            $sql = $koneksi->query($query);

            
            $proses= 'PENDING';
            $query2 = "UPDATE perawatan_brg SET proses='$proses' WHERE id_perawatan='$id'";
           $sql2 = $koneksi->query($query2);
           $query4 = "UPDATE brg_masuk_peralatan SET kondisi_asset='$kondisi', kondisi_brg='$status_brg' WHERE kd_asset='$kd_asset'";
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
         