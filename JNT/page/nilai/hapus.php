<?php
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM nilai WHERE id_nilai='$id'");

?>
<script type="text/javascript">
      alert("Data Berhasil Dihapus")
      window.location.href="?page=nilai";
    </script>