<?php
    include "conn.php";
    if(isset($_GET["tb_users"])){
        mysqli_query($conn, "DELETE FROM `tb_users`");
        mysqli_query($conn, "ALTER TABLE tb_users AUTO_INCREMENT=1");
        header("Location: index.php");
    }
?>

<a href="reset.php?tb_users">Reset tb_users</a>