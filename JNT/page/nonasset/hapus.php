<?php
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM mahasiswa WHERE id_mahasiswa='$id'");

?>
<script type="text/javascript">
      alert("Data Berhasil Dihapus")
      window.location.href="?page=mahasiswa";
    </script>