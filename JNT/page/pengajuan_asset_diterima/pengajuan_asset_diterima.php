
<div class = "card mt-3 card-gray">
    <div class = " card-header">
    <h5 class="header">Data Pengajuan Asset Diterima</h5>
    </div>
    <div class="card-body">
    <hr>
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th>No</th>
        <th>Tanggal Pengajuan Diterima</th>
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
             $sql = mysqli_query($koneksi," SELECT * FROM pengajuan_dtl_mmsk
             INNER JOIN pengajuan_msk using(id_pengajuan_msk)
             INNER JOIN karyawan using(id_karyawan)
             INNER JOIN kategori_brg using(id_kategori)
             INNER JOIN supplier using(id_supplier)    
             WHERE id_kategori='1'   AND status_brg='PROSES'
             ORDER BY id_pengajuan_msk asc 
             ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?= $no++; ?></td>
                <td><?= $data['tgl_pengajuan_diterima']; ?> </td>
                <td><?= $data['tgl_masuk']; ?> </td>
                <td><?= $data['id_pengajuan_msk']; ?> </td>
                <td><?= $data['id_pengajuan']; ?> </td>
                <td><?= $data['nama']; ?> </td>
                <td><?= $data['nama_barang']; ?> </td>
                <td><?= $data['kategori']; ?> </td>
                <td><?= $data['nama_supplier']; ?> </td>
                <td>Rp.<?php echo number_format($data['harga'])?> </td>
                <td><?= $data['status_brg']; ?> </td>
                <td>
                <a onclick="return confirm('Yakin Ingin Menyimpan Data?')"  href="?page=pengajuan_asset_diterima&aksi=masuk&idpengajuan=<?=$data['id_pengajuan']; ?> ">
                <button class="btn btn-sm btn-primary">SAMPAI</button></a></td>
            </tr>
            <?php
            }
        ?>
        <?php
             $sql = mysqli_query($koneksi," SELECT * FROM pengajuan_dtl_mmsk
             INNER JOIN pengajuan_msk using(id_pengajuan_msk)
             INNER JOIN karyawan using(id_karyawan)
             INNER JOIN kategori_brg using(id_kategori)
             INNER JOIN supplier using(id_supplier)
            WHERE id_kategori='2' AND status_brg='PROSES'
             ORDER BY id_pengajuan_msk asc 
             ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?= $no++; ?></td>
                <td><?= $data['tgl_pengajuan_diterima']; ?> </td>
                <td><?= $data['tgl_masuk']; ?> </td>
                <td><?= $data['id_pengajuan_msk']; ?> </td>
                <td><?= $data['id_pengajuan']; ?> </td>
                <td><?= $data['nama']; ?> </td>
                <td><?= $data['nama_barang']; ?> </td>
                <td><?= $data['kategori']; ?> </td>
                <td><?= $data['nama_supplier']; ?> </td>
                <td>Rp.<?php echo number_format($data['harga'])?> </td>
                <td><?= $data['status_brg']; ?> </td>
                <td>
                <a onclick="return confirm('Yakin Ingin Menyimpan Data?')" href="?page=pengajuan_asset_diterima&aksi=masuk&idpengajuan=<?=$data['id_pengajuan']; ?> ">
                <button class="btn btn-sm btn-primary">SAMPAI</button></a></td>
            </tr>
            <?php
            }
        ?>
        <?php
             $sql = mysqli_query($koneksi," SELECT * FROM pengajuan_dtl_mmsk
             INNER JOIN pengajuan_msk using(id_pengajuan_msk)
             INNER JOIN karyawan using(id_karyawan)
             INNER JOIN kategori_brg using(id_kategori)
             INNER JOIN supplier using(id_supplier)    
             WHERE NOT id_kategori='1' AND NOT id_kategori='2'   AND status_brg='PROSES'
             ORDER BY id_pengajuan_msk asc 
             ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?= $no++; ?></td>
                <td><?= $data['tgl_pengajuan_diterima']; ?> </td>
                <td><?= $data['tgl_masuk']; ?> </td>
                <td><?= $data['id_pengajuan_msk']; ?> </td>
                <td><?= $data['id_pengajuan']; ?> </td>
                <td><?= $data['nama']; ?> </td>
                <td><?= $data['nama_barang']; ?> </td>
                <td><?= $data['kategori']; ?> </td>
                <td><?= $data['nama_supplier']; ?> </td>
                <td>Rp.<?php echo number_format($data['harga'])?> </td>
                <td><?= $data['status_brg']; ?> </td>
                <td>
                <a onclick="return confirm('Yakin Ingin Menyimpan Data?')" href="?page=pengajuan_asset_diterima&aksi=masuk&idpengajuan=<?=$data['id_pengajuan']; ?> ">
                <button class="btn btn-sm btn-primary">SAMPAI</button></a></td>
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
    <h5 class="header">Data Pengajuan Asset SELESAI</h5>
    </div>
    <div class="card-body">
    <hr>
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th>No</th>
        <th>Nomor Pengajuan</th>
        <th>Kode Barang Pengajuan</th>
        <th>Nama Pengaju</th>
        <th>Nama Asset</th>
        <th>Kategori Asset</th>
        <th>Vendor</th>
        <th>Estimasi Harga</th>
        <th>Status Barang</th>
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
             WHERE status_brg='SAMPAI'  
             ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?= $no++; ?></td>
                <td><?= $data['id_pengajuan_msk']; ?> </td>
                <td><?= $data['id_pengajuan']; ?> </td>
                <td><?= $data['nama']; ?> </td>
                <td><?= $data['nama_barang']; ?> </td>
                <td><?= $data['kategori']; ?> </td>
                <td><?= $data['nama_supplier']; ?> </td>
                <td>Rp.<?php echo number_format($data['harga'])?> </td>
                <td><?= $data['status_brg']; ?> </td>
            </tr>
            <?php
            }
        ?>
        </tbody>
    </table>
    </div>
</div>
