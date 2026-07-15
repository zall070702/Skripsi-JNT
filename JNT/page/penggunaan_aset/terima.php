<?php   
$id =$_GET['idpengajuan'];
$id2 =$_GET['idpengajuanpnjm'];
$keterangan_pengajuan ='Pengajuan Penggunaan Aset Diterima';

$today = date("Y-m-d");
$status = 'DITERIMA';
$status_brg = 'PROSES';

  $query = "UPDATE pinjam SET status_pengajuan='$status', tgl_pinjam='$today', keterangan_pinjam='$keterangan_pengajuan', status_brg='$status_brg'WHERE id_pinjam='$id'";
  $sql = $koneksi->query($query);
  
  if($sql){
    ?>
    <script type="text/javascript">
      window.location.href="?page=penggunaan_aset&aksi=validasi&idpengajuanpnjm=<?=$id2;?>"; 
    </script>

  <?php
  }
        
?>
