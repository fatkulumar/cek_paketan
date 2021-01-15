<?php
  include "conn.php";
    $pengirim = $_POST["pengirim"];
    $penerima = $_POST["penerima"];
    $tgl_penerimaan = $_POST["tgl_penerimaan"];
    $no_pelanggan = $_POST["no_pelanggan"];

    $data = [
        "penerima" => $penerima,
        "pengirim" => $pengirim,
        "tgl_penerimaan" => $tgl_penerimaan,
        "no_pelanggan" => $no_pelanggan,
    ];

    $qrys = mysqli_query($conn, "INSERT INTO `tb_resi`(`pengirim`, `penerima`, `tgl_penerimaan`, `no_pelanggan`) VALUES ('$pengirim', '$penerima', '$tgl_penerimaan', '$no_pelanggan')");

    echo json_encode($data);
   

?>