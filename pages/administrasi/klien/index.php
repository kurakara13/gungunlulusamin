<?php
    $lvl = '../../../';
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

<?php

    include "../layouts/header.php";
 ?>

 <div class="">
   <div class="page-title">
     <div class="title_left">
       <h3>Klien</h3>
     </div>

   </div>

   <div class="clearfix"></div>

   <div class="row">
     <div class="col-md-12 col-sm-12 col-xs-12">
       <div class="x_panel">
         <div class="x_title">
           <h2 style="margin-right:20px">Data Klien</h2>
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-md">Tambah Data</button>
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
                 <th>No</th>
                 <th>Nama Klien</th>
                 <th>Alamat</th>
                 <th>No Telpon</th>
               </tr>
             </thead>
             <tbody>
               <?php
                  $sql = "select * from klien";
                  $result = mysqli_query($conn, $sql);
                  $i = 1;
                  while ($row = mysqli_fetch_array($result)) {
                ?>
               <tr>
                 <td><?php echo $i++; ?></td>
                 <td><?php echo $row['nama']; ?></td>
                 <td><?php echo $row['alamat']; ?></td>
                 <td><?php echo $row['no_telp']; ?></td>
               </tr>
             <?php } ?>
             </tbody>
           </table>
         </div>
       </div>
     </div>
   </div>
 </div>

 <!-- Small modal -->
 <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
   <form class="form-horizontal form-label-left" novalidate action="../functions/tambah_data.php" method="post">
     <div class="modal-dialog modal-md">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
           </button>
           <h4 class="modal-title" id="myModalLabel2">Tambah Klien</h4>
         </div>
         <div class="modal-body">
           <input type="hidden" name="page" value="klien">
           <input type="hidden" name="function" value="create">
           <div class="item form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Klien <span class="required">*</span>
             </label>
             <div class="col-md-8 col-sm-8 col-xs-12">
               <input id="name" class="form-control col-md-7 col-xs-12" name="nama" placeholder="Nama Klien" required="required" type="text">
             </div>
           </div>
           <div class="item form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">No Telepon <span class="required">*</span>
             </label>
             <div class="col-md-8 col-sm-8 col-xs-12">
               <input id="name" class="form-control col-md-7 col-xs-12" name="no_telp" placeholder="No Telepon" required="required" type="number">
             </div>
           </div>
           <div class="item form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nilai_spk">Alamat <span class="required">*</span>
             </label>
             <div class="col-md-8 col-sm-8 col-xs-12">
               <textarea id="name" class="form-control col-md-7 col-xs-12" name="alamat" placeholder="Alamat" required="required"></textarea>
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




 <?php

     include "../layouts/footer.php";

  ?>
