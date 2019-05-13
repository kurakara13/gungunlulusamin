<?php
  session_start();
  include "../../../functions/config.php";

  if(isset($_POST['page'])){
    if($_POST['page'] == 'proyek'){
      if($_POST['function'] == 'create'){
        $nama_proyek = $_POST['nama_proyek'];
        $id_klien = $_POST['id_klien'];
        $id_user = $_SESSION['id'];
        $no_spk = $_POST['no_spk'];
        $nilai_spk = $_POST['nilai_spk'];
        $tgl_mulai = date("Y-m-d", strtotime(substr($_POST['waktu_proyek'],0,10)));;
        $tgl_selesai = date("Y-m-d", strtotime(substr($_POST['waktu_proyek'],-10)));;
        $tgl_kontrak = date("Y-m-d");
        $keterangan = $_POST['keterangan'];

        $sql="INSERT INTO proyek ( id_klien, id_user, nama_proyek, no_kontrak, nilai_kontrak, tgl_kontrak, tgl_mulai, tgl_selesai, status, keterangan)
              VALUES ('$id_klien', '$id_user', '$nama_proyek', '$no_spk', '$nilai_spk', '$tgl_kontrak', '$tgl_mulai', '$tgl_selesai', 'Baru', '$keterangan')";

        if(mysqli_query($conn, $sql)){
          header("location:../dataproyek");
        }else {
          echo mysqli_error($conn);
        }
      }
    }else if($_POST['page'] == 'uraian_pekerjaan'){
      if($_POST['function'] == 'create'){
        $nama_uraian = $_POST['nama_uraian'];
        $keterangan = $_POST['keterangan'];
        $id_proyek = $_POST['id_proyek'];

        $sql="INSERT INTO uraian_pekerjaan ( id_proyek, nama_uraian, keterangan)
              VALUES ('$id_proyek', '$nama_uraian', '$keterangan')";

        if(mysqli_query($conn, $sql)){

          // $sql="INSERT INTO anggaran ( id_proyek, nama_uraian, keterangan)
          //       VALUES ('$id_proyek', '$nama_uraian', '$keterangan')";


          header("location:../dataproyek/pekerjaan/?id=".$_POST['id_proyek']);
        }else {
          echo mysqli_error($conn);
        }
      }
    }else if($_POST['page'] == 'detail_uraian_pekerjaan'){
      if($_POST['function'] == 'create'){
        $detail_pekerjaan = $_POST['nama_detial_uraian'];
        // $volume = $_POST['volume'];
        // $satuan = $_POST['satuan'];
        // $harga = $_POST['harga'];
        $id_uraian = $_POST['id_uraian'];
        // $total_harga = $volume * $harga;

        $sql="INSERT INTO detail_pekerjaan ( id_uraian, detail_pekerjaan)
              VALUES ('$id_uraian', '$detail_pekerjaan')";

        if(mysqli_query($conn, $sql)){
          $last_id = mysqli_insert_id($conn);

          $sqlAnggaran ="INSERT INTO anggaran (id_detail_uraian)
                          VALUES ('$last_id')";
          if(mysqli_query($conn, $sqlAnggaran)){
            header("location:../dataproyek/pekerjaan/?id=".$_GET['id']);
          }
        }else {
          echo mysqli_error($conn);
        }
      }else if($_POST['function'] == 'update'){
        echo "update";
        // $detail_pekerjaan = $_POST['nama_detial_uraian'];
        // $volume = $_POST['volume'];
        // $satuan = $_POST['satuan'];
        // $harga = $_POST['harga'];
        // $id_uraian = $_POST['id_uraian'];
        //
        // $sql="INSERT INTO detail_pekerjaan ( id_uraian, detail_pekerjaan, volume, satuan, harga)
        //       VALUES ('$id_uraian', '$detail_pekerjaan', '$volume', '$satuan', '$harga')";
        //
        // if(mysqli_query($conn, $sql)){
        //   header("location:../dataproyek/pekerjaan/?id=".$_GET['id']);
        // }else {
        //   echo mysqli_error($conn);
        // }
      }
    }else if($_POST['page'] == 'anggaran_pekerjaan'){
      if($_POST['function'] == 'update'){
        $volume = $_POST['volume'];
        $satuan = $_POST['satuan'];
        $harga = $_POST['harga'];
        $id_uraian = $_POST['id_uraian'];
        $total_harga = $volume * $harga;

        $sql="UPDATE anggaran SET volume = '$volume', satuan = '$satuan', harga_satuan = '$harga', total_harga = '$total_harga' WHERE id = '$id_uraian'";

        if(mysqli_query($conn, $sql)){

          header("location:../dataproyek/anggaran/?id=".$_GET['id']);
        }else {
          echo mysqli_error($conn);
        }
      }
    }
  }

 ?>
