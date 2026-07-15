<?php

include "../../koneksi.php";


date_default_timezone_set('Asia/Jakarta');

$koneksi = new mysqli("localhost", "root", "", "skripsi");
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
    <td><center><img src="../../dist/img/logo.png" width="auto" height="200px"></center></td>

  </tr>
  
  </table>
<hr>
<h3><center><b>LAPORAN DATA MAINTENANCE ASET PADA <?php
      if($bulan1 != ''){
          echo " BULAN ".bulan_indo((int)$bulan1)." TAHUN ".$tahun;
      }else{
          echo " TAHUN ".$tahun;
      } 
    ?>  </b></center></h3>
<table class="table table-borderless" style="width: 100%"> 
  <tr>
    <th style="text-align: right;">Tanggal Cetak :&nbsp&nbsp<?php echo format_indo(date('Y-m-d'))?> </th>
</tr>
  </table> 
<table border="1" width="100%" style="border-collapse: collapse;">

                                       <thead>
                                        <tr>

   <th width="25px" height="50px">No</th>
   <th width="25px" height="50px">Nomor Maintenance</th>
   <th width="25px" height="50px">Kode Asset</th>
   <th width="25px" height="50px">Nama Barang</th>
   <th width="25px" height="50px">Kategori</th>
   <th width="25px" height="50px">Jenis Maintenance</th>
   <th width="25px" height="50px">Status Barang</th>
   <th width="25px" height="50px">Tanggal Perawatan</th>
   <th width="25px" height="50px">Catatan</th>

 </tr>  
    </thead>
    <tbody>
                                     

        <?php
        $no = 1;
        
        $sql = $koneksi ->query("SELECT * from perawatan_brg
        INNER JOIN brg_masuk_peralatan using(kd_asset) 
        INNER JOIN kategori_brg using(id_kategori) 
        WHERE MONTH(tgl_perawatan)='$bulan1'
        or YEAR(tgl_perawatan)='$tahun' and proses='SELESAI'
        order BY tgl_perawatan and kd_asset desc
        ")or die($koneksi->error);
        while ($data=$sql->fetch_assoc()) {

        ?>
          <tr>
              <td width="25px" height="50px"><center><?php echo $no++;?></center></td> 
              <td width="100px" height="50px"><center><?php echo $data['id_perawatan'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['kd_asset'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['nama_barang'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['kategori'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['jenis_maintenance'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['status_brg'];?></center></td>
              <td width="100px" height="50px"><center><?php echo format_indo(date($data['tgl_perawatan']));?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['catatan'];?></center></td>
         </tr>  
        <?php   } ?>
            </tbody> 
            <!-- <?php $bua = mysqli_query($koneksi,"SELECT count(id_pengajuan) as total
              FROM	pengajuan_dtl_mmsk
              INNER JOIN pengajuan_msk using(id_pengajuan_msk)
              WHERE
              YEAR(pengajuan_msk.tgl_masuk)='$tahun' AND MONTH(pengajuan_msk.tgl_masuk)='$bulan1' ORDER BY pengajuan_msk.tgl_masuk Asc ");
               
               $tot = mysqli_query($koneksi,"SELECT SUM(harga_service) total_harga
              FROM	service
              WHERE
              YEAR(tgl_selesai)='$tahun' AND MONTH(tgl_selesai)='$bulan1' ORDER BY tgl_selesai Asc ");?>
                    
            <tfoot>
            <tr align="center" width="25px" height="40px">
              <td colspan="9" >Total</td>
              <!-- <td ><?php while($c=mysqli_fetch_array($bua)){ echo number_format($c['total']) ;}?></td> -->
              <!-- <td >Rp.<?php while($c=mysqli_fetch_array($tot)){ echo number_format($c['total_harga'],0,',','.') ;}?></td>
            </tr> -->
            </tfoot>
            </table>
             <br><p align="right">Banjarmasin,&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php echo format_indo(date('Y-m-d'))?> &nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>
            <br>Supervisor GW J&T Express &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>PT Global Jet Express Kalsel &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</br>         
            <br></br>   
            <br></br>
            <br></br>
            <u>Ali Abdul Muis</u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>
            </div>
            <br></br>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            
            <input type="button" class="noPrint button" value="Cetak" onclick="window.print()">
                      </div>
                  </div>
              </div>
          </div>
    </div>                                     
