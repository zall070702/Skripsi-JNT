<?php
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
<div class = "card mt-3 card-gray">
    <div class = " card-header">
    <h5 class="header">Data Pengajuan Asset Yang Belum Di Validasi</h5>
    </div>
    <div class="card-body">
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th>No</th>
        <th>Tanggal Pengajuan</th>
        <th>Nomor Pengajuan</th>
        <th>Nama Pengaju</th>
        <th>Estimasi Harga</th>
        <th>Status</th>
        <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
             $no = 1;
             $sql = mysqli_query($koneksi," SELECT *, sum(harga) as total FROM pengajuan_dtl_mmsk
             INNER JOIN pengajuan_msk using(id_pengajuan_msk)
             INNER JOIN karyawan using(id_karyawan)
             WHERE status='PENDING'
             group by id_pengajuan_msk
             ORDER BY pengajuan_msk.tgl_masuk  desc 
             ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?= $no++; ?></td>
                <td><?= tgl_indo($data['tgl_masuk']) ?> </td>
                <td><?= $data['id_pengajuan_msk']; ?> </td>
                <td><?= $data['nama']; ?> </td>
                <td>Rp.<?php  echo number_format($data['total']) ?></td>
                <td><?= $data['status']; ?> </td>
                <td>
                <a href="?page1=validasi_pengajuan_asset&aksi=validasi&idpengajuanmsk=<?=$data['id_pengajuan_msk']; ?> ">
                <button class="btn btn-sm btn-danger">Validasi</button></a>
                </td>
            </tr>
            <?php
            }
        ?>
        </tbody>
    </table>
    </div>
</div>

<div class = "card mt-3 card-gray">
    <div class = " card-header">
    <h5 class="header">Data Asset</h5>
    </div>
    <div class="card-body">
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
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
             where status='DITERIMA'
             ORDER BY pengajuan_msk.tgl_masuk desc 
             ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?= $no++; ?></td>
                <td><?= tgl_indo($data['tgl_masuk']) ?> </td>
                <td><?= $data['id_pengajuan_msk']; ?> </td>
                <td><?= $data['id_pengajuan']; ?> </td>
                <td><?= $data['nama']; ?> </td>
                <td><?= $data['nama_barang']; ?> </td>
                <td><?= $data['kategori']; ?> </td>
                <td><?= $data['nama_supplier']; ?> </td>
               <td>Rp.<?php echo number_format($data['harga'])?> </td>
                <td><?= $data['status']; ?> </td>
            </tr>
            <?php
            }
        ?>
        </tbody>
    </table>
    </div>
</div>