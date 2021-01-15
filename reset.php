<?php
    include "conn.php";
    if(isset($_GET["tb_users"])){
        mysqli_query($conn, "DELETE FROM `tb_users`");
        mysqli_query($conn, "ALTER TABLE tb_users AUTO_INCREMENT=1");
        header("Location: index.php");
    }elseif(isset($_GET["tb_resi"])){
        mysqli_query($conn, "DELETE FROM `tb_resi`");
        mysqli_query($conn, "ALTER TABLE tb_resi AUTO_INCREMENT=1");
        header("Location: index.php");
    }
?>

<a href="reset.php?tb_users">Reset tb_users</a> |
<a href="reset.php?tb_resi">Reset tb_resi</a>
