<?php
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM kelas WHERE id_kelas='$id'");

?>
<script type="text/javascript">
      alert("Data Berhasil Dihapus")
      window.location.href="?page=kelas";
    </script>