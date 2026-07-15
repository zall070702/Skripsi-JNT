<?php

include "../../koneksi.php";


date_default_timezone_set('Asia/Jakarta');

$koneksi = new mysqli("localhost", "root", "", "magang");
$bulan1 = $_POST['bulan'];
$tahun = $_POST['tahun'];

 function format_indo($date){
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahun = substr($date, 0, 4);               
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);
    $result = $tgl . " " . $BulanIndo[(int)$bulan-1]. " ". $tahun;
    return($result);
    }

function bulan_indo($bulan_angka) {
 $bulan1 = array(1=>'JANUARI', 
      'FEBRUARI', 
      'MARET', 
      'APRIL', 
      'MEI', 
      'JUNI', 
      'JULI', 
      'AGUSTUS', 
      'SEPTEMBER', 
      'OKTOBER', 
      'NOVEMBER', 
      'DESEMBER'
     );

 return $bulan1[$bulan_angka];
}
?>

<style>

    @media print{
      input.noPrint{
        display: none;
      }

    }
.img{
width: 900px;
height: auto;
margin-left: 20px;

}
.button {
  background-color: #1E90FF;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.tumblr {
  background-color: #1E90FF;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

</style>
<table class="table table-borderless" style="width: 100%" > 

  <tr>
    <td><center><img src="../../dist/img/logo_report_hrs.jpg" width="auto" height="200px"></center></td>
  </tr>
  
  </table>
  <?php
$id_supplier=$_POST['id_supplier'];
$sql= mysqli_query($koneksi,"SELECT *
FROM supplier 
WHERE id_supplier = '$id_supplier' ");
while ($data=$sql->fetch_assoc()) {
?>
<hr>
   <h3><center><b>LAPORAN SUPPLIER "<?php echo $data['nama_supplier'] ?>" PADA BULAN <?php echo  bulan_indo((int)$bulan1); ?>  </b></center></h3>
   <?php
break;
}
   ?>
<table class="table table-borderless" style="width: 100%"> 
  <tr>
    <th style="text-align: right;">Tanggal Cetak :&nbsp&nbsp<?php echo format_indo(date('Y-m-d'))?> </th>
</tr>
  </table> 
<table border="1" width="100%" style="border-collapse: collapse;">

                                       <thead>
                                        <tr>

   <th width="25px" height="50px">No</th>
   <th width="25px" height="50px">Tanggal Barang Diterima</th>
   <th width="25px" height="50px">Kode Asset</th>
   <th width="25px" height="50px">Nama Barang</th>
   <th width="25px" height="50px">Kategori Barang</th>
   <th width="25px" height="50px">Supplier</th>
   <th width="25px" height="50px">Harga</th>

 </tr>  
    </thead>
    <tbody>
                                     

        <?php
        $no = 1;
        $sql = $koneksi ->query("SELECT * from  brg_masuk_radio
        INNER JOIN kategori_brg using(id_kategori) 
        INNER JOIN pengajuan_dtl_mmsk using(id_pengajuan) 
        INNER JOIN supplier using(id_supplier) 
        WHERE id_supplier = '$id_supplier'
        AND  MONTH(tgl_pengajuan_diterima)='$bulan1'
        AND YEAR(tgl_pengajuan_diterima)='$tahun'
        AND status_brg='DISIMPAN'
        ");
        while ($data=$sql->fetch_assoc()) {

        ?>
          <tr>
              <td width="25px" height="50px"><center><?php echo $no++;?></center></td> 
              <td width="100px" height="50px"><center><?php echo format_indo(date($data['tgl_pengajuan_diterima']));?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['kd_asset_radio'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['nama_barang'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['kategori'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['nama_supplier'];?></center></td>
              <td width="100px" height="50px"><center>Rp.<?php echo number_format($data['harga'],0,',','.');?></center></td>
         </tr>  
        <?php   } ?>
        <?php
        $sql = $koneksi ->query("SELECT * from  brg_masuk_komputer
        INNER JOIN kategori_brg using(id_kategori) 
        INNER JOIN pengajuan_dtl_mmsk using(id_pengajuan) 
        INNER JOIN supplier using(id_supplier) 
        WHERE id_supplier = '$id_supplier'
        AND  MONTH(tgl_pengajuan_diterima)='$bulan1'
        AND YEAR(tgl_pengajuan_diterima)='$tahun'
        AND status_brg='DISIMPAN'
        ");
        while ($data=$sql->fetch_assoc()) {

        ?>
          <tr>
              <td width="25px" height="50px"><center><?php echo $no++;?></center></td> 
              <td width="100px" height="50px"><center><?php echo format_indo(date($data['tgl_pengajuan_diterima']));?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['kd_asset_pc'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['nama_barang'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['kategori'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['nama_supplier'];?></center></td>
              <td width="100px" height="50px"><center>Rp.<?php echo number_format($data['harga'],0,',','.');?></center></td>
         </tr>  
        <?php   } ?>
        <?php
        $sql = $koneksi ->query("SELECT * from  brg_masuk_peralatan
        INNER JOIN kategori_brg using(id_kategori) 
        INNER JOIN pengajuan_dtl_mmsk using(id_pengajuan) 
        INNER JOIN supplier using(id_supplier) 
        WHERE id_supplier = '$id_supplier'
        AND  MONTH(tgl_pengajuan_diterima)='$bulan1'
        AND YEAR(tgl_pengajuan_diterima)='$tahun'
        AND status_brg='DISIMPAN'
        ");
        while ($data=$sql->fetch_assoc()) {

        ?>
          <tr>
              <td width="25px" height="50px"><center><?php echo $no++;?></center></td> 
              <td width="100px" height="50px"><center><?php echo format_indo(date($data['tgl_pengajuan_diterima']));?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['kd_asset'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['nama_barang'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['kategori'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['nama_supplier'];?></center></td>
              <td width="100px" height="50px"><center>Rp.<?php echo number_format($data['harga'],0,',','.');?></center></td>
         </tr>  
        <?php   } ?>
            </tbody> 
            <?php $bua = mysqli_query($koneksi,"SELECT count(id_pengajuan) as total
              FROM	pengajuan_dtl_mmsk
              INNER JOIN pengajuan_msk using(id_pengajuan_msk)
              WHERE
              YEAR(pengajuan_msk.tgl_masuk)='$tahun' AND MONTH(pengajuan_msk.tgl_masuk)='$bulan1' ORDER BY pengajuan_msk.tgl_masuk Asc ");
               $tot = mysqli_query($koneksi,"SELECT SUM(harga) total_harga
              FROM	pengajuan_dtl_mmsk
              WHERE id_supplier = '$id_supplier'
              AND YEAR(tgl_pengajuan_diterima)='$tahun' AND MONTH(tgl_pengajuan_diterima)='$bulan1'  AND status_brg='DISIMPAN' ");?>
                    
            <tfoot>
            <tr align="center" width="25px" height="40px">
              <td colspan="6" >Total</td>
              <!-- <td ><?php while($c=mysqli_fetch_array($bua)){ echo number_format($c['total']) ;}?></td> -->
              <td >Rp.<?php while($c=mysqli_fetch_array($tot)){ echo number_format($c['total_harga'],0,',','.') ;}?></td>
            </tr>
            </tfoot>
            </table>
            <br><p align="right">Rantau,&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php echo format_indo(date('Y-m-d'))?> &nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>
            <br>Departemen Head HRGS &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>PT HASNUR RIUNG SINERGI site AGM &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</br>         
            <br></br>   
            <br></br>
            <br></br>
            <u>Joko Susilo</u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>
            </div>
            <br></br>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            
            <input type="button" class="noPrint button" value="Cetak" onclick="window.print()">
                      </div>
                  </div>
              </div>
          </div>
    </div>                                     
