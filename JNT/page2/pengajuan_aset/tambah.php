<?php

$id_dp = $_SESSION['id_dp'];

if ($_SESSION['admin_dp']) {
    $user =$_SESSION['admin_dp'];
    $sql = $koneksi->query("SELECT * FROM user
    INNER JOIN karyawan using(id_karyawan) 
    WHERE id_user='$user'");
  
    $data_kry = $sql->fetch_assoc();
} 

$today = date("Y-m-d");

$iddetailpinjam = $_GET['iddetailpinjam'];


$query5 = "SELECT max(id_dtl_pnjm) as maxid from pinjam_dtl";
$hasil = mysqli_query($koneksi, $query5);
$data  = mysqli_fetch_array($hasil);
$id_dtl_pnjm = $data['maxid'];

$nourut = (int) substr($id_dtl_pnjm,2,6);
$nourut++;
$char = "KP";
$newid = $char.sprintf("%06s",$nourut);


$query1 = "SELECT max(id_pinjam) as maxid1 from pinjam";
$hasil1 = mysqli_query($koneksi, $query1);
$data1  = mysqli_fetch_array($hasil1);
$id_pinjam = $data1['maxid1'];

$nourut1 = (int) substr($id_pinjam,3,6);
$nourut1++;
$char1 = "KDP";
$newiddetil = $char1.sprintf("%06s",$nourut1);

$iddetil= $newiddetil;



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



?>

<div class="page-heading">
    
    <div class="card mt-3 card-danger">
  <div class="card-header">
    <h3 class="card-title">Ajukan Permintaan Penggunaan Aset</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form class="needs-validation" role="form" method="POST" enctype="multipart/form-data"> 
    <div class="card-body"> 
      <div class="row">
        <div class="col-md-6 col-12">
          <div class="form-group">
            <label for="exampleInputEmail1">ID Pengajuan</label>
            <input type="text" class="form-control di" id="exampleInputEmail1" name="id_dtl_pnjm"   
            value="<?php echo $iddetailpinjam;?>" readonly>
            <p><small class="text-muted">Kode akan otomatis terisi.</small></p>
          </div>
        </div>
      
      <div class="col-md-6 col-12">
      <div class="form-group">
        <label for="exampleInputEmail1">Id Detail Pengajuan</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="id_pinjam" 
        value="<?php echo $iddetil;?>" readonly> 
            <p><small class="text-muted">Kode akan otomatis terisi.</small></p>
      </div> 
      </div>
      <div class="col-md-6 col-12">
      <div class="form-group">
        <label>Pilih Aset</label>
        <select class="form-control" id="kategori" name="id_kategori">
          <option value="">Pilih Kategori</option>
          <?php 
            $sql = mysqli_query($koneksi,"SELECT * FROM kategori_brg");
            while($row = $sql->fetch_assoc()) :
            ?>
            <option value="<?= $row['id_kategori']; ?>"><?= $row['kategori']; ?> </option>
            
            <?php endwhile; ?>
        </select>
      </div>
      </div>
      <div class="col-md-6 col-12">
      <div class="form-group">
          <label for="exampleInputEmail1">Drop Point Yang Mengajukan</label>
           <input type="text" class="form-control di" id="exampleInputEmail1" name="dp"   
             value="<?php echo $data_kry['id_dp'];?>" readonly>
        </div>  
      </div>
            <div class="col-md-6 col-12">
        <div class="form-group">
        <label for="exampleInputEmail1">Tanggal Pengajuan</label>
          <input type="date" class="form-control" id="exampleInputEmail1" name='tgl_pengajuan_pnjm' value="<?= $today; ?>" >
          </div>
      </div>
      <div class="col-md-6 col-12">
      <div class="form-group">
          <label for="exampleInputEmail1">Nama Karyawan</label>
           <input type="text" class="form-control di" id="exampleInputEmail1" name="nama"   
            value="<?php echo $data_kry['nama'];?>" readonly>

            <input type="hidden" name="id_karyawan" value="<?php echo $data_kry['id_karyawan']; ?>">
        </div>  
      </div>
      

      <div class="col-md-6 col-12">
        <div class="form-group ">
          <label for="inputDescription">Keterangan</label>
          <textarea class="form-control" name="keterangan" placeholder="isi keterangan atau catatan" id="exampleInputEmail1"></textarea>
                        <p><small class="text-muted">Tidak wajib diisi.</small></p>
        </div>
      </div>
    </div>
    <script src="main.js"></script>
    <!-- /.card-body -->

    <div class="col-12 d-flex justify-content-end">
        <button type="submit" name="submit" class="btn btn-success">Tambah</button>
    </div>
    
  </form>
  </div>


<?php
	if (isset($_POST['submit'])){
		$kd_ac 				 = $_POST['kode'];
		$Id     	         = $_POST['id_dtl_pnjm'];
		$IdDetil     	     = $_POST['id_pinjam'];
		$id_kategori     	 = $_POST['id_kategori'];
		$id_karyawan    	 = $_POST['id_karyawan'];
		$tgl_pengajuan_pnjm       = $_POST['tgl_pengajuan_pnjm'];
		$supplier	         = $_POST['supplier'];
		$keterangan	         = $_POST['keterangan'];

		
		
		

		$query1="INSERT INTO pinjam SET 
    id_pinjam='$IdDetil',
    id_dtl_pnjm='$Id',
    id_karyawan='$id_karyawan',
    id_kategori='$id_kategori',
    status_pengajuan='PENDING',
    keterangan='$keterangan'
    ";
		mysqli_query($koneksi,$query1);
		if($query1){

			// cek SQL untuk cek apakah id udah ada apa belonm wkwk
			$cekid=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM pinjam_dtl WHERE id_dtl_pnjm='$iddetailpinjam'"));
			// Kalau id sudah ada yang pakai
			if ($cekid > 0){
				echo "ID sudah di pakai.";
			}else{
				$query="INSERT INTO pinjam_dtl SET id_dtl_pnjm='$Id',tgl_pengajuan_pnjm='$tgl_pengajuan_pnjm'";
				mysqli_query($koneksi,$query);       
			}
		
			if($query1){
				?>
				<script type="text/javascript">
					window.location.href="?page2=pengajuan_aset&aksi=tambah&iddetailpinjam=<?=$iddetailpinjam;?>"; 
				</script>

			<?php
			}
		}
	
	}

?>	



<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                List Barang Pengajuan 
                </h2>
                
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-striped table-borderless table-hover table-sm table-dark m-b-0">
                        <thead>
                            <tr align='center'>
                                <th>No</th>
                                <th>KODE DETAIL PENGAJUAN</th>
                                <th>KODE PENGAJUAN PEMINJAMAN</th>
                                <th>Aset</th>
                                <th>Nama Karyawan</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Aksi</th>   
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                        	<?php
                            $no = 1;
							$sql = mysqli_query($koneksi,"SELECT * FROM pinjam
              INNER JOIN pinjam_dtl using(id_dtl_pnjm)
              INNER JOIN karyawan using(id_karyawan)
              INNER JOIN kategori_brg using(id_kategori)
							WHERE id_dtl_pnjm='$iddetailpinjam'
							");

							
							while ($data = mysqli_fetch_array($sql)) {
								?>
									<tr align='center'>
										<td><?= $no++; ?></td>
										<td><?= $data['id_pinjam']; ?> </td>
										<td><?= $data['id_dtl_pnjm']; ?> </td>
										<td><?= $data['kategori']; ?> </td>
										<td><?= $data['nama']; ?> </td>
										<td><?= $data['tgl_pengajuan_pnjm']; ?> </td>
										<td>
                        					<a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ??')" href="?page2=pengajuan_aset&aksi=hapus1&id=<?= $data['id_pinjam']; ?> & id2=<?= $data['id_dtl_pnjm']; ?> "><button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></a>
										</td>
									</tr>
								<?php
									}
								?>
                        </tbody>

                    </table>
					<div class="container-fluid " align="center">
						<a href="?page2=pengajuan_aset" onclick="return confirm('Apakah Anda Yakin untuk Melakukan Pengajuan Dengan Data Ini ??')" class="btn btn-primary">Selesai</a>
					</div><br>
        </div>







