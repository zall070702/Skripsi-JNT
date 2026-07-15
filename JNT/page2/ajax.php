<?php
include "koneksi.php";

$id_kategori = $_GET['id_kategori'];

$query = mysqli_query($koneksi, "
  SELECT * FROM barang 
  WHERE id_kategori='$id_kategori'
  AND status='TERSEDIA'
");

$data = [];

while($row = mysqli_fetch_assoc($query)){
    $data[] = $row;
}

echo json_encode($data);