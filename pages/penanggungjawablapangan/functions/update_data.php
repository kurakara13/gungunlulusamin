<?php
  session_start();
  include "../../../functions/config.php";

  if(isset($_POST['page'])){
    if($_POST['page'] == 'anggaran_pekerjaan')
    {
      $id_proyek = $_GET['id'];
      $sql="UPDATE proyek SET status = 'Pengajuan' WHERE id = '$id_proyek'";

      if(mysqli_query($conn, $sql)){
        header("location:../dataproyek");
      }else {
        echo mysqli_error($conn);
      }
    }
    elseif ($_POST['page'] == 'detail_uraian_pekerjaan')
    {
      $id_detail = $_POST['id_uraian'];
      $nama_detial_uraian = $_POST['nama_detial_uraian'];

      $sql="UPDATE detail_pekerjaan SET detail_pekerjaan = '$nama_detial_uraian' WHERE id = '$id_detail'";

      if(mysqli_query($conn, $sql)){
        header("location:../datapekerjaan/kelola/?id=".$_GET['id']);
      }else {
        echo mysqli_error($conn);
      }
    }
    elseif ($_POST['page'] == 'proyek')
    {
      $id_proyek = $_POST['id_proyek'];
      $nama_proyek = $_POST['nama_proyek'];
      $id_klien = $_POST['id_klien'];
      $id_user = $_SESSION['id'];
      $no_spk = $_POST['no_spk'];
      $nilai_spk = $_POST['nilai_spk'];
      $tgl_mulai = date("Y-m-d", strtotime(substr($_POST['waktu_proyek'],0,10)));;
      $tgl_selesai = date("Y-m-d", strtotime(substr($_POST['waktu_proyek'],-10)));;
      $tgl_kontrak = date("Y-m-d");
      $keterangan = $_POST['keterangan'];

      $sql="UPDATE
              proyek
            SET
              id_klien = '$id_klien',
              id_user = '$id_user',
              nama_proyek = '$nama_proyek',
              no_kontrak = '$no_spk',
              nilai_kontrak = '$nilai_spk',
              tgl_kontrak = '$tgl_kontrak',
              tgl_mulai = '$tgl_mulai',
              tgl_selesai = '$tgl_selesai',
              keterangan = '$keterangan'
            WHERE
              id = '$id_proyek'";

      if(mysqli_query($conn, $sql)){
        header("location:../dataproyek/edit/?id=".$id_proyek);
      }else {
        echo mysqli_error($conn);
      }
    }
  }

 ?>
