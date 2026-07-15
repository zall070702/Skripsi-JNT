<?php
$query = "SELECT max(id_pr) as maxid from pr";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);
$id_pr = $data['maxid'];

$nourut = (int) substr($id_pr,3,3);
$nourut++;
$char = "PR";
$newid = $char . sprintf("%03s" , $nourut);

?>
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data PR/PO</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                <h4>Custom Content Below</h4>
                <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Profile</a>
                  </li>
                </ul>
                <div class="tab-content" id="custom-content-below-tabContent">
                  <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper dui molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam odio magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi, vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus porta, ante et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta sem. Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus. Cras lacinia erat eget sapien porta consectetur. 
                  </div>
                  <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                    Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam. 
                  </div>
                  <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                    Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna. 
                  </div>
                  <div class="tab-pane fade" id="custom-content-below-settings" role="tabpanel" aria-labelledby="custom-content-below-settings-tab">
                    Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis. 
                  </div>
                </div>
            <div class="tab-custom-content">
              <p class="lead mb-0">Custom Content goes here</p>
            </div>
            <h4 class="mt-5 ">Custom Content Above</h4>
            <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-messages-tab" data-toggle="pill" href="#custom-content-above-messages" role="tab" aria-controls="custom-content-above-messages" aria-selected="false">Messages</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-settings-tab" data-toggle="pill" href="#custom-content-above-settings" role="tab" aria-controls="custom-content-above-settings" aria-selected="false">Settings</a>
              </li>
            </ul>
            <div class="tab-custom-content">
              <p class="lead mb-0">Custom Content goes here</p>
            </div>
            <div class="tab-content" id="custom-content-above-tabContent">
              <div class="tab-pane fade show active" id="custom-content-above-home" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper dui molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam odio magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi, vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus porta, ante et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta sem. Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus. Cras lacinia erat eget sapien porta consectetur. 
              </div>
              <div class="tab-pane fade" id="custom-content-above-profile" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
                 Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam. 
              </div>
              <div class="tab-pane fade" id="custom-content-above-messages" role="tabpanel" aria-labelledby="custom-content-above-messages-tab">
                 Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna. 
              </div>
              <div class="tab-pane fade" id="custom-content-above-settings" role="tabpanel" aria-labelledby="custom-content-above-settings-tab">
                 Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis. 
              </div>
            </div>
          </div>
              <form role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID PR</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="id_pr" 
                    value="<?php echo $newid;?>" placeholder="Masukkan Id" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">No PR</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="no_pr"  >
                  </div>    
                  <div class="form-group">
                    <label for="exampleInputEmail1">Item</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="item"  >
                  </div>    
                  <div class="form-group">
                  <label for="exampleInputEmail1">Quality</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="quality"  >
                  </div>    
                  <div class="form-group">
                    <label for="exampleInputEmail1">Harga</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="harga"  >
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">MDA</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="mda"  >
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1" >Tanggal PR</label>
                            <div class="col-sm-4">
                                <input type="date" request  class="form-control" name="tgl_pr" id="exampleInputEmail1">
                            </div>
                  </div>    
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status PR</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="status_pr"  >
                  </div>               
                  <div class="form-group">
                    <label for="exampleInputEmail1">No PO</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="no_po"  >
                  </div>    
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status PO</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="status_po"  >
                  </div>     
                  <div class="form-group">
                    <label for="exampleInputEmail1" >Tanggal Tiba</label>
                            <div class="col-sm-4">
                                <input type="date"   class="form-control" name="tgl_tiba" id="exampleInputEmail1">
                            </div>
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="status"  >
                  </div>   
                  <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="keterangan"  >
                  </div>       
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="simpan"  class="btn btn-primary">Submit</button>
                  <a href="?page=pr"><button type="submit" name="batal"  class="btn btn-danger">Batal</a>
                </div>
                
              </form>
            </div>
<?php
if (isset($_POST['simpan'])){

$id_pr = $_POST['id_pr'];
$no_pr = $_POST['no_pr'];
$item = $_POST['item'];
$quality = $_POST['quality'];
$harga = $_POST['harga'];
echo number_format($harga,0,',','.');
$mda = $_POST['mda'];
$tgl_pr = $_POST['tgl_pr'];
$status_pr = $_POST['status_pr'];
$no_po = $_POST['no_po'];
$status_po = $_POST['status_po'];
$tgl_tiba = $_POST['tgl_tiba'];
$status = $_POST['status'];
$keterangan = $_POST['keterangan'];



$sql = mysqli_query($koneksi,"INSERT INTO pr (id_pr,no_pr,item,quality,harga,mda,tgl_pr,status_pr,no_po,status_po,tgl_tiba,status,keterangan)VALUES('$id_pr','$no_pr','$item','$quality','$harga','$mda','$tgl_pr','$status_pr','$no_po','$status_po','$tgl_tiba','$status','$keterangan')");

  
  if ($sql) {
    ?>
    <script type="text/javascript">
      alert("Data Berhasil Disimpan")
      window.location.href="?page=pr";
    </script>
    <?php
  }


}
?>