<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

if (isset($_POST['batal'])){
  ?>
  <script type="text/javascript">
      window.location.href="?page=brg_masuk_komputer";
  </script>
  <?php
}
$today = date("Y-m-d");

$id = $_GET['idpengajuan'];
$sql=mysqli_query($koneksi,"SELECT * FROM pengajuan_dtl_mmsk
INNER JOIN pengajuan_msk using(id_pengajuan_msk)
INNER JOIN karyawan using(id_karyawan)
INNER JOIN kategori_brg using(id_kategori)
INNER JOIN supplier using(id_supplier) WHERE id_pengajuan='$id'");
$data1=mysqli_fetch_assoc($sql);

//membuat id otomatis
$query = "SELECT max(kd_asset) AS maxid from brg_masuk_peralatan";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);
$id_peralatan = $data['maxid'];
$tgl=DATE('Y');
$tgl2= $tgl_diterima[DATE('M')];


$nourut = (int) substr($id_peralatan,4,3);
$nourut++;
$kdbrg = "J&T-";
//buat bulan romawi

$array_bln    = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");

$bln      = $tgl2;
//kode asset otomatis
$newid = $kdbrg . sprintf("%03s" , $nourut) . '/AST-GW999/'.  $tgl;

?>
<div class="card mt-3 card-primary">
  <div class="card-header">
    <h3 class="card-title">Tambah Data Asset Peralatan</h3>
  </div>


  <div class="card">
         
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-striped table-borderless table-hover table-sm table-dark m-b-0">
                        <thead>
                            <tr align='center'>
                            <th>No</th>
                              <th>Tanggal Pengajuan</th>
                              <th>Nomor Pengajuan</th>
                              <th>Kode Barang Pengajuan</th>
                              <th>Nama Pengaju</th>
                              <th>Nama Asset</th>
                              <th>Kategori Asset</th>
                              <th>Vendor</th>
                              <th>Estimasi Harga</th>
                              <th>Status Barang</th>
                              <th>Aksi</th>  
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                       <?php
                        $no = 1;

                        $sql = mysqli_query($koneksi," 
                            SELECT * FROM pengajuan_dtl_mmsk
                            INNER JOIN pengajuan_msk USING(id_pengajuan_msk)
                            INNER JOIN karyawan USING(id_karyawan)
                            INNER JOIN kategori_brg USING(id_kategori)
                            INNER JOIN supplier USING(id_supplier)    
                            WHERE  status_brg='SAMPAI'
                            ORDER BY id_pengajuan_msk ASC 
                        ");

                        if(mysqli_num_rows($sql) > 0){

                            while($data = mysqli_fetch_array($sql)){
                        ?>
                                <tr align='center'>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['tgl_masuk']; ?></td>
                                    <td><?= $data['id_pengajuan_msk']; ?></td>
                                    <td><?= $data['id_pengajuan']; ?></td>
                                    <td><?= $data['nama']; ?></td>
                                    <td><?= $data['nama_barang']; ?></td>
                                    <td><?= $data['kategori']; ?></td>
                                    <td><?= $data['nama_supplier']; ?></td>
                                    <td>Rp.<?= number_format($data['harga']); ?></td>
                                    <td><?= $data['status_brg']; ?></td>
                                    <td>
                                        <a href="?page=brg_masuk_peralatan&aksi=tambah&idpengajuan=<?= $data['id_pengajuan']; ?>">
                                            <button class="btn btn-sm btn-primary">Tambah</button>
                                        </a>
                                    </td>
                                </tr>
                        <?php
                            }

                        } else {
                        ?>
                            <tr align="center">
                                <td colspan="11">Tidak Ada Data Aset</td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>

                    </table>
					
        </div>

        
  <!-- /.card-header -->
  <!-- form start -->
  <form class="needs-validation" role="form" method="POST" enctype="multipart/form-data"> 
    <div class="card-body"> 
      <div class="row">
        <div class="col-md-6 col-12">
          <div class="form-group">
            <label for="exampleInputEmail1">Kode Asset</label>
            <input type="text" class="form-control di" id="exampleInputEmail1" name="kd_asset"   
            value="<?php echo $newid;?>" readonly>
            <p><small class="text-muted">Kode akan otomatis terisi.</small></p>
          </div>
        </div>
        <div class="col-md-6 col-12">
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Asset</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="nama_barang" value="<?php echo $data1['nama_barang'];?>" readonly>
      </div>  
      </div> 
      <div class="col-md-6 col-12">
      <div class="form-group">
        <label for="exampleInputEmail1">Merek</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="merek" placeholder="Masukkan Merek Barang" required
        oninvalid="this.setCustomValidity('Nama Merek Belum Dimasukkan')" oninput="setCustomValidity('')">
      </div> 
      </div>
      <div class="col-md-6 col-12">
      <div class="form-group">
        <label for="exampleInputEmail1">Kategori</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="kategori"  
        value="<?php echo $data1['kategori'];?>" readonly>
      </div>  
      </div>
      <div class="col-md-6 col-12">
      <div class="form-group">
        <label for="exampleInputEmail1">Serial number</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="sn"  placeholder="Masukkan Serial Number" required
        oninvalid="this.setCustomValidity('NO SN Belum Dimasukkan')" oninput="setCustomValidity('')">
      </div>  
      </div>
      <div class="col-md-6 col-12">
      <div class="form-group">
        <label for="exampleInputEmail1">MDA</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="mda"  placeholder="Masukkan MDA Barang" required
        oninvalid="this.setCustomValidity('No MDA Belum Dimasukkan')" oninput="setCustomValidity('')">
      </div>    
      </div>
      <div class="col-md-6 col-12">
        <div class="form-group">
        <label for="exampleInputEmail1">Tanggal Barang Diterima</label>
          <input type="date" class="form-control" id="exampleInputEmail1" name='tgl_diterima' value="<?= $today; ?>" >
          </div>
      </div>
      <div class="col-md-6 col-12">
      <div class="form-group">
        <label for="exampleInputEmail1">Harga</label>
        <input type="text" class="form-control" id="rupiah1" name="harga"  
        value="<?php echo ($data1['harga'])?>" readonly>
      </div>  
      </div>
      <div class="col-md-6 col-12">
        <div class="form-group ">
          <label for="inputDescription">Keterangan</label>
          <textarea class="form-control" name="keterangan" placeholder="isi keterangan atau catatan" id="exampleInputEmail1"></textarea>
                        <p><small class="text-muted">Tidak wajib diisi.</small></p>
        </div>
      </div>
      <div class="col-md-6 col-12">
        <div class="form-group ">
          <div class="col-12 d-flex justify-content-end">
            <button type="submit" name="simpan"  class="btn btn-primary btn">Simpan</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->

    <script src="main.js"></script>
    
    <hr>
    <div class="container-fluid " align="center">
      <a href="?page=brg_masuk_peralatan" onclick="return confirm('Apakah Anda Yakin untuk Menyimpan Data Ini??')" class="btn btn-primary">Selesai</a>
    </div>
    <br>
  </form>
  </div>
</div>



<?php

if (isset($_POST['simpan'])){


  $id_kategori = $data1['id_kategori'];
  $merek = $_POST['merek'];
  $nama_asset = $_POST['nama_barang'];
  $sn = $_POST['sn'];
  $mda = $_POST['mda'];
  $tgl_diterima = $_POST['tgl_diterima'];
  $harga = $_POST['harga'];
  $keterangan = $_POST['keterangan'];
  
  //status otomatis
  $status='Belum Terpakai';
  $status_brg='DISIMPAN';
  $qty='1';
  
  
  // menambah data
    $query = "INSERT INTO brg_masuk_peralatan (kd_asset,id_pengajuan,id_kategori,merek,model,nama_barang,sn,mda,status,quantity,harga,tgl_diterima,keterangan)VALUES('$newid','$id','$id_kategori','$merek','$model','$nama_asset','$sn','$mda','$status','$qty','$harga','$tgl_diterima','$keterangan')";
    $sql = $koneksi->query($query);
  
    $query2 = "INSERT INTO asset_peralatan (kd_asset,id_pengajuan,id_kategori,merek,model,nama_barang,sn,mda,status)VALUES('$newid','$id','$id_kategori','$merek','$model','$nama_asset','$sn','$mda','$status')";
    $sql2 = $koneksi->query($query2);
  
    $query3 = "UPDATE pengajuan_dtl_mmsk SET status_brg='$status_brg' WHERE id_pengajuan='$id'";
    $sql3 = $koneksi->query($query3);

    //=================== QR CODE ===================//

      $kode = $newid;

      $token = md5(uniqid(rand(), true));

      $url = "http://localhost/JNT/public/detail_aset.php?token=".$token;

      // simpan token
      mysqli_query($koneksi,"
      UPDATE brg_masuk_peralatan
      SET qr_token='$token'
      WHERE kd_asset='$kode'
      ");

      // membuat QR
      $qrCode = new QrCode($url);

      $writer = new PngWriter();

      $result = $writer->write($qrCode);

      // lokasi penyimpanan
      $namaFile = preg_replace('/[^A-Za-z0-9_-]/', '_', $kode) . ".png";

      $result->saveToFile(__DIR__."/../../qr_code/".$namaFile);

      // simpan nama file
      mysqli_query($koneksi,"
      UPDATE brg_masuk_peralatan
      SET qr_code='$namaFile'
      WHERE kd_asset='$kode'
      ");

    if ($sql) {
      ?>
      <script type="text/javascript">
        window.location.href="?page=brg_masuk_peralatan&aksi=tambah";
      </script>
      <?php
    }
  
  
  }
  ?>

