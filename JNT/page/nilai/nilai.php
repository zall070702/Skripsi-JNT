<div class = "card card-primary">
    <div class = " card-header">
    <h3 class="card-title">Data Nilai</h3>
    </div>
    <div class="card-body">
    <a href="?page=nilai&aksi=tambah"><button   class="btn btn-primary">Tambah Data Nilai</button></a>
    <hr>
    <table id="example1" class="table table-boardered table-striped">
        <thead>
        <tr>
        <th>No</th>
        <th>Id Mahasiswa</th>
        <th>Nama</th>
        <th>Nilai Harian</th>
        <th>Nilai UTS</th>
        <th>Nilai UAS</th>
        <th>Rata-Rata</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $sql2 = mysqli_query($koneksi,"SELECT SUM(nilai_harian) as totalharian, SUM(nilai_uts) as totaluts, SUM(nilai_uas) as totaluas, AVG(nilai_harian + nilai_uts + nilai_uas) /3 as ratarata  FROM nilai");
            $data2 = mysqli_fetch_assoc($sql2);
            $totalharian=$data2['totalharian'];
            $totaluts=$data2['totaluts'];
            $totaluas=$data2['totaluas'];
            $ratarata=$data2['ratarata'];


            $no = 1;
            $sql = mysqli_query($koneksi,"SELECT id_nilai,nama,nilai_harian,nilai_uts,nilai_uas, AVG(nilai_harian + nilai_uts + nilai_uas) /3 as ratarata FROM nilai INNER JOIN mahasiswa ON nilai.id_mahasiswa=mahasiswa.id_mahasiswa GROUP BY id_nilai");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['id_nilai'];?></td>
                <td><?php echo $data['nama'];?></td>
                <td><?php echo $data['nilai_harian'];?></td>
                <td><?php echo $data['nilai_uts'];?></td>
                <td><?php echo $data['nilai_uas'];?></td>
                <td><?php echo $data['ratarata'];?></td>
                <td>
                <a href="?page=nilai&aksi=ubah&id=<?php echo $data['id_nilai'];?>"><button   class="btn btn-success">Edit</button></a>
                <a onclick="return confirm('Yakin Mau Hapus?')" href="?page=nilai&aksi=hapus&id=<?php echo $data['id_nilai'];?>"><button   class="btn btn-warning">Hapus</button></a></td>
            </tr>
            <?php
            }
        ?>
        </tbody>
        <tr>
            <td colspan="3">Total : </td>
            <td> <?php echo $totalharian ?> </td>
            <td> <?php echo $totaluts ?> </td>
            <td> <?php echo $totaluas?> </td>
            <td> <?php echo $ratarata?> </td>
        </tr>
    </table>
    </div>
</div>