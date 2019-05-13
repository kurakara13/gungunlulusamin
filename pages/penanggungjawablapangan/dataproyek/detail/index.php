<?php
$lvl = '../../../../';
$active = ['','active','','','','','',''];
?>


<?php function css($lvl){ ?>

  <!-- bootstrap-daterangepicker -->
  <link href="<?php echo $lvl?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

<?php } ?>

<?php function script($lvl){ ?>
  <!-- validator -->
  <script src="<?php echo $lvl?>assets/vendors/validator/validator.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="<?php echo $lvl?>assets/vendors/moment/min/moment.min.js"></script>
  <script src="<?php echo $lvl?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<?php } ?>

<?php include "../../layouts/header.php";?>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Detail Proyek</h3>
    </div>
  </div>
  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Detail Proyek</h2>
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
          <?php
            $result = mysqli_query($conn, "select * from proyek inner join klien on klien.id = proyek.id_klien where proyek.id = '".$_GET['id']."'");
            $row = mysqli_fetch_assoc($result);
           ?>
           <div class="form-horizontal form-label-left">
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Proyek <span class="required"> : </span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <p style="margin-bottom:0;line-height: 37px;"><?php echo $row['nama_proyek']; ?></p>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Klien <span class="required">:</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <p style="margin-bottom:0;line-height: 37px;"><?php echo $row['nama']; ?></p>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_spk">Nomor SPK <span class="required">:</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <p style="margin-bottom:0;line-height: 37px;"><?php echo $row['no_kontrak']; ?></p>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nilai_spk">Nilai SPK <span class="required">:</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <p style="margin-bottom:0;line-height: 37px;">Rp. <?php echo number_format($row['nilai_kontrak']); ?></p>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_mulai">Lama Proyek <span class="required">:</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <p style="margin-bottom:0;line-height: 37px;"><?php echo $row['tgl_mulai']; ?> - <?php echo $row['tgl_selesai']; ?></p>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nilai_spk">Keterangan <span class="required">:</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <p style="margin-bottom:0;line-height: 37px;"><?php echo $row['keterangan']; ?></p>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nilai_spk">Status <span class="required">:</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <p style="margin-bottom:0;line-height: 37px;"><?php echo $row['status']; ?></p>
              </div>
            </div>
            <div class="ln_solid"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

 <?php include "../../layouts/footer.php"; ?>
