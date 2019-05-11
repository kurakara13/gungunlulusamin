<?php
$lvl = '../../../../';
$active = ['','','','','','active','',''];
?>


<?php function css($lvl){ ?>

<?php } ?>

<?php function script($lvl){ ?>
  <!-- validator -->
  <script src="<?php echo $lvl?>assets/vendors/validator/validator.js"></script>

<?php } ?>

<?php include "../../layouts/header.php";?>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Tambah Biaya Resiko</h3>
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
          <h2>Tambah Proyek</h2>
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

          <form class="form-horizontal form-label-left" novalidate action="<?php echo $lvl?>functions/tambah_data.php" method="post">
            <input type="hidden" name="page" value="tambah_proyek">

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Proyek <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="name" class="form-control col-md-7 col-xs-12" name="nama_proyek" placeholder="Nama Proyek" required="required" type="text">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name_pemilik">Pemilik Proyek <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="name" class="form-control col-md-7 col-xs-12" name="pemilik_proyek" placeholder="Pemilik Proyek" required="required" type="text">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_spk">Nomor SPK <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="name" class="form-control col-md-7 col-xs-12" name="no_spk" placeholder="Nomor SPK" required="required" type="number">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nilai_spk">Nilai SPK <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="name" class="form-control col-md-7 col-xs-12" name="nilai_spk" placeholder="Nilai SPK" required="required" type="number">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3" for="tgl_mulai">Tanggal Mulai <span class="required">*</span>
              </label>
              <div class="col-md-2">
                <input id="name" class="form-control" name="tgl_mulai" required="required" type="date">
              </div>
              <label class="control-label col-md-2" for="tgl_selesai">Tanggal Selesai <span class="required">*</span>
              </label>
              <div class="col-md-2">
                <input id="name" class="form-control" name="tgl_selesai" required="required" type="date">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3" for="durasi">Durasi <span class="required">*</span>
              </label>
              <div class="col-md-2">
                <input id="name" class="form-control" name="durasi" placeholder="Durasi" required="required" type="number">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nilai_spk">Keterangan <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="name" class="form-control col-md-7 col-xs-12" name="keterangan" placeholder="Keterangan Proyek" required="required"></textarea>
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
