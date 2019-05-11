<?php
  include "../../../functions/config.php";

  if(isset($_POST['page'])){
    if($_POST['page'] == 'klien'){
      if($_POST['function'] == 'create'){
        $nama = $_POST['nama'];
        $no_telp = $_POST['no_telp'];
        $alamat = $_POST['alamat'];
        // $id_user =

        $sql="INSERT INTO klien ( nama, no_telp, alamat)
              VALUES ('$nama', '$no_telp', '$alamat')";

        if(mysqli_query($conn, $sql)){
          header("location:../klien");
        }else {
          echo mysqli_error($conn);
        }
      }
    }
  }

 ?>
