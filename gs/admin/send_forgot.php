<?php
    use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\Exception;
    
    require_once "vendor/autoload.php";
    // include "test_foto.php";
    

// require_once "library/PHPMailer.php";
// require_once "library/Exception.php";
// require_once "library/OAuth.php";
// require_once "library/POP3.php";
// require_once "library/SMTP.php";

    $mail = new PHPMailer;

    // Enable SMTP debugging.
    // $mail->SMTPDebug = 3;
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();
    //Set SMTP host name
    $mail->Host = "tls://smtp.gmail.com"; //host mail server
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;
    //Provide username and password
    $mail->Username = "@gmail.com";   //nama-email smtp
    $mail->Password = "";           //password email smtp
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "ssl";
    //Set TCP port to connect to
    $mail->Port = 587;

    $mail->From = "rayafantasi@gmail.com"; //email pengirim
    $mail->FromName = "Ganti Password Cek Paketan"; //nama pengirim

    // $mail->addAddress($_POST['email'], $_POST['nama']); //email penerima
    $mail->addAddress($email_db, $name_db); //email penerima

    $mail->isHTML(true);

    $mail->AddEmbeddedImage("foto/gasek.jpg", "gs", "gasek.jpg");
    $mail->AddEmbeddedImage("foto/gasmul.png", "gm", "gasmul.jpg");

    $html = "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Document</title>

        <style>
            
            .btn {
                box-sizing: border-box;
                -webkit-appearance: none;
                -moz-appearance: none;
                        appearance: none;
                background-color: transparent;
                border: 2px solid #e74c3c;
                border-radius: 0.6em;
                color: #e74c3c;
                cursor: pointer;
                display: flex;
                align-self: center;
                font-size: 1rem;
                font-weight: 400;
                line-height: 1;
                margin: 20px;
                padding: 1.2em 2.8em;
                text-decoration: none;
                text-align: center;
                text-transform: uppercase;
                font-family: 'Montserrat', sans-serif;
                font-weight: 700;
            }
            .btn:hover, .btn:focus {
                color: #fff;
                outline: 0;
            }
            
            .first {
                transition: box-shadow 300ms ease-in-out, color 300ms ease-in-out;
            }
            .first:hover {
                box-shadow: 0 0 40px 40px #e74c3c inset;
            }
  
        </style>
    </head>
    <body>
        <center>Email ini dikirim otomatis oleh sistem Cek Paketan Pondok Sabilurrosad. Mohon klik tombol di bawah ini untuk ganti password akun</center>
        <div style='margin: 30px'>
        <center><a style='background:#2C97DF; color:white; border-top:0; border-left:0; border-right:0; border-bottom:5px solid #2A80B9; padding:10px 20px; text-decoration:none; font-family:sans-serif; font-size:11pt;' href='".$url_pendek."'>Aktivasi</a></center>
        </div>
        <center><div>
        <img style='width: 10%;' src='cid:gs' alt='Pondok Pesantren Sabilurrosyad'>
        <img style='width: 20%;' src='cid:gm' alt='Gasek Multimedia'>
        <p style='line-height: 0px; margin-left: 10px;'>Gasek &copy; 2021</p>
        </div></center>

    </div>
    </body>
    </html>";
    $html = $html;

    $mail->Subject = 'Ganti Password Cek Paketan'; //subject
    $mail->Body    = $html; //isi email
    $mail->AltBody = " Gasek Multimedia"; //body email
    // $mail->Subject = $_POST['subjek']; //subject
    // $mail->Body    = $_POST['pesan']; //isi email
    // $mail->AltBody = "PHP mailer"; //body email

    if(!$mail->send())
    {
    echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else
    {
    echo "Message has been sent successfully";
    }

    
?>

    