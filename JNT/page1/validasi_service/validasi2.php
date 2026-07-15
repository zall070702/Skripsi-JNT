<?php
$today = date("Y-m-d");

$nama = $data['nama'];
$id =$_GET['idservice'];

$sql1=mysqli_query($koneksi,"SELECT * FROM service 
INNER JOIN perawatan_brg Using (id_perawatan)
INNER JOIN brg_masuk_peralatan Using (kd_asset)
INNER JOIN kategori_brg Using (id_kategori)
INNER JOIN jasa_service Using (id_jasa)
 WHERE id_service ='$id' ");
$data1= mysqli_fetch_assoc($sql1);
include "koneksi.php";


date_default_timezone_set('Asia/Jakarta');

$bulan1 = $_POST['bulan'];
$tahun = $_POST['tahun'];


 
function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  
  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun
 
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function bulan_indo($bulan_angka) {
 $bulan1 = array(1=>'JANUARI', 
      'FEBRUARI', 
      'MARET', 
      'APRIL', 
      'MEI', 
      'JUNI', 
      'JULI', 
      'AGUSTUS', 
      'SEPTEMBER', 
      'OKTOBER', 
      'NOVEMBER', 
      'DESEMBER'
     );

 return $bulan1[$bulan_angka];
}



?>

<div class="container-fluid">
<div class="row">
<div class="col-sm-5 mt-3">
<div class="card card-success">
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


        <div class="col-sm-7 mt-3">
          <div class="card card-yellow ">
              <div class="card-header">
                <h3 class="card-title">KERUSAKAN</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body"> 
                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Pengajuan Service </label>
                    <input type="date" class="form-control" id="exampleInputEmail1" name="tgl_pengajuan_service"
                    value="<?php echo $data1['tgl_pengajuan_service'];?>"readonly>
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kerusakan</label>
                    <input type="text-area" class="form-control" id="exampleInputEmail1" name="catatan"
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
                    <h5><b> Catatan Pengajuan</b></h5>
                        <textarea name="catatan_pengajuan" id="" cols="20" rows="2"class="form-control"id="exampleInputEmail1"placeholder="Tulis Catatan Pengajuan"></textarea>
                    </div>
                </div>  
                <div class="card-footer"  align='right'>
                  <button type="submit" class="btn btn-success" name="simpan">Terima</button>
                  <button type="submit" class="btn btn-danger" name="tolak">Tolak</button>
                </div>
          </div>
        </div>
      </form>


<?php    
     if (isset($_POST['simpan'])){ 
      $nama = $_POST['nama_verif'];
      $catatan_pengajuan = $_POST['catatan_pengajuan'];
      $id_perawatan = $data1['id_perawatan'];
      $status1= 'DITERIMA';
      
  $proses = 'PROSES';

  //mengubah status
  $query = "UPDATE service SET status1='$status1', catatan_pengajuan='$catatan_pengajuan', tgl_service_diterima='$today' WHERE id_service='$id'";
  $sql = $koneksi->query($query);
  
  $query1 = "UPDATE perawatan_brg SET proses='$proses' WHERE id_perawatan='$id_perawatan'";
  $sql2 = $koneksi->query($query1);

  if($sql){
    ?>
    <script type="text/javascript">
      alert("Data Berhasil Disimpan")
      window.location.href="?page1=validasi_service"; 
    </script>

  <?php
  }
}
?> 

<?php    
     if (isset($_POST['tolak'])){ 
      $nama = $_POST['nama_verif'];
      $catatan_pengajuan = $_POST['catatan_pengajuan'];
      $id_perawatan = $data1['id_perawatan'];
      $status1= 'DITOLAK';
      
  $proses = 'SELESAI';

  //mengubah status
  $query = "UPDATE service SET status1='$status1', catatan_pengajuan='$catatan_pengajuan', tgl_service_diterima='$today', tgl_selesai='$today' WHERE id_service='$id'";
  $sql = $koneksi->query($query);
  
  $query1 = "UPDATE perawatan_brg SET proses='$proses' WHERE id_perawatan='$id_perawatan'";
  $sql2 = $koneksi->query($query1);

  if($sql){
    ?>
    <script type="text/javascript">
      alert("Data Berhasil Disimpan")
      window.location.href="?page1=validasi_service"; 
    </script>

  <?php
  }
}
?>                                   