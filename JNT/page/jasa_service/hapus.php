<?php
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM jasa_service WHERE id_jasa='$id'");

?>
<script type="text/javascript">
      alert("Data Berhasil Dihapus")
      window.location.href="?page=jasa_service";
    </script>