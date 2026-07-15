
<div class = "card mt-3 card-gray">
    <div class = " card-header">
    <h5 class="header">Data Pengajuan Asset</h5>
    </div>
    <div class="card-body">
    <a href="?page=pengajuan_asset&aksi=tambah&idpengajuanmsk=<?=$idpengajuanmsk;?>"><button   class="btn btn-primary">Tambah Pengajuan</button></a>
    <hr>
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
             where status='PENDING'
             ORDER BY pengajuan_msk.tgl_masuk desc 
             ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?= $no++; ?></td>
                <td><?= $data['tgl_masuk']; ?> </td>
                <td><?= $data['id_pengajuan_msk']; ?> </td>
                <td><?= $data['id_pengajuan']; ?> </td>
                <td><?= $data['nama']; ?> </td>
                <td><?= $data['nama_barang']; ?> </td>
                <td><?= $data['kategori']; ?> </td>
                <td><?= $data['nama_supplier']; ?> </td>
                <td>Rp.<?php echo number_format($data['harga'])?> </td>
                <td><?= $data['status']; ?> </td>
                <td>
                <a href="?page=pengajuan_asset&aksi=ubah&id=<?php echo $data['id_pengajuan_msk'];?>"><button   class="btn fas fa-edit"></button></a>
                <a onclick="return confirm('Yakin Mau Hapus?')" href="?page=brg_masuk_peralatan&aksi=hapus&id=<?php echo $data['kd_asset'];?>"><button   class="btn fas fa-trash-alt"></button></a></td>
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
    <h5 class="header">Data Pengajuan Asset Selesai</h5>
    </div>
    <div class="card-body">
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th>No</th>
        <th>Tanggal Pengajuan</th>
        <th>Nomor Pengajuan</th>
        <th>Nama Pengaju</th>
        <th>Nama Asset</th>
        <th>Kategori Asset</th>
        <th>Vendor</th>
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
             where status_brg='PROSES'
             group by id_pengajuan_msk
             ORDER BY pengajuan_msk.tgl_masuk desc 
             ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?= $no++; ?></td>
                <td><?= $data['tgl_masuk']; ?> </td>
                <td><?= $data['id_pengajuan_msk']; ?> </td>
                <td><?= $data['nama']; ?> </td>
                <td><?= $data['nama_barang']; ?> </td>
                <td><?= $data['kategori']; ?> </td>
                <td><?= $data['nama_supplier']; ?> </td>
                <td>
                <a href="?page=pengajuan_asset&aksi=buka&idpengajuanmsk=<?=$data['id_pengajuan_msk']; ?> ">
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
    <h5 class="header">Data Pengajuan Asset Ditolak</h5>
    </div>
    <div class="card-body">
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th>No</th>
        <th>Tanggal Pengajuan</th>
        <th>Nomor Pengajuan</th>
        <th>Nama Pengaju</th>
        <th>Nama Asset</th>
        <th>Kategori Asset</th>
        <th>Vendor</th>
        <th>Status</th>
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
             WHERE status_brg='DITOLAK'
             group by id_pengajuan_msk
             ORDER BY pengajuan_msk.tgl_masuk desc 
             ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?= $no++; ?></td>
                <td><?= $data['tgl_masuk']; ?> </td>
                <td><?= $data['id_pengajuan_msk']; ?> </td>
                <td><?= $data['nama']; ?> </td>
                <td><?= $data['nama_barang']; ?> </td>
                <td><?= $data['kategori']; ?> </td>
                <td><?= $data['nama_supplier']; ?> </td>
                <td><strong style="color:red;"><?= $data['status_brg']; ?></strong></td>
                <td>
                <a href="?page=pengajuan_asset&aksi=buka&idpengajuanmsk=<?=$data['id_pengajuan_msk']; ?> ">
                <button class="btn btn-sm btn-success">Buka</button></a></td>
            </tr>
            <?php
            }
        ?>
        </tbody>
    </table>
    </div>
</div>