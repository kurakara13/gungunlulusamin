<?php
  session_start();
  include "../../../functions/config.php";

  if(isset($_POST['page'])){
    if($_POST['page'] == 'anggaran_pekerjaan'){
      if($_POST['function'] == 'pengajuan'){
        $id_proyek = $_GET['id'];
        $sql="UPDATE proyek SET status = 'Pengajuan' WHERE id = '$id_proyek'";

        if(mysqli_query($conn, $sql)){
          header("location:../dataproyek");
        }else {
          echo mysqli_error($conn);
        }
      }
    }
  }

 ?>
