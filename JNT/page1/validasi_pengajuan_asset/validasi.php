<?php

$nama = $data['nama'];
$id =$_GET['idpengajuanmsk'];


$today = date("Y-m-d");

$sql1=mysqli_query($koneksi,"SELECT*FROM pengajuan_msk WHERE id_pengajuan_msk ='$id' ");
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


  <div class="card mt-3 card-primary">
              <div class="card-header">
                <h3 class="card-title">Validasi Pengajuan Asset</h3>
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
                        <div class="col-md-3">
                        <label for="exampleInputEmail1">Nama Verifikator</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="nama_verif" 
                        value="<?php echo $data['nama'];?>" readonly>
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
                          <th>Nama Karyawan</th>
                          <th>Nama Asset</th>
                          <th>Kategori Asset</th>
                          <th>Vendor</th>
                          <th>Estimasi Harga</th>
                          <th>Status Pengajuan</th>
                          <th>Aksi</th>
                          <th>Keterangan</th>
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
                                  <td><?= $data['nama']; ?> </td>
                                  <td><?= $data['nama_barang']; ?> </td>
                                  <td><?= $data['kategori']; ?> </td>
                                  <td><?= $data['nama_supplier']; ?> </td>
                                  <td>Rp.<?php echo number_format($data['harga'])?> </td>
                                  <td><?= $data['status']; ?> </td>
                                  <td>
                                  <a type="button" href="?page1=validasi_pengajuan_asset&aksi=terima&idpengajuan=<?= $data['id_pengajuan']; ?>&idpeng=<?= $data['id_pengajuan_msk']; ?>" class="btn btn-success btn-sm"><i>TERIMA</i></a>
                                  <a type="button" href="?page1=validasi_pengajuan_asset&aksi=tolak&idpengajuan=<?= $data['id_pengajuan']; ?>&idpeng=<?= $data['id_pengajuan_msk']; ?>" class="btn btn-danger btn-sm"><i>TOLAK</i></a>
                                  </td>
                                  <td>
                                  <div class="form-group">
                                      <textarea name="keterangan_pengajuan" id="" cols="20" rows="2"class="form-control"id="exampleInputEmail1"placeholder="<?= $data['keterangan_pengajuan']; ?> "></textarea>
                          
                                  </div>
                                  </td>
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
                <div class="card-footer" align='center'>
                  <button type="submit" name="submit"  class="btn btn-primary" onclick="return confirm('Apakah Anda Yakin Untuk Menyimpan Data Validasi Pengajuan Ini ??')">SELESAI</button>
                </div>
                
              </form>
            </div>
               
<?php    
     if (isset($_POST['submit'])){ 
      $nama = $_POST['nama_verif'];

  //mengubah status
  $query2 = "UPDATE pengajuan_dtl_mmsk SET nama_verif='$nama' WHERE id_pengajuan_msk='$id'";
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