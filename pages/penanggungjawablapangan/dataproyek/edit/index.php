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
      <h3>Edit Proyek</h3>
    </div>
  </div>
  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Edit Proyek</h2>
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
            $resultProyek = mysqli_query($conn, "select proyek.*, klien.nama from proyek inner join klien on klien.id = proyek.id_klien where proyek.id = '".$_GET['id']."'");
            $rowProyek = mysqli_fetch_assoc($resultProyek);
           ?>

          <form class="form-horizontal form-label-left" novalidate action="../../functions/update_data.php" method="post">
            <input type="hidden" name="page" value="proyek">
            <input type="hidden" name="id_proyek" value="<?php echo $rowProyek['id']; ?>">

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Proyek <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="name" class="form-control col-md-7 col-xs-12" name="nama_proyek" value="<?php echo $rowProyek['nama_proyek'] ?>" placeholder="Nama Proyek" required="required" type="text">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Klien <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control col-md-7 col-xs-12" name="id_klien" required="required">
                  <option value="">-Pilih Klien-</option>
                  <?php
                     $result = mysqli_query($conn, "select * from klien");
                     while ($row = mysqli_fetch_array($result)) {
                   ?>
                   <option value="<?php echo $row['id'] ?>" <?php if($rowProyek['id_klien'] == $row['id']){echo "selected";} ?>><?php echo $row['nama'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_spk">Nomor SPK <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="name" class="form-control col-md-7 col-xs-12" name="no_spk" value="<?php echo $rowProyek['no_kontrak'] ?>" placeholder="Nomor SPK" required="required" type="text">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nilai_spk">Nilai SPK <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="name" class="form-control col-md-7 col-xs-12" name="nilai_spk" value="<?php echo $rowProyek['nilai_kontrak'] ?>" placeholder="Nilai SPK" required="required" type="number">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_mulai">Lama Proyek <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <fieldset>
                  <div class="control-group">
                    <div class="controls">
                      <div class="input-prepend input-group">
                        <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                        <input type="text" style="width: 200px" name="waktu_proyek" id="reservation" class="form-control" value="<?php echo date("m/d/Y", strtotime($rowProyek['tgl_mulai'])); ?> - <?php echo date("m/d/Y", strtotime($rowProyek['tgl_selesai'])); ?>" />
                      </div>
                    </div>
                  </div>
                </fieldset>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nilai_spk">Keterangan <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="name" class="form-control col-md-7 col-xs-12" name="keterangan" placeholder="Keterangan Proyek" required="required"><?php echo $rowProyek['keterangan'] ?></textarea>
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-primary">Cancel</button>
                <button id="send" type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

 <?php include "../../layouts/footer.php"; ?>
