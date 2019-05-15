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

$resultProyek = mysqli_query($conn, "select * from proyek where id = '".$_GET['id']."'");
$rowProyek = mysqli_fetch_array($resultProyek);

 ?>

 <div class="">
   <div class="page-title">
     <div class="title_left">
       <h3>Pekerjaan Proyek <?php echo $rowProyek['nama_proyek'] ?></h3>
     </div>
   </div>

   <div class="clearfix"></div>

   <div class="row">
     <div class="col-md-12 col-sm-12 col-xs-12">
       <div class="x_panel">
         <div class="x_title">
           <h2 style="margin-right:20px">Data Pekerjaan</h2>
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
                 <th colspan="2">Nama Uraian</th>
                 <th class="text-center">Action</th>
               </tr>
             </thead>
             <tbody>
               <?php
                  $sql = "select * from uraian_pekerjaan where id_proyek = '".$_GET['id']."'";
                  $result = mysqli_query($conn, $sql);
                  while ($row = mysqli_fetch_array($result)) {
                ?>
               <tr>
                 <td colspan="2" style="background:orange;color:white;line-height: 37px;"><?php echo $row['nama_uraian']; ?></td>
                 <td class="text-center">
                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-md-detail" onclick="$('#id-uraian').val('<?php echo $row['id']; ?>')">Tambah Detail</button>
                 </td>
               </tr>
               <tr>
                 <th>No</th>
                 <th>Detail Pekerjaan</th>
                 <td class="text-center" style="width:20%">
                   Action
                 </td>
               </tr>
               <?php
                  $sqlDetail = "select * from detail_pekerjaan where id_uraian = '".$row['id']."'";
                  $resultDetail = mysqli_query($conn, $sqlDetail);
                  $i = 1;
                  $total = 0;
                  while ($rowDetail = mysqli_fetch_assoc($resultDetail)) {
                ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $rowDetail['detail_pekerjaan']; ?></td>
                  <td class="text-center">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bs-example-modal-md-detail"
                    onclick="editDetail('<?php echo $rowDetail['id'] ?>', '<?php echo $rowDetail['detail_pekerjaan'] ?>')">Edit Detail</button>
                  </td>
                </tr>
                <?php } ?>
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
    <form class="form-horizontal form-label-left" novalidate action="../../functions/tambah_data.php" method="post">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Tambah Klien</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="page" value="uraian_pekerjaan">
            <input type="hidden" name="id_proyek" value="<?php echo $_GET['id'] ?>">
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Uraian <span class="required">*</span>
              </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input id="name" class="form-control col-md-7 col-xs-12" name="nama_uraian" placeholder="Nama Uraian" required="required" type="text">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nilai_spk">Keterangan <span class="required">*</span>
              </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <textarea id="name" class="form-control col-md-7 col-xs-12" name="keterangan" placeholder="Keterangan Uraian" required="required"></textarea>
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


  <!-- Small modal -->
  <div class="modal fade bs-example-modal-md-detail" id="detail-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <form class="form-horizontal form-label-left" id="detial-modal-form" novalidate action="../../functions/tambah_data.php?id=<?php echo $_GET['id']?>" method="post">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Tambah Detail Pekerjaan</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="page" value="detail_uraian_pekerjaan">
            <input type="hidden" name="id_uraian" id="id-uraian">
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Detail Pekerjaan <span class="required">*</span>
              </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input id="nama_detial_uraian" class="form-control col-md-8 col-xs-12" name="nama_detial_uraian" placeholder="Nama Uraian" required="required" type="text">
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
 function editDetail(id_detail, detail_pekerjaan){
   $('#id-uraian').val(id_detail);
   $('#nama_detial_uraian').val(detail_pekerjaan);
   let action = $('#detial-modal-form').attr('action').replace('tambah', 'update');
   $('#detial-modal-form').attr('action', ''+action);
 }

 $('#detail-modal').on('hidden.bs.modal', function () {
   $('#id-uraian').val(null);
   $('#nama_detial_uraian').val(null);
   let action = $('#detial-modal-form').attr('action').replace('update', 'tambah');
   $('#detial-modal-form').attr('action', ''+action);
  })
 </script>
