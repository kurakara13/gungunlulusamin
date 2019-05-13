<?php
$lvl = '../../../../';
$active = ['','active','','','','','',''];
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

$resultProyek = mysqli_query($conn, "select * from proyek where id = '".$_GET['id']."'");
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
                 <th colspan="7">Pekerjaan</th>
               </tr>
             </thead>
             <tbody>
               <?php
                  $sql = "select * from uraian_pekerjaan where id_proyek = '".$_GET['id']."'";
                  $result = mysqli_query($conn, $sql);
                  $total_harga_semua = 0;
                  while ($row = mysqli_fetch_array($result)) {
                ?>
               <tr>
                 <td colspan="7" style="background:orange;color:white;line-height: 37px;"><?php echo $row['nama_uraian']; ?></td>
               </tr>
               <tr>
                 <th style="width:5%" class="text-center">No</th>
                 <th style="width:30%">Detail Pekerjaan</th>
                 <th class="text-center" style="width:10%">Volume</th>
                 <th class="text-center"  style="width:10%">Satuan</th>
                 <th>Harga</th>
                 <th>Total Harga</th>
               </tr>
               <?php
                  $sqlDetail = "select * from detail_pekerjaan where id_uraian = '".$row['id']."'";
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
                  <td class="text-center">
                    <?php
                    if(isset($rowAnggalan['volume'])){
                      echo $rowAnggalan['volume'];
                    } else {
                      echo "0";
                    }
                    ?>
                  </td>
                  <td class="text-center">
                    <?php
                    if(isset($rowAnggalan['satuan'])){
                      echo $rowAnggalan['satuan'];
                    } else {
                      echo "-";
                    }
                    ?>
                  </td>
                  <td>Rp.
                    <?php
                    if(isset($rowAnggalan['harga_satuan'])){
                      echo number_format($rowAnggalan['harga_satuan']);
                    }else {
                      echo "0";
                    }
                    ?>
                  </td>
                  <td>Rp. <?php echo number_format($rowAnggalan['total_harga']); ?></td>
                </tr>
                <?php } ?>
                <?php
                  $total_harga_semua = $total_harga_semua + $total;
                 ?>

                <tr>
                  <th colspan="5">Total Harga</th>
                  <th>Rp. <?php echo number_format($total) ?></th>
                </tr>
             <?php } ?>
             <?php

                $ppn = $total_harga_semua*0.1;
              ?>
              <tr>
                <td colspan="9" class="text-center"></td>
              </tr>
              <tr>
                <td colspan="4"></td>
                <th>Total</th>
                <th>Rp. <?php echo number_format($total_harga_semua) ?></th>
              </tr>
              <tr>
                <td colspan="4"></td>
                <th>PPN 10%</th>
                <th>Rp. <?php echo number_format($ppn) ?></th>
              </tr>
              <tr>
                <td colspan="4"></td>
                <th>Grand Total</th>
                <th>Rp. <?php echo number_format($ppn + $total_harga_semua) ?></th>
              </tr>
             </tbody>
           </table>
         </div>
       </div>
     </div>
   </div>
 </div>

 <?php include "../../layouts/footer.php"; ?>

 <script>
 function editDetail(id_uraian, detail_pekerjaan, volume, satuan, harga){
   $('#nama_detial_uraian').val(detail_pekerjaan);
   $('#volume').val(volume);
   $('#satuan').val(satuan);
   $('#harga').val(harga);
   $('#id-uraian').val(id_uraian);
 }

 $('#detail-modal').on('hidden.bs.modal', function () {
   $('#nama_detial_uraian').val(null);
   $('#volume').val(null);
   $('#satuan').val(null);
   $('#harga').val(null);
   $('#id-uraian').val(null);
  })
 </script>
