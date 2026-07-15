<?php   
$id =$_GET['idpengajuan'];
$id2 =$_GET['idpeng'];
$keterangan_pengajuan ='Asset Pengajuan Tidak Disetujui';


$today = date("Y-m-d");
$status = 'DITOLAK';
$status_brg = 'DITOLAK';

  $query = "UPDATE pengajuan_dtl_mmsk SET status='$status', tgl_pengajuan_diterima='$today', keterangan_pengajuan='$keterangan_pengajuan', status_brg='$status_brg'WHERE id_pengajuan='$id'";
  $sql = $koneksi->query($query);
  
  if($sql){
    ?>
    <script type="text/javascript">
      window.location.href="?page1=validasi_pengajuan_asset&aksi=validasi&idpengajuanmsk=<?=$id2;?>"; 
    </script>

  <?php
  }
        
?>