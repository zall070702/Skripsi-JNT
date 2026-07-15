<?php
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM supplier WHERE id_supplier='$id'");

?>
<script type="text/javascript">
      alert("Data Berhasil Dihapus")
      window.location.href="?page=supplier";
    </script>