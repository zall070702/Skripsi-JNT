

<?php

// melakukan koneksi 
$connect = mysqli_connect('localhost', 'root', '', 'skripsi');

//menghitung jumlah pesan dari tabel pesan
$query= mysqli_query($connect, "Select Count(id_pengajuan_msk) as jumlah From pengajuan_msk");

//menampilkan data
$hasil = mysqli_fetch_array($query);

//membuat data json
echo json_encode(array('jumlah' => $hasil['jumlah']));

?>