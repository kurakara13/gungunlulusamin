<?php
$lvl = '../../../../';
$active = ['','','active','','','','',''];
?>


<?php function css($lvl){ ?>
    <!-- Datatables -->
    <link href="<?php echo $lvl?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $lvl?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $lvl?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $lvl?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $lvl?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
<?php } ?>

<?php function script($lvl){ ?>
  <!-- Datatables -->
  <script src="<?php echo $lvl?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo $lvl?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="<?php echo $lvl?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo $lvl?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="<?php echo $lvl?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="<?php echo $lvl?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="<?php echo $lvl?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="<?php echo $lvl?>assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="<?php echo $lvl?>assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="<?php echo $lvl?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo $lvl?>assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="<?php echo $lvl?>assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="<?php echo $lvl?>assets/vendors/jszip/dist/jszip.min.js"></script>
  <script src="<?php echo $lvl?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="<?php echo $lvl?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>

<?php } ?>

<?php include "../../layouts/header.php";?>

<?php

$sqlProyek = "select
                proyek.id,
                tgl_selesai,
                nama_proyek,
                tgl_mulai,
                SUM(total_harga) as total_harga
              from
                proyek
              inner join uraian_pekerjaan on uraian_pekerjaan.id_proyek = proyek.id
            	inner join detail_pekerjaan on detail_pekerjaan.id_uraian = uraian_pekerjaan.id
            	inner join anggaran on anggaran.id_detail_uraian = detail_pekerjaan.id
              where proyek.id = '".$_GET['id']."'";
$resultProyek = mysqli_query($conn, $sqlProyek);
$rowProyek = mysqli_fetch_array($resultProyek);

 ?>

 <div class="">
   <div class="page-title">
     <div class="title_left">
       <h3>Anggaran Proyek <?php echo $rowProyek['nama_proyek'] ?></h3>
     </div>
   </div>

   <div class="clearfix"></div>

   <div class="row">
     <div class="col-md-12 col-sm-12 col-xs-12">
       <div class="x_panel">
         <div class="x_title">
           <h2 style="margin-right:20px">Data Anggaran</h2>
           <ul class="nav navbar-right panel_toolbox">
             <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
             </li>
             <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
               <ul class="dropdown-menu" role="menu">
                 <li><a href="#">Settings 1</a>
                 </li>
                 <li><a href="#">Settings 2</a>
                 </li>
               </ul>
             </li>
             <li><a class="close-link"><i class="fa fa-close"></i></a>
             </li>
           </ul>
           <div class="clearfix"></div>
         </div>
         <div class="x_content">
           <table id="datatable" class="table table-striped table-bordered">
             <thead>
               <tr>
                 <td class="text-center">No</td>
                 <td class="text-center">Uraian Pekerjaan</td>
                 <td class="text-center">Total Harga</td>
                 <td class="text-center">Bobot (%)</td>
                 <?php
                    $newDate = $rowProyek['tgl_mulai'];
                    $lastDate = $rowProyek['tgl_selesai'];
                    $i = 0;
                    $m = 0;
                    while ($newDate != $lastDate) {
                      $i++;
                      if($i == 7){
                        $m++;
                  ?>
                    <td class="text-center">M<?php echo $m ;?></td>
                    <?php
                    $i = 0;
                  }
                  $newDate = date('Y-m-d', strtotime($newDate . ' +1 day'));
                  }
                  ?>
                 <td class="text-center">Action</td>
               </tr>
                 <?php
                    $newDate = $rowProyek['tgl_mulai'];
                    $lastDate = $rowProyek['tgl_selesai'];
                    $i = 0;
                    $m = 0;
                    while ($newDate != $lastDate) {
                      $frontDate = $newDate;
                      $i++;
                      if($i == 7){
                        $m++;
                  ?>
                    <?php $dataTanggal[] = date('Y-m-d', strtotime($frontDate . ' -6 day')).' - '.$newDate; ?>
                    <?php
                    $i = 0;
                  }
                  $newDate = date('Y-m-d', strtotime($newDate . ' +1 day'));
                  }
                  ?>
             </thead>
             <tbody>
               <?php
                  $sql = "select * from uraian_pekerjaan where id_proyek = '".$_GET['id']."'";
                  $result = mysqli_query($conn, $sql);
                  $countUraian = mysqli_num_rows($result);
                  $total_harga_semua = 0;
                  while ($row = mysqli_fetch_array($result)) {
                ?>
               <tr>
                 <th style="width:5%" class="text-center"></th>
                 <th style="width:15%"><?php echo $row['nama_uraian']; ?></th>
                 <th style="width:15%"></th>
                 <th style="width:10%"></th>
                 <?php
                    $newDate = $rowProyek['tgl_mulai'];
                    $lastDate = $rowProyek['tgl_selesai'];
                    $i = 0;
                    $m = 0;
                    while ($newDate != $lastDate) {
                      $i++;
                      if($i == 7){
                        $m++;
                  ?>
                    <td class="text-center"></td>
                    <?php
                    $i = 0;
                  }
                  $newDate = date('Y-m-d', strtotime($newDate . ' +1 day'));
                  }
                  ?>
                 <td class="text-center">

                 </td>
               </tr>
               <?php
                  $sqlDetail = "select detail_pekerjaan.id, id_uraian, detail_pekerjaan, tgl_mulai, tgl_selesai from detail_pekerjaan left join jadwal on jadwal.id_detail_uraian = detail_pekerjaan.id where id_uraian = '".$row['id']."'";
                  $resultDetail = mysqli_query($conn, $sqlDetail);
                  $i = 1;
                  $total = 0;

                  while ($rowDetail = mysqli_fetch_assoc($resultDetail)) {
                    $resultAnggaran = mysqli_query($conn, "select * from anggaran where id_detail_uraian = '".$rowDetail['id']."'");
                    $rowAnggalan = mysqli_fetch_assoc($resultAnggaran);
                    if($rowAnggalan['harga_satuan'] == null || $rowAnggalan['volume'] == null){
                      $total = $total + 0;
                    }else {
                      // code...
                      $total = $total + ((float) $rowAnggalan['volume'] * (float) $rowAnggalan['harga_satuan']);
                    }
                ?>
                <tr>
                  <td class="text-center"><?php echo $i++; ?></td>
                  <td><?php echo $rowDetail['detail_pekerjaan']; ?></td>
                  <td>Rp.
                    <?php
                    if(isset($rowAnggalan['harga_satuan'])){
                      echo number_format($rowAnggalan['total_harga']);
                    }else {
                      echo "0";
                    }
                    ?>
                  </td>
                  <td class="text-center"> <?php echo number_format((($rowAnggalan['total_harga']/$rowProyek['total_harga'])*100),2); ?> %</td>
                  <?php
                     $newDate = $rowProyek['tgl_mulai'];
                     $lastDate = $rowProyek['tgl_selesai'];
                     $i = 0;
                     $m = 0;
                     while ($newDate != $lastDate) {
                       $frontDate = $newDate;
                       $i++;
                       if($i == 7){
                         $m++;
                   ?>
                     <td class="text-center" <?php if(date('Y-m-d', strtotime($frontDate . ' -6 day')) == $rowDetail['tgl_mulai'] || $newDate == $rowDetail['tgl_selesai']){echo "style='background-color:yellow'";} ?>></td>
                     <?php
                     $i = 0;
                   }
                   $newDate = date('Y-m-d', strtotime($newDate . ' +1 day'));
                   }
                   ?>
                  <td class="text-center">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bs-example-modal-md-detail"
                    onclick="aturJadwal('<?php echo $rowDetail['id'] ?>', '<?php echo $rowDetail['detail_pekerjaan'] ?>')">Atur Jadwal</button>
                  </td>
                </tr>
                <?php } ?>
             <?php } ?>
             </tbody>
           </table>
         </div>
       </div>
     </div>
     <div class="col-md-12 col-sm-12 col-xs-12">
       <div class="x_panel">
         <div class="x_title">
           <h2 style="margin-right:20px">Keterangan Minggu</h2>
           <ul class="nav navbar-right panel_toolbox">
             <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
             </li>
             <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
               <ul class="dropdown-menu" role="menu">
                 <li><a href="#">Settings 1</a>
                 </li>
                 <li><a href="#">Settings 2</a>
                 </li>
               </ul>
             </li>
             <li><a class="close-link"><i class="fa fa-close"></i></a>
             </li>
           </ul>
           <div class="clearfix"></div>
         </div>
         <div class="x_content">
           <table class="table" style="width:30%">
             <?php $a=1; for ($i=0; $i < count($dataTanggal); $i++) { ?>
             <tr>
               <th><?php echo "M".$a++; ?></th>
               <td>: <?php echo $dataTanggal[$i]; ?></td>
             </tr>
             <?php } ?>
           </table>

         </div>
       </div>
     </div>
   </div>
 </div>

  <!-- Small modal -->
  <div class="modal fade bs-example-modal-md-detail" id="detail-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <form class="form-horizontal form-label-left" novalidate action="../../functions/tambah_data.php?id=<?php echo $_GET['id']?>" method="post">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Buat Anggaran</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="page" value="jadwal">
            <input type="hidden" name="id_detail" id="id-detail">
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Detail Pekerjaan <span class="required">*</span>
              </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input id="nama_detial_uraian" class="form-control col-md-8 col-xs-12" readonly name="nama_detial_uraian" placeholder="Nama Uraian" required="required" type="text">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Minggu <span class="required">*</span>
              </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <table class="table table-bordered" id="table-Minggu">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Minggu</th>
                      <th>Tanggal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $a=1; for ($i=0; $i < count($dataTanggal); $i++) { ?>
                    <tr>
                      <th><input type="checkbox" name="minggu[]" value="<?php echo $dataTanggal[$i]; ?>"></th>
                      <th><?php echo "M".$a++; ?></th>
                      <td>: <?php echo $dataTanggal[$i]; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="ln_solid"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <!-- /modals -->


 <?php include "../../layouts/footer.php"; ?>

 <script>
 $('#detail-modal').on('hidden.bs.modal', function () {
   $('#nama_detial_uraian').val(null);
   $('#volume').val(null);
   $('#satuan').val(null);
   $('#harga').val(null);
   $('#id-uraian').val(null);
  })

  function aturJadwal(id_detail, nama_detail){
    $('#id-detail').val(id_detail);
    $('#nama_detial_uraian').val(nama_detail);
  }
 </script>
