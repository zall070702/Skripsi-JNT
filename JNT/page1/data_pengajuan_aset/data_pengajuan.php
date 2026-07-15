<?php

$nama = $data['nama'];
$id =$_GET['idpengajuanmsk'];

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
              <div class="card-header">
                <h3 class="card-title">Data Pengajuan Asset</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <table class="table table-borderless" style="width: 100%"> 
                  <h3><center><b> PENGAJUAN PEMBELIAN BARANG ASSET </b></center></h3>
                  
                    <tr>
                      <th style="text-align: left;">Nomor Pengajuan :&nbsp&nbsp<?= $data1['id_pengajuan_msk'] ?> </th>
                      <th style="text-align: right;">Tanggal Pengajuan :&nbsp&nbsp<?= tgl_indo($data1['tgl_masuk']) ?> </th>
                    </tr>
                    <tr>
                      <th>
                        <div class="col-md-3 col-12">
                        <label for="exampleInputEmail1">Nama Verifikator</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="nama_verif" 
                        value="<?php echo $data['nama_verif'];?>" readonly>
                        </div>
                      </th>
                    </tr>
                  </table>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table class="table table-striped">
                        <table id="example1" class="table table table-striped table-hover">
                          <thead class="">
                          <tr>
                          <th>No</th>
                          <th>Kode Barang Pengajuan</th>
                          <th>Nama Asset</th>
                          <th>Kategori Asset</th>
                          <th>Vendor</th>
                          <th>Estimasi Harga</th>
                          <th>Status</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php
                              $no = 1;
                              $sql = mysqli_query($koneksi," SELECT * FROM pengajuan_dtl_mmsk
                              INNER JOIN pengajuan_msk using(id_pengajuan_msk)
                              INNER JOIN karyawan using(id_karyawan)
                              INNER JOIN kategori_brg using(id_kategori)
                              INNER JOIN supplier using(id_supplier)
                              WHERE id_pengajuan_msk='$id'
                              ORDER BY pengajuan_dtl_mmsk.id_pengajuan asc 
                              ");

                              while ($data= mysqli_fetch_array($sql)) {
                              ?> <tr>
                                  <td><?= $no++; ?></td>
                                  <td><?= $data['id_pengajuan']; ?> </td>
                                  <td><?= $data['nama_barang']; ?> </td>
                                  <td><?= $data['kategori']; ?> </td>
                                  <td><?= $data['nama_supplier']; ?> </td>
                                  <td>Rp.<?php echo number_format($data['harga'])?> </td>
                                  <td><strong style="color:red;"><?= $data['status']; ?></strong></td>
                              </tr>
                              
                              <?php
                              }
                          ?>
                          <?php
                              $no = 1;
                              $sql3 = mysqli_query($koneksi," SELECT *, sum(harga) as total FROM pengajuan_dtl_mmsk
                              INNER JOIN pengajuan_msk using(id_pengajuan_msk)
                              WHERE id_pengajuan_msk='$id'
                              ORDER BY pengajuan_msk.tgl_masuk desc 
                              ");

                              while ($data3= mysqli_fetch_array($sql3)) {
                              ?>
                              
                          </tbody>
                          <tfoot>
                          <tr>
                              <td>TOTAL :</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>Rp.<?php echo number_format($data3['total']); ?></td>
                            </tr>
                            
                            <?php
                              }
                          ?>
                          </tfoot>
                        </table>
                      </table>
                    </div>
                  </div>
                <!-- /.card-body -->
                </div>
                
              </form>
            </div>
               
<?php    
     if (isset($_POST['submit'])){ 
      $nama = $_POST['nama_verif'];
      $status = 'DITERIMA';
      
  $status_brg = 'PROSES';

  //mengubah status
  $query2 = "UPDATE pengajuan_dtl_mmsk SET status='$status', nama_verif='$nama',  status_brg='$status_brg'  WHERE id_pengajuan_msk='$id'";
  $sql5 = $koneksi->query($query2);
  
  if($sql5){
    ?>
    <script type="text/javascript">
      alert("Data Berhasil Disimpan")
      window.location.href="?page1=validasi_pengajuan_asset"; 
    </script>

  <?php
  }
}
?> 

<?php    
     if (isset($_POST['tolak'])){ 
  $status = 'DITOLAK';

  //mengubah status
  $query2 = "UPDATE pengajuan_dtl_mmsk SET status='$status', nama_verif='$nama'  WHERE id_pengajuan_msk='$id'";
  $sql5 = $koneksi->query($query2);
  
  if($sql5){
    ?>
    <script type="text/javascript">
      alert("Data Berhasil Disimpan")
      window.location.href="?page1=validasi_pengajuan_asset"; 
    </script>

  <?php
  }
}
?>                                     