<?php
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM kategori_brg WHERE kd_brg='$id'");

?>
<script type="text/javascript">
      alert("Data Berhasil Dihapus")
      window.location.href="?page=kategori_brg";
    </script>