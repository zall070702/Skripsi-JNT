<?php


$id = $_GET['id'];

if ($_SESSION['admin']) {
    $user =$_SESSION['admin'];
    $sql = $koneksi->query("SELECT * FROM user
    INNER JOIN karyawan using(id_karyawan) 
    WHERE id_user='$user'
    ");
  
    $datanav = $sql->fetch_assoc();
  
    
}


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


<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                Barang Pengajuan
                </h2>
                
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-striped table-borderless table-hover table-sm table-dark m-b-0">
                        <thead>
                            <tr align='center'>
                                <th>No</th>
                                <th>ID DETAIL PENGAJUAN</th>
                                <th>ID PENGAJUAN MASUK</th>
                                <th>Nama Karyawan</th>
                                <th>Kode Area</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Aksi</th>   
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
             where id_pengajuan_msk='$id'
             ORDER BY pengajuan_msk.tgl_masuk desc 
             ");

							
							while ($data = mysqli_fetch_array($sql)) {
								?>
									<tr align='center'>
										<td><?= $no++; ?></td>
										<td><?= $data['id_pengajuan']; ?> </td>
										<td><?= $data['id_pengajuan_msk']; ?> </td>
										<td><?= $data['nama']; ?> </td>
										<td><?= $data['id_dp']; ?> </td>
										<td><?= $data['nama_barang']; ?> </td>
										<td>Rp.<?php  echo number_format($data['harga']) ?> </td>
										<td><?= $data['tgl_masuk']; ?> </td>
										<td><a href="?page=pengajuan_asset&aksi=ubah&id=<?= $id; ?>&pilih=<?= $data['id_pengajuan']; ?>">
                                            <button class="btn btn-light">PILIH</button>
                                            </a></td>
									</tr>
								<?php
									}
								?>
                        </tbody>
                    </table>
					<div class="container-fluid " align="center">
						<a href="?page=pengajuan_asset" onclick="return confirm('Apakah Anda Yakin untuk Melakukan Pengajuan Dengan Data Ini ??')" 
                        class="btn btn-primary">Selesai Edit Data Pengajuan</a>
					</div><br>
        </div>

	

<?php
$pilih = isset($_GET['pilih']) ? $_GET['pilih'] : '';

$data_pilih = [];

if($pilih != ''){
    $q = mysqli_query($koneksi, "
        SELECT * FROM pengajuan_dtl_mmsk
        WHERE id_pengajuan = '$pilih'
    ");
    $data_pilih = mysqli_fetch_assoc($q);
}
?>
<div class="page-heading">
    
    <div class="card mt-3 card-danger">
  <div class="card-header">
    <h3 class="card-title">Tambah Data Pengajuan Asset</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form class="needs-validation" role="form" method="POST" enctype="multipart/form-data"> 
    <div class="card-body"> 
      <div class="row">
        <div class="col-md-6 col-12">
          <div class="form-group">
            <label for="exampleInputEmail1">ID Pengajuan Masuk</label>
            <input type="text" class="form-control di" id="exampleInputEmail1" name="id_pengajuan_msk"   
            value="<?php echo $id;?>" readonly>
            <p><small class="text-muted">Kode akan otomatis terisi.</small></p>
          </div>
        </div>
      <div class="col-md-6 col-12">
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Barang </label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="nama_barang"  placeholder="Masukkan Nama Barang" required
        oninvalid="this.setCustomValidity('Nama Barang Belum Dimasukkan')" oninput="setCustomValidity('')"
        value="<?= isset($data_pilih['nama_barang']) ? $data_pilih['nama_barang'] : '' ?>">
      </div>  
      </div>
      <div class="col-md-6 col-12">
      <div class="form-group">
        <label for="exampleInputEmail1">Id Detail Pengajuan</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="id_pengajuan" 
        value="<?php echo $pilih;?>" readonly> 
      </div> 
      </div>
      <div class="col-md-6 col-12">
        <div class="form-group">
            <label>Nama Kategori</label>
            <select class="form-control" name="id_kategori">
            <option value="">Pilih Kategori</option>

            <?php 
            $sql = mysqli_query($koneksi,"SELECT * FROM kategori_brg");
            while($row = mysqli_fetch_assoc($sql)) :
            ?>

            <option value="<?= $row['id_kategori']; ?>"
                <?php 
                if(isset($data_pilih['id_kategori']) && $data_pilih['id_kategori'] == $row['id_kategori']) 
                echo "selected"; 
                ?>>
                <?= $row['kategori']; ?>
            </option>

            <?php endwhile; ?>
            </select>
        </div>
        </div>
      <div class="col-md-6 col-12">
      <div class="form-group">
          <label for="exampleInputEmail1">Drop Point Yang Mengajukan</label>
           <input type="text" class="form-control di" id="exampleInputEmail1" name="dp"   
             value="<?php echo $datanav['id_dp'];?>" readonly>
        </div>  
      </div>
      
      <div class="col-md-6 col-12">
      <div class="form-group">
        <label for="exampleInputEmail1">Harga</label>
        <input type="text" class="form-control"  id="rupiah1" name="harga"  
         required
        oninvalid="this.setCustomValidity('Harga Barang Belum Dimasukkan')" oninput="setCustomValidity('')"
        value="<?= isset($data_pilih['harga']) ? number_format($data_pilih['harga']) : '' ?>"
        >
        
      </div>  
      </div>
      <div class="col-md-6 col-12">
      <div class="form-group">
          <label for="exampleInputEmail1">Nama Karyawan</label>
           <input type="text" class="form-control di" id="exampleInputEmail1" name="nama"   
            value="<?php echo $datanav['nama'];?>" readonly>

            <input type="hidden" name="id_karyawan" value="<?php echo $datanav['id_karyawan']; ?>">
        </div>  
      </div>
      
      <div class="col-md-6 col-12">
        <div class="form-group">
        <label for="exampleInputEmail1">Tanggal Pengajuan</label>
          <input type="date" class="form-control" id="exampleInputEmail1" name='tgl_masuk' value="<?= $today; ?>" >
          </div>
      </div>
      <div class="col-md-6 col-12">
      <div class="form-group">
        <label>Nama Supplier</label>
        <select class="form-control" name="supplier">
          <option value="">Pilih Supplier</option>
          <?php 
            $sql = mysqli_query($koneksi,"SELECT * FROM supplier");
            while($row = $sql->fetch_assoc()) :
            ?>
            <option value="<?= $row['id_supplier']; ?>"
            <?php if(isset($data_pilih['id_supplier']) && $data_pilih['id_supplier'] == $row['id_supplier']) echo "selected"; ?>>
            <?= $row['nama_supplier']; ?>
            </option>
            <?php endwhile; ?>
        </select>
      </div>
      </div>
      <div class="col-md-6 col-12">
      <div class="form-group">
        <label for="exampleInputEmail1">Status</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="status"value="PENDING" readonly>
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
		$Id     	         = $_POST['id_pengajuan_msk'];
		$IdDetil     	     = $_POST['id_pengajuan'];
		$nama_brg    	     = $_POST['nama_barang'];
		$id_kategori     	 = $_POST['id_kategori'];
		$harga = str_replace(['.', ','], '', $_POST['harga']);
		$id_karyawan    	 = $_POST['id_karyawan'];
		$tgl_masuk       = $_POST['tgl_masuk'];
		$status	             = $_POST['status'];
		$supplier	         = $_POST['supplier'];
		$keterangan	         = $_POST['keterangan'];

		
		
		

		$query1="INSERT INTO pengajuan_dtl_mmsk SET id_pengajuan='$IdDetil',id_pengajuan_msk='$Id',id_karyawan='$id_karyawan',id_supplier='$supplier',id_kategori='$id_kategori',nama_barang='$nama_brg',harga='$harga',status='$status',keterangan='$keterangan'";
		mysqli_query($koneksi,$query1);
		if($query1){

			// cek SQL untuk cek apakah id udah ada apa belonm wkwk
			$cekid=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM pengajuan_msk WHERE id_pengajuan_msk='$idpengajuanmsk'"));
			// Kalau id sudah ada yang pakai
			if ($cekid > 0){
				echo "ID sudah di pakai.";
			}else{
				$query="INSERT INTO pengajuan_msk SET id_pengajuan_msk='$Id',tgl_masuk='$tgl_masuk'";
				mysqli_query($koneksi,$query);       
			}
		
			if($query1){
				?>
				<script type="text/javascript">
					window.location.href="?page=pengajuan_asset&aksi=tambah&idpengajuanmsk=<?=$idpengajuanmsk;?>"; 
				</script>

			<?php
			}
		}
	
	}

?>	










