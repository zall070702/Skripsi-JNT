<?php

include "../koneksi.php";


require_once "../koneksi.php";

$token = $_GET['token'] ?? '';

$query = mysqli_query($koneksi,"
SELECT *
FROM brg_masuk_peralatan
WHERE qr_token='$token'
");

$asset = mysqli_fetch_assoc($query);

if(!$asset){
    die("QR Code tidak valid.");
}

$kd_asset = $asset['kd_asset'];


$sql1=mysqli_query($koneksi," SELECT * FROM pengajuan_msk
WHERE id_pengajuan_msk ='$kd_asset' ") or drop ($koneksi->error);
$data1= mysqli_fetch_assoc($sql1);

$sql=mysqli_query($koneksi," SELECT * FROM pengajuan_dtl_mmsk
WHERE id_pengajuan_msk ='$kd_asset' ");
$data= mysqli_fetch_assoc($sql);



date_default_timezone_set('Asia/Jakarta');

$bulan1 = $_POST['bulan'] ?? '';
$tahun = $_POST['tahun'] ?? '';


 
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


  <div class="card mt-3 card-primary">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <table class="table table-borderless" style="width: 100%"> 
                    
                      <td><center><img src="../dist/img/logo.png" width="1400px" height="170px"></center></td>
                    </tr>
                    <th><hr></th>
                    </tr>
                    <tr>
                    
                    <th><h3><center><b> DATA BARANG ASET </b></center></h3></th>
                    </tr>
                  </table><?php

$sql= mysqli_query($koneksi,"SELECT * FROM brg_masuk_peralatan 
INNER JOIN kategori_brg Using (id_kategori)
WHERE kd_asset ='$kd_asset' ");
while ($data=$sql->fetch_assoc()) {
?>
   <!-- <h4><center><b>NOTA PEMBELIAN </h4> <br><h6> ID "<?php echo $data['id_pengajuan'] ?>"<br> Nama asset "<?php echo $data['nama_barang'] ?>" </b></center> </h6> -->
<div class="wrapper">
   <h2><center><b style="color:black;"> <br></b></center></h2>
   <div class="row">
      <div class="col-12">
        <h2 class="page-header">
       
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <div class="row invoice-info">
      <div class="col-sm-6 invoice-col">
      
      </div>
      <!-- /.col -->
    
      <!-- /.col -->
    
      <!-- /.col -->
    </div>
    <?php

break;
}
   ?>

<?php

include '../koneksi.php';
require_once '../vendor/autoload.php';

use Picqer\Barcode\BarcodeGeneratorSVG;

$generator = new BarcodeGeneratorSVG();

$token = $_GET['token'] ?? '';

$sql = mysqli_query($koneksi,"
SELECT *
FROM brg_masuk_peralatan
WHERE qr_token='$token'
");

$data = mysqli_fetch_assoc($sql);


?>


<img src="/JNT/qr_code/<?php echo $data['qr_code']; ?>" width="150">
<?php

$sql = mysqli_query($koneksi,"
SELECT
    brg_masuk_peralatan.*,
    brg_masuk_peralatan.status AS status_asset,
    kategori_brg.kategori,
    pengajuan_dtl_mmsk.*
FROM brg_masuk_peralatan
INNER JOIN kategori_brg USING(id_kategori)
INNER JOIN pengajuan_dtl_mmsk USING(id_pengajuan)
WHERE kd_asset='$kd_asset'
");

while ($data=$sql->fetch_assoc()) {
?>
    <!-- <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>NO</th>
            <th>ID Pengajuan</th>
            <th>Nama Barang </th>
            <th>Jenis Barang</th>
            <th>Supplier</th>
            <th>Qty</th>
            <th>Harga Satuan</th>
            <th>Total Harga</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>1</td>
            <td><?php echo $data['id_pengajuan'] ?></td>
            <td><?php echo $data['nama_barang'] ?></td>
            <td><?php echo $data['nama_kategori'] ?></td>
            <td><?php echo $data['nama_supplier'] ?></td>
            <td><?php echo $data['qty'] ?></td>
            <td>Rp.<?php echo number_format($data['harga']); ?></td>
            <td>Rp.<?php echo number_format($data['total']); ?></td>
          </tr>
        
          <tbody>

          </tbody>
        </table>
      </div>
     
    </div> -->
    <table class="table table-borderless" style="width: 90%">
          <br>
          <br>
              <tr>
                <td style="text-align: left; width: 30%;"><strong><h5><b>Nomor asset </h5></b></strong></td>
                <td style="text-align: left; width: 60%;"><strong><h5>:&nbsp<b> <?php echo $data['kd_asset'] ?></h5></b></strong></td>
              </tr>
              
              <tr>
                <td style="text-align: left; width: 30%;"><strong><h5>Nama asset</h5></strong></td>
                <td style="text-align: left; width: 60%;"><strong><h5>:&nbsp <?php echo $data['nama_barang'] ?></h5></strong></td>
              </tr>
              <tr>
                <td style="text-align: left; width: 30%;"><strong><h5>Kategori Asset</h5></strong></td>
                <td style="text-align: left; width: 60%;"><strong><h5>:&nbsp <?php echo $data['kategori'] ?></h5></strong></td>
              </tr>
              <tr>
                <td style="text-align: left; width: 30%;"><strong><h5>Merek</h5></strong></td>
                <td style="text-align: left; width: 60%;"><strong><h5>:&nbsp <?php echo $data['merek'] ?></h5></strong></td>
              </tr><tr>
                <td style="text-align: left; width: 30%;"><strong><h5>SN</h5></strong></td>
                <td style="text-align: left; width: 60%;"><strong><h5>:&nbsp <?php echo $data['sn'] ?></h5></strong></td>
              </tr><tr>
                <td style="text-align: left; width: 30%;"><strong><h5>MDA</h5></strong></td>
                <td style="text-align: left; width: 60%;"><strong><h5>:&nbsp <?php echo $data['mda'] ?></h5></strong></td>
              </tr>
              
              <tr>
                <td style="text-align: left; width: 30%;"><strong><h5>Status</h5></strong></td>
                <td style="text-align: left; width: 60%;"><strong><h5>:&nbsp <?php echo $data['status_asset'] ?></h5></strong></td>
              </tr>
              <tr>
                <td style="text-align: left; width: 30%;"><strong><h5>Kondisi</h5></strong></td>
                <td style="text-align: left; width: 60%;"><strong><h5>:&nbsp <?php echo $data['kondisi_brg'] ?></h5></strong></td>
              </tr>


              <tr>
                <td style="text-align: left; width: 30%;"><strong><h5>Kondisi</h5></strong></td>
                <td style="text-align: left; width: 60%;"><strong><h5>:&nbsp <?php echo $data['id_dp'] ?></h5></strong></td>
              </tr>


              <tr>
                <td style="text-align: left; width: 30%;"><strong><h5>Tanggal Barang Diterima</h5></strong></td>
                <td style="text-align: left; width: 60%;"><strong><h5>:&nbsp <?php echo tgl_indo($data['tgl_diterima'])?></h5></strong></td>
              </tr>
             
             
            </table>


<div class="card card-gray card-tabs">
  <div class="card-header p-0 pt-1">
    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
      <li class="pt-2 px-3"><h3 class="card-title">Pencatatan Data Barang Asset</h3></li>
      
    </ul>
</div>
  <div class="card-body">
    <div class="tab-content" id="custom-tabs-two-tabContent">
      <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
      <div class = "card mt-1 card-success">
        <div class = " card-header">
        <h5 class="header">Data Catatan Pemakaian Asset </h5>
        </div>
        <div class="card-body">
        <hr>
        <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th>No</th>
        <th>Kode Asset</th>
        <th>Nama Karyawan</th>
        <th>Jabatan</th>
        <th>Departemen</th>
        <th>Tanggal Pemakaian</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $no = 1;
            $sql = mysqli_query($koneksi,"SELECT * FROM brg_keluar_peralatan 
            INNER JOIN asset_peralatan Using (kd_asset)
            INNER JOIN karyawan Using (id_karyawan)
            Where kd_asset='$kd_asset'
            ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['kd_asset'];?></td>
                <td><?php echo $data['nama'];?></td>
                <td><?php echo $data['jabatan'];?></td>
                <td><?php echo $data['departemen'];?></td>
                <td><?php echo $data['tgl_keluar']; ?></td>
            </tr>
            <?php
            }
        ?>
        </tbody>
    </table>
            </div>
            </div>
        </div>
      <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
      <div class = "card mt-1 card-success">
        <div class = " card-header">
        <h5 class="header">Data Catatan Maintenance Aset </h5>
        </div>
        <div class="card-body">
        <hr>
        <table id="example1" class="table table table-striped table-hover">
            <thead class="">
            <tr align='center'>
            <th>No</th>
            <th>Id Maintenance</th>
            <th>Tanggal Maintenance</th>
            <th>Kode Asset</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Jenis Maintenance</th>
            <th>Kondisi</th>
            <th>Status Barang</th>
            <th>Catatan</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $no = 1;
                $sql = mysqli_query($koneksi,"SELECT * FROM  perawatan_brg
                INNER JOIN brg_masuk_peralatan Using (kd_asset) 
                INNER JOIN kategori_brg Using (id_kategori)
                Where kd_asset='$kd_asset'
                order by tgl_perawatan DESC
                ");
                
                while ($data= mysqli_fetch_array($sql)) {
                ?> <tr align='center'>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $data['id_perawatan']; ?></td>
                    <td><?php echo tgl_indo($data['tgl_perawatan']) ?></td>
                    <td><?php echo $data['kd_asset'];?></td>
                    <td><?php echo $data['nama_barang'];?></td>
                    <td><?php echo $data['kategori'];?></td>
                    <td><?php echo $data['jenis_maintenance'];?></td>
                    <td><?php echo $data['kondisi'];?></td>
                    <td><?php echo $data['status_brg'];?></td>
                    <td><?php echo $data['catatan'];?></td>
                </tr>
                <?php
                }
            ?>
                
                
                </tbody>
            </table>
            </div>
            </div>
        </div>
      <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
      <div class = "card mt-1 card-success">
        <div class = " card-header">
        <h5 class="header">Data Catatan Service Aset </h5>
        </div>
        <div class="card-body">
        <hr>
        <table id="example1" class="table table table-striped table-hover">
            <thead class="">
            <tr align='center'>
            <th>No</th>
            <th>Id Service</th>
            <th>Tanggal Maintenance</th>
            <th>Kode Asset</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Jenis Service</th>
            <th>Kondisi</th>
            <th>Status Barang</th>
            <th>Catatan</th>
            <th>Tempat Service</th>
            <th>Lokasi Aset</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $no = 1;
                $sql = mysqli_query($koneksi,"SELECT * FROM service 
            INNER JOIN perawatan_brg Using (id_perawatan)
            INNER JOIN brg_masuk_peralatan Using (kd_asset)
            INNER JOIN kategori_brg Using (id_kategori)
            INNER JOIN jasa_service Using (id_jasa)
            INNER JOIN dp Using (id_dp)
            Where status_brg='Service' and kd_asset='$kd_asset'
            ");
            
            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
            <td><?php echo $no++;?></td>
            <td><?php echo $data['id_service'];?></td>
            <td><?php echo $data['tgl_selesai'];?></td>
            <td><?php echo $data['kd_asset'];?></td>
            <td><?php echo $data['nama_barang'];?></td>
            <td><?php echo $data['kategori'];?></td>
            <td><?php echo $data['jenis_maintenance'];?></td>
            <td><?php echo $data['kondisi'];?></td>
            <td><?php echo $data['status_brg'];?></td>
            <td><?php echo $data['catatan'];?></td>
            <td><?php echo $data['nama_service'];?></td>
            <td><?php echo $data['id_dp'];?></td>
                </tr>
                <?php
                }
            ?>
                
                
                </tbody>
            </table>
            </div>
            </div>
    </div>
  </div>
</div>




    <div>
      
     <!-- <h5><b>
      <br><p align="right">Rantau,&nbsp <?php echo tgl_indo(date('Y-m-d'))?> &nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>
            <br><?php echo $data['jabatan'] ?> &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>PT Hasnur Riung Sinergi Site BRE &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</br>         
            <br></br>   
            <br></br>
            
            &nbsp&nbsp
            <p align="right"><?php echo $data['nama'] ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp</p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>
            </div>
            <br></br>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </h5></b> -->
    </div>
    <?php
// break;
}
   ?>
    <!-- /.row -->
 </section>
</div>
                
              </form>
            </div>
            <input type="button" class="noPrint button" value="Cetak Surat" onclick="window.print()"></center>
                      </div>
                  </div>
              </div>
          </div>
    </div>                                