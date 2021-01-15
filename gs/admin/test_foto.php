<!-- <img style="width: 10%;" src="foto/gasek.jpg" alt="Pondok Pesantren Sabilurrosyad">
<img style="width: 20%;" src="foto/gasmul.png" alt="Gasek Multimedia">
<p style="line-height: 0px; margin-left: 10px;">Gasek &copy; 2021</p> -->



<?php 
include "../../conn.php";
    // echo $_SERVER["HTTP_HOST"];
    // $kode = "umar";    

    //agan bisa pakai patokan angka lain, misalnya 77777 atau ulang tahun agan 12 December 1985
$date = date('H:i:s');
$start = strtotime($date); //77777  atau strtotime("12 December 1985"); 
$myid = 1;
$kode = $start+$myid;

$short_url = base_convert($kode, 10, 36); //konversi ke alphanumeric, base 10 ke base 36
$short_url_back = base_convert($short_url, 36, 10); //konversi balik  base 36 ke base 10

$host = $_SERVER['HTTP_HOST']."/latihan/resi/aktivasi.php?aktivasi=";
$url_path = $host;
$url_short = str_shuffle(password_hash($short_url, PASSWORD_DEFAULT));
$url_display = $url_path.$url_short;
// $url_display = $url_path.$short_url;

$theid = $short_url_back - $start; //kenapa bukan ambil langsung $myid? karena bisa jadi "decode" dilakukan di halaman lain.
$url_lengkap = $url_path."gs/admin/process.php?verifikasi=".$theid;
// $url_update_status = 
// $qrys_shorten = mysqli_query($conn, "INSERT INTO `tb_shorten`(`short_url`) VALUES ('$short_url')");
// $qrys_short = mysqli_query($conn, "SELECT `short_url` FROM `tb_shorten`");
// $row_short = mysqli_fetch_array($qrys_short);
// $url_short = $row_short["short_url"];
// if($row_short["short_url"] == $url_short){
//     echo "ada"; die();
// }

// print "time start = ".date("d F Y",$start)." is ".$start." <br>";
// print "time start + id(".$myid.") =".$kode."<br>";
// print "short url is ".$short_url."<br>";
// print "short_url_back is ".$short_url_back."<br>";
// print "///////////////////////////////////////<br>";
// print "url_display is ".$url_display."<br>"; 
// $random = str_shuffle($url_display);
// echo $random;
// print "///////////////////////////////////////<br>";
// print "url_lengkap is ".$url_lengkap."<br>";
// print "///////////////////////////////////////"; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<center>Email ini dikirim otomatis oleh sistem Cek Paketan Pondok Sabilurrosad. Mohon klik tombol di bawah ini untuk aktivasi akun</center>
    <div style="margin: 30px;">
        <center><a style="background:#2C97DF; color:white; border-top:0; border-left:0; border-right:0; border-bottom:5px solid #2A80B9; padding:10px 20px; text-decoration:none; font-family:sans-serif; font-size:11pt;" href="">centerUmar</a></center>
    </div>
    <center><div>
        <img style="width: 10%;" src="foto/gasek.jpg" alt="Pondok Pesantren Sabilurrosyad">
        <img style="width: 20%;" src="foto/gasmul.png" alt="Gasek Multimedia">
        <p style="line-height: 0px; margin-left: 10px;">Gasek &copy; 2021</p>
    
    </div></center>
</body>
</html>