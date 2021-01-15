<?php
    include "conn.php";
    if(isset($_GET["aktivasi"])){
        $url = $_GET["aktivasi"];
        $url_short = mysqli_query($conn, "SELECT `url_short` FROM `tb_users` WHERE `url_short` = '$url'");
        $row_url = mysqli_fetch_array($url_short);
        $url_db = $row_url["url_short"];
        if($url == $url_db){
            $update_aktivasi = mysqli_query($conn, "UPDATE `tb_users` SET `aktivasi`=1 WHERE `url_short` = '$url'");       
            header("Location: gs/admin");
        }
    }
?>