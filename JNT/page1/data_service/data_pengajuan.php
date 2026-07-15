<?php

$nama = $data['nama'];
$id =$_GET['idservice'];

$sql1=mysqli_query($koneksi," SELECT * FROM pengajuan_msk
WHERE id_pengajuan_msk ='$id' ");
$data1= mysqli_fetch_assoc($sql1);

$sql=mysqli_query($koneksi," SELECT * FROM pengajuan_dtl_mmsk
WHERE id_pengajuan_msk ='$id' ");
$data= mysqli_fetch_assoc($sql);

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


  <div class="card mt-3 card-primary">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <table class="table table-borderless" style="width: 100%"> 
                    <tr>
                    <th style="text-align: right;">Tanggal Cetak :&nbsp&nbsp<?php echo tgl_indo(date('Y-m-d'))?> </th>
                    <tr>
                      <td><center><img src="dist/img/logo_report_hrs.jpg" width="1400px" height="170px"></center></td>
                    </tr>
                    <th><hr></th>
                    </tr>
                    <tr>
                    
                    <th><h3><center><b> SURAT PENGAJUAN SERVICE BARANG ASSET </b></center></h3></th>
                    </tr>
                  </table><?php

$sql= mysqli_query($koneksi,"SELECT * FROM service 
INNER JOIN perawatan_brg Using (id_perawatan)
INNER JOIN brg_masuk_komputer Using (kd_asset_pc)
INNER JOIN kategori_brg Using (id_kategori)
WHERE id_service='$id'
AND status1 = 'DITERIMA'");
while ($data=$sql->fetch_assoc()) {
?>
   <!-- <h4><center><b>NOTA PEMBELIAN </h4> <br><h6> ID "<?php echo $data['id_pengajuan'] ?>"<br> Nama asset "<?php echo $data['nama_barang'] ?>" </b></center> </h6> -->
<div class="wrapper">
   <h2><center><b style="color:black;"> <br></b></center></h2>
   <div class="row">
      <div class="col-12">
        <h2 class="page-header">
       
          <small class="float-right"><strong><h5><b> Rantau, <?php echo tgl_indo($data['tgl_service_diterima'])?></b></h5></strong></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <div class="row invoice-info">
      <div class="col-sm-6 invoice-col">
    <h5>  <b> <p>Nomor &nbsp&nbsp&nbsp&nbsp :  <?php echo $data['id_service'] ?>/ <?php echo $data['id_pengajuan'] ?><br>Perihal &nbsp&nbsp &nbsp: Pengajuan Service Asset  <?php echo $data['kategori'] ?> <?php echo $data['nama_barang'] ?></p>
       <p> Kepada Yth <br>Project Manager  PT HASNUR RIUNG SINERGI SITE AGM <br>Desa Tatakan, Kabupaten Tapin <br></b></p></b></h5>
       <p> </p><br>
       <br>
      
      </div>
      <!-- /.col -->
    
      <!-- /.col -->
    
      <!-- /.col -->
    </div><h5>
    <p>
       Bersamaan dengan adanya surat ini kami dari Admin IT ingin mengajukan service asset  
       <!-- <b><?php echo $data['kategori'] ?> <?php echo $data['nama_barang'] ?></b>, -->
       ,<br> berikut data asset yang kami ajukan service &nbsp :
      </p>
    </h5>
    <?php

break;
}
   ?>

<?php

$sql= mysqli_query($koneksi,"SELECT * FROM service 
INNER JOIN perawatan_brg Using (id_perawatan)
INNER JOIN brg_masuk_komputer Using (kd_asset_pc)
INNER JOIN kategori_brg Using (id_kategori)
INNER JOIN jasa_service Using (id_jasa)
WHERE id_service='$id'
AND status1 = 'DITERIMA'");
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
          <tr>
                <td style="text-align: left; width: 30%;"><strong><h5><b>ID Perbaikan </h5></b></strong></td>
                <td style="text-align: left; width: 60%;"><strong><h5>:&nbsp<b> <?php echo $data['id_service'] ?></h5></b></strong></td>
              </tr>
              <tr>
                <td style="text-align: left; width: 30%;"><strong><h5><b>Kode asset </h5></b></strong></td>
                <td style="text-align: left; width: 60%;"><strong><h5>:&nbsp<b> <?php echo $data['id_pengajuan'] ?>/<?php echo $data['kd_asset_pc'] ?></h5></b></strong></td>
              </tr>
              
              <tr>
                <td style="text-align: left; width: 30%;"><strong><h5>Nama asset</h5></strong></td>
                <td style="text-align: left; width: 60%;"><strong><h5>:&nbsp <?php echo $data['nama_barang'] ?></h5></strong></td>
              </tr>
              <tr>
                <td style="text-align: left; width: 30%;"><strong><h5>Kerusakan</h5></strong></td>
                <td style="text-align: left; width: 60%;"><strong><h5>:&nbsp <?php echo $data['catatan'] ?></h5></strong></td>
              </tr>
              <tr>
                <td style="text-align: left; width: 30%;"><strong><h5>Foto Asset Rusak</h5></strong></td>
                <td style="text-align: left; width: 60%;"><strong><h5>:&nbsp  <img src="dist/img/<?php echo $data['foto_kerusakan'];?>"height="100px" width="200x"style="border: radius 50%;"/></h5></strong></td>
              </tr>
              <tr>
                <td style="text-align: left; width: 30%;"><strong><h5>Status</h5></strong></td>
                <td style="text-align: left; width: 60%;"><strong><h5>:&nbsp <?php echo $data['status1'] ?></h5></strong></td>
              </tr>
            
              <tr>
                <td style="text-align: left; width: 30%;"><strong><h5>Jasa Service</h5></strong></td>
                <td style="text-align: left; width: 60%;"><strong><h5>:&nbsp <?php echo $data['nama_service'] ?></h5></strong></td>
              </tr>
              <tr>
                <td style="text-align: left; width: 30%;"><strong><h5>Tanggal Pengajuan</h5></strong></td>
                <td style="text-align: left; width: 60%;"><strong><h5>:&nbsp <?php echo tgl_indo($data['tgl_pengajuan_service'])?></h5></strong></td>
              </tr>
              <tr>
                <td style="text-align: left; width: 30%;"><strong><h5>Tanggal Diterima</h5></strong></td>
                <td style="text-align: left; width: 60%;"><strong><h5>:&nbsp <?php echo tgl_indo($data['tgl_service_diterima'])?></h5></strong></td>
              </tr>
              <tr>
                <td style="text-align: left; width: 30%;"><strong><h5>Nama Validator</h5></strong></td>
                <td style="text-align: left; width: 60%;"><strong><h5>:&nbsp MH Usep Arif Topnai</h5></strong></td>
              </tr>
             
             
            </table>
    <br><br><br>
    <div>
        <h5>
          <p>
            Demikian surat pengajuan perbaikan asset ini kami sampaikan, &nbsp atas perhatian kami ucapkan Terimakasih.
        </p>
      </h5>
      </div>
<br><br><br>
<table class="table-borderless" style="width: 100%">
          <br>
              <tr>
                <td style="text-align: center; width: 33%;"><strong><h5><b>Disetujui,&nbsp&nbsp Tapin,<?php echo tgl_indo($data['tgl_service_diterima'])?></h5></b></strong></td>
                <td style="text-align: center; width: 33%;"></td>
                <td style="text-align: center; width: 33%;"><strong><h5><b> Tapin,<?php echo tgl_indo($data['tgl_pengajuan_service'])?></b></h5></strong></td>
              </tr>
              
              <tr>
                <td style="text-align: center; width: 33%;"><strong><h5><b>Project Manager</h5></b></strong></td>
                <td style="text-align: center; width: 33%;"></td>
                <td style="text-align: center; width: 33%;"><strong><h5><b><?php echo $data['jabatan'] ?></h5></b></strong></td>
              </tr>
              <tr>
                <td style="text-align: center; width: 33%;"></td>
                <td style="text-align: center; width: 33%;"></td>
                <td style="text-align: center; width: 33%;"></td>
              </tr>
              <tr>
                <td style="text-align: center; height: 80px;"><img src="dist/img/PM.PNG"height="100px" width="100px"></td>
                <td style="text-align: center; width: 80px;"> </td>
                <td style="text-align: center; height: 80px;"><img src="dist/img/Admin.PNG"height="100px" width="100px"></td>
              </tr>
              <tr>        
                <td style="text-align: center; width: 33%;"><strong><h5><b>MH Usep Arif Topani</h5></b></strong></td>
                <td style="text-align: center; width: 33%;"></td>
                <td style="text-align: center; width: 33%;"><strong><h5><b><?php echo $data['nama'] ?></h5></b></strong></td>
              </tr>
              <tr>
                <td style="text-align: center; width: 33%;"><strong><h5><b>NRP:7867899</h5></b></strong></td>
                <td style="text-align: center; width: 33%;"></td>
                <td style="text-align: center; width: 33%;"><strong><h5><b>NRP:<?php echo $data['nrp'] ?></h5></b></strong></td>
              </tr>
            </table>
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