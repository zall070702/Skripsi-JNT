

<div class = "card mt-3 card-gray">
    <div class = " card-header">
    <h5 class="header">Data Pengajuan Penggunaan Aset Diterima</h5>
    </div>
    <div class="card-body">
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th>No</th>
        <th>Tanggal Pengajuan</th>
        <th>Kode Pengajuan</th>
        <th>Nama Pengaju</th>
        <th>Kode Area</th>
        <th>Aset</th>
        <th>Aksi</th>
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
             group by id_dtl_pnjm
             ORDER BY pinjam.tgl_pinjam desc 
             ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?= $no++; ?></td>
                <td><?= $data['tgl_pengajuan_pnjm']; ?> </td>
                <td><?= $data['id_dtl_pnjm']; ?> </td>
                <td><?= $data['nama']; ?> </td>
                <td><?= $data['id_dp']; ?> </td>
                <td><?= $data['kategori']; ?> </td>
                <td>
                <a href="?page2=pengajuan_aset&aksi=buka&idpengajuanmsk=<?=$data['id_dtl_pnjm']; ?> ">
                <button class="btn btn-sm btn-success">Buka</button></a></td>
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
    <h5 class="header">Data Pengajuan Penggunaan Aset Ditolak</h5>
    </div>
    <div class="card-body">
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th>No</th>
        <th>Tanggal Pengajuan</th>
        <th>Kode Pengajuan</th>
        <th>Nama Pengaju</th>
        <th>Aset</th>
        <th>status_pengajuan</th>
        <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
             $no = 1;
             $sql = mysqli_query($koneksi," SELECT * FROM pinjam
             INNER JOIN pinjam_dtl using(id_dtl_pnjm)
             INNER JOIN karyawan using(id_karyawan)
             INNER JOIN kategori_brg using(id_kategori)
             WHERE status_pengajuan='DITOLAK'
             group by id_dtl_pnjm
             ORDER BY pinjam.tgl_pinjam desc 
             ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?= $no++; ?></td>
                <td><?= $data['tgl_pengajuan_pnjm']; ?> </td>
                <td><?= $data['id_dtl_pnjm']; ?> </td>
                <td><?= $data['nama']; ?> </td>
                <td><?= $data['id_dp']; ?> </td>
                <td><?= $data['kategori']; ?> </td>
                <td><strong style="color:red;"><?= $data['status_pengajuan_brg']; ?></strong></td>
                <td>
                <a href="?page=pengajuan_asset&aksi=buka&idpengajuanmsk=<?=$data['id_dtl_pnjm']; ?> ">
                <button class="btn btn-sm btn-success">Buka</button></a></td>
            </tr>
            <?php
            }
        ?>
        </tbody>
    </table>
    </div>