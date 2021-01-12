<?php
    session_start();
    include "../../conn.php";
    if(isset($_POST["update"])) {
        $id_update = mysqli_real_escape_string($conn, $_POST["id_update"]);
        $pengirim = mysqli_real_escape_string($conn, $_POST["pengirim"]);
        $penerima = mysqli_real_escape_string($conn, $_POST["penerima"]);
        $tgl_pengiriman = mysqli_real_escape_string($conn, $_POST["tgl_pengiriman"]);
        $tgl_penerimaan = mysqli_real_escape_string($conn, $_POST["tgl_penerimaan"]);
        $no_pelanggan = mysqli_real_escape_string($conn, $_POST["no_pelanggan"]);
        $deskripsi = mysqli_real_escape_string($conn, $_POST["deskripsi"]);
        $berat = mysqli_real_escape_string($conn, $_POST["berat"]);
        $biaya = mysqli_real_escape_string($conn, $_POST["biaya"]);
        $tujuan = mysqli_real_escape_string($conn, $_POST["tujuan"]);
        $asuransi = mysqli_real_escape_string($conn, $_POST["asuransi"]);
        $qrys_edit = mysqli_query($conn, "UPDATE `tb_resi` SET `pengirim`='$pengirim',`penerima`='$penerima',`tgl_penerimaan`='$tgl_penerimaan',`tgl_pengiriman`='$tgl_pengiriman',`no_pelanggan`='$no_pelanggan',`deskripsi`='$deskripsi',`berat`='$berat',`biaya`='$biaya',`tujuan`='$tujuan',`asuransi`='$asuransi' WHERE `id_resi` = '$id_update'");
        if($qrys_edit) {
            header("Location: index.php");
        }else{
            echo "update gagal";
        }
    }elseif(isset($_GET["delete"])) { 
        $id_hapus = mysqli_real_escape_string($conn, $_GET["delete"]);
        $qrys_hapus = mysqli_query($conn, "DELETE FROM `tb_resi` WHERE `id_resi` = '$id_hapus'");
        if($qrys_hapus) {
            header("Location: index.php");
        }else{
            echo "hapus gagal";
        }
    }elseif(isset($_POST["add"])){
        $t_pengirim = mysqli_real_escape_string($conn, $_POST["pengirim"]);
        $t_penerima = mysqli_real_escape_string($conn, $_POST["penerima"]);
        $t_tgl_pengiriman = mysqli_real_escape_string($conn, $_POST["tgl_pengiriman"]);
        $t_tgl_penerimaan = mysqli_real_escape_string($conn, $_POST["tgl_penerimaan"]);
        $t_no_pelanggan = mysqli_real_escape_string($conn, $_POST["no_pelanggan"]);
        $t_deskripsi = mysqli_real_escape_string($conn, $_POST["deskripsi"]);
        $t_berat = mysqli_real_escape_string($conn, $_POST["berat"]);
        $t_biaya = mysqli_real_escape_string($conn, $_POST["biaya"]);
        $t_tujuan = mysqli_real_escape_string($conn, $_POST["tujuan"]);
        $t_asuransi = mysqli_real_escape_string($conn, $_POST["asuransi"]);
        $qrys_tambah = mysqli_query($conn, "INSERT INTO `tb_resi`(`pengirim`, `penerima`, `tgl_penerimaan`, `tgl_pengiriman`, `no_pelanggan`, `deskripsi`, `berat`, `biaya`, `tujuan`, `asuransi`) VALUES ('$t_pengirim', '$t_penerima', '$t_tgl_pengiriman', '$t_tgl_penerimaan', '$t_no_pelanggan', '$t_deskripsi', '$t_berat', '$t_biaya', '$t_tujuan', '$t_asuransi')");
        if($qrys_tambah){
            header("Location: index.php");
        }else{
            echo "gagal tambah";
        }
    }elseif(isset($_GET["ambil"])){
        $id_ambil = mysqli_real_escape_string($conn, $_GET["ambil"]);
        $qrys_ambil = mysqli_query($conn, "UPDATE `tb_resi` SET `status` = 1 WHERE `id_resi` = $id_ambil");
        if($qrys_ambil){
            header("Location: index.php");
        }else{
            echo "ambil gagal";
        }
    }elseif(isset($_POST["login"])){
        $l_username = mysqli_real_escape_string($conn, $_POST["username"]);
        $l_password = mysqli_real_escape_string($conn, $_POST["password"]);

        $qrys_login = mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$l_username'");
        $row_l = mysqli_fetch_array($qrys_login);
        $pssd_verify = password_verify($l_password ,$row_l["password"]);
        $uname_login = $row_l["username"];
        if($l_username == $uname_login && $pssd_verify){
            $_SESSION["username"] = $uname_login;
            $_SESSION["name"] = $row_l["name"];
            $_SESSION["id_user"] = $row_l["id_user"];
            header("Location: index.php");
        }else{
            $_SESSION["pesan"] = "Username / Password Tidak Ada";
            header("Location: login.php");
        }
        
    }elseif(isset($_POST["register"])){
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

        $pssd_hash = password_hash($password, PASSWORD_DEFAULT);
        $qrys_reg = mysqli_query($conn, "INSERT INTO `tb_users` (`username`, `password`) VALUES ('$username', '$pssd_hash')");
        $query_reg = mysqli_query($conn, "SELECT username, password, name FROM tb_users WHERE username = '$username'");
        $row_r = mysqli_fetch_array($query_reg);
        if($qrys_reg){
            $_SESSION["username"] = $username;
            $_SESSION["nama"] = $row_r["nama"];
            header("Location: index.php");
        }else{
            echo "daftar gagal";
        }
    }elseif(isset($_POST["update_profil"])){
        $id_user = mysqli_real_escape_string($conn, $_POST["id_user"]);
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $username_profil = mysqli_real_escape_string($conn, $_POST["username"]);
        $qrys_profil = mysqli_query($conn, "UPDATE `tb_users` SET `username`='$username_profil', `name`='$name' WHERE `id_user` = '$id_user'");
        if($qrys_profil){
            header("Location: index.php?profil");
        }else{
            echo "gagal rubah profil";
        }
    }