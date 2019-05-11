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

<?php include "../layouts/header.php";?>

 <div class="">
   <div class="page-title">
     <div class="title_left">
       <h3>Proyek</h3>
     </div>

     <div class="title_right">
       <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
         <div class="input-group">
           <input type="text" class="form-control" placeholder="Search for...">
           <span class="input-group-btn">
             <button class="btn btn-default" type="button">Go!</button>
           </span>
         </div>
       </div>
     </div>
   </div>

   <div class="clearfix"></div>

   <div class="row">
     <div class="col-md-12 col-sm-12 col-xs-12">
       <div class="x_panel">
         <div class="x_title">
           <h2 style="margin-right:20px">Data Proyek</h2>
           <a href="create"><button class="btn btn-primary">Tambah Data</button></a>
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
           <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
             <thead>
               <tr>
                 <th>No</th>
                 <th>Nama Proyek</th>
                 <th>Nama Klien</th>
                 <th>Nomor SPK</th>
                 <th>Nilai SPK</th>
                 <th>Tanggal Proyek</th>
                 <th>Status</th>
                 <th>Action</th>
                 <th class="none">Tanggal Mulai</th>
                 <th class="none">Tanggal Selesai</th>
                 <th class="none">Keterangan</th>
               </tr>
             </thead>
             <tbody>
               <?php
                  $sql = "select * from proyek inner join klien on klien.id = proyek.id_klien";
                  $result = mysqli_query($conn, $sql);
                  $i = 1;
                  while ($row = mysqli_fetch_array($result)) {
                ?>
               <tr>
                 <td><?php echo $i++; ?></td>
                 <td><?php echo $row['nama_proyek']; ?></td>
                 <td><?php echo $row['nama']; ?></td>
                 <td><?php echo $row['no_kontrak']; ?></td>
                 <td><?php echo $row['nilai_kontrak']; ?></td>
                 <td><?php echo $row['tgl_kontrak']; ?></td>
                 <td>
                   <?php if($row['status']){
                     echo "<p class='alert-success text-center' style='padding:9px'>Waiting</p>";
                   } ?>
                 </td>
                 <td>
                   <a href="pekerjaan?id=<?php echo $row['id']; ?>"><button class="brn btn-warning form-control">Pekerjaan</button></a>
                 </td>
                 <td><?php echo $row['tgl_mulai']; ?></td>
                 <td><?php echo $row['tgl_selesai']; ?></td>
                 <td><?php echo $row['keterangan']; ?></td>
               </tr>
             <?php } ?>
             </tbody>
           </table>
         </div>
       </div>
     </div>


   </div>
 </div>

 <?php include "../layouts/footer.php"; ?>
