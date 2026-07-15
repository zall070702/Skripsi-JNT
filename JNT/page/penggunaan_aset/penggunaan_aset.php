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
    <h5 class="header">Data Pengajuan Penggunaan Aset Yang Belum Di Validasi</h5>
    </div>
    <div class="card-body">
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th>No</th>
        <th>Tanggal Pengajuan</th>
        <th>Kode Pengajuan</th>
        <th>Nama Pengaju</th>
        <th>Kode Drop Point</th>
        <th>Status</th>
        <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
             $no = 1;
             $sql = mysqli_query($koneksi," SELECT * FROM pinjam
             INNER JOIN pinjam_dtl using(id_dtl_pnjm)
             INNER JOIN karyawan using(id_karyawan)
             WHERE status_pengajuan='PENDING'
             group by id_dtl_pnjm
             ORDER BY pinjam_dtl.tgl_pengajuan_pnjm  desc 
             ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?= $no++; ?></td>
                <td><?= tgl_indo($data['tgl_pengajuan_pnjm']) ?> </td>
                <td><?= $data['id_dtl_pnjm']; ?> </td>
                <td><?= $data['nama']; ?> </td>
                <td><?= $data['id_dp']; ?> </td>
                <td><?= $data['status_pengajuan']; ?> </td>
                <td>
                <a href="?page=penggunaan_aset&aksi=validasi&idpengajuanpnjm=<?=$data['id_dtl_pnjm']; ?> ">
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
    <h5 class="header">Data Pengajuan Penggunaan Aset sudah di Validasi</h5>
    </div>
    <div class="card-body">
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th>No</th>
        <th>Tanggal Pengajuan</th>
        <th>Kode Pengajuan</th>
        <th>Kode Barang Pengajuan</th>
        <th>Nama Pengaju</th>
        <th>Kode Drop Point</th>
        <th>Aset</th>
        <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php
             $no = 1;
             $sql = mysqli_query($koneksi," SELECT * FROM pinjam
             INNER JOIN pinjam_dtl using(id_dtl_pnjm)
             INNER JOIN karyawan using(id_karyawan)
             INNER JOIN kategori_brg using(id_kategori)
             where status_pengajuan='DITERIMA'
             ORDER BY pinjam_dtl.tgl_pengajuan_pnjm desc 
             ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?= $no++; ?></td>
                <td><?= tgl_indo($data['tgl_pengajuan_pnjm']) ?> </td>
                <td><?= $data['id_dtl_pnjm']; ?> </td>
                <td><?= $data['id_pinjam']; ?> </td>
                <td><?= $data['nama']; ?> </td>
                <td><?= $data['id_dp']; ?> </td>
                <td><?= $data['kategori']; ?> </td>
                <td><?= $data['status_pengajuan']; ?> </td>
            </tr>
            <?php
            }
        ?>
        </tbody>
    </table>
    </div>
</div>