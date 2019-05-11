<?php
  include "config.php";

  if(isset($_POST['page'])){
    if($_POST['page'] == 'tambah_proyek'){
      $nama_proyek = $_POST['nama_proyek'];
      $pemilik_proyek = $_POST['pemilik_proyek'];
      $no_spk = $_POST['no_spk'];
      $nilai_spk = $_POST['nilai_spk'];
      $tgl_mulai = $_POST['tgl_mulai'];
      $tgl_selesai = $_POST['tgl_selesai'];
      $durasi = $_POST['durasi'];
      $keterangan = $_POST['keterangan'];
      // $id_user =

      $sql="INSERT INTO proyek ( id_user, no_spk, pemilik_proyek, nama_proyek, nilai_kontrak, tanggal_mulai, tanggal_selesai, durasi, keterangan)
            VALUES ('4', '$no_spk', '$pemilik_proyek', '$nama_proyek', '$nilai_spk', '$tgl_mulai', '$tgl_selesai', '$durasi', '$keterangan')";

      if(mysqli_query($conn, $sql)){
        header("location:../pages/penanggungjawablapangan/dataproyek");
      }else {
        echo mysqli_error($conn);
      }
    }
  }

 ?>
