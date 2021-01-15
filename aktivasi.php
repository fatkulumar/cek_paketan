<?php
    session_start();
    include "conn.php";
    if(isset($_GET["aktivasi"])){
        $url = mysqli_real_escape_string($conn, $_GET["aktivasi"]);
        $url_short = mysqli_query($conn, "SELECT `url_short` FROM `tb_users` WHERE `url_short` = '$url'");
        $row_url = mysqli_fetch_array($url_short);
        $url_db = $row_url["url_short"];
        if($url == $url_db){
            $update_aktivasi = mysqli_query($conn, "UPDATE `tb_users` SET `aktivasi`=1 WHERE `url_short` = '$url'");
            $_SESSION["pesan_akun_aktif"] = "Akun anda aktif, silahkan login!";
            header("Location: gs/admin");
        }
    }elseif(isset($_GET["forgot"])) {
        $url = mysqli_real_escape_string($conn, $_GET["forgot"]);
        header("Location: gs/admin/page_forgot.php?url='$url'");
    }
?>