<?php

$nama = $data['nama'];
$id =$_GET['idpengajuanpnjm'];


$today = date("Y-m-d");

$sql1=mysqli_query($koneksi,"SELECT*FROM pinjam_dtl WHERE id_dtl_pnjm ='$id' ");
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
                <h3 class="card-title">Validasi Pengajuan Pengguanaan Aset Drop Point</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <table class="table table-borderless" style="width: 100%"> 
                  <h3><center><b> PENGAJUAN PEMBELIAN BARANG ASSET </b></center></h3>
                  
                    <tr>
                      <th style="text-align: left;">Nomor Pengajuan :&nbsp&nbsp<?= $data1['id_dtl_pnjm'] ?> </th>
                      <th style="text-align: right;">Tanggal Pengajuan :&nbsp&nbsp<?= tgl_indo($data1['tgl_pengajuan_pnjm']) ?> </th>
                    </tr>
                  </table>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table class="table table-striped">
                        <table id="example1" class="table table table-striped table-hover">
                          <thead class="">
                          <tr>
                          <th>No</th>
                          <th>Kode Pengajuan Pengguanaan Barang</th>
                          <th>Nama Karyawan</th>
                          <th>Kode Drop Point</th>
                          <th>Aset</th>
                          <th>Status Pengajuan</th>
                          <th>Aksi</th>
                          <th>Keterangan</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php
                              $no = 1;
                              $sql = mysqli_query($koneksi," SELECT * FROM pinjam
                              INNER JOIN pinjam_dtl using(id_dtl_pnjm)
                              INNER JOIN karyawan using(id_karyawan)
                              INNER JOIN kategori_brg using(id_kategori)
                              WHERE id_dtl_pnjm='$id'
                              ORDER BY pinjam.id_pinjam asc 
                              ");

                              while ($data= mysqli_fetch_array($sql)) {
                              ?> <tr>
                                  <td><?= $no++; ?></td>
                                  <td><?= $data['id_pinjam']; ?> </td>
                                  <td><?= $data['nama']; ?> </td>
                                  <td><?= $data['id_dp']; ?> </td>
                                  <td><?= $data['kategori']; ?> </td>
                                  <td><?= $data['status_pengajuan']; ?> </td>
                                  <td>
                                  <a type="button" href="?page=penggunaan_aset&aksi=terima&idpengajuan=<?= $data['id_pinjam']; ?>&idpengajuanpnjm=<?= $data['id_dtl_pnjm']; ?>" class="btn btn-success btn-sm"><i>TERIMA</i></a>
                                  <a type="button" href="?page=penggunaan_aset&aksi=tolak&idpengajuan=<?= $data['id_pinjam']; ?>&idpengajuanpnjm=<?= $data['id_dtl_pnjm']; ?>" class="btn btn-danger btn-sm"><i>TOLAK</i></a>
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
                              $sql3 = mysqli_query($koneksi," SELECT * FROM pinjam
                              INNER JOIN pinjam_dtl using(id_dtl_pnjm)
                              WHERE id_dtl_pnjm='$id'
                              ORDER BY pinjam_dtl.tgl_pengajuan_pnjm desc 
                              ");

                              while ($data3= mysqli_fetch_array($sql3)) {
                              ?>
                              
                          </tbody>
                          <tfoot>
                            
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
      
    ?>
    <script type="text/javascript">
      alert("Data Berhasil Disimpan")
      window.location.href="?page=penggunaan_aset"; 
    </script>

  <?php
  
}
?>                                   