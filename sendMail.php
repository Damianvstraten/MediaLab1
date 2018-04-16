<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


require __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();

$directory = "uploads/";
$scanned_directory = array_diff(scandir($directory), array('..', '.'));

$to = "sonnylo@hotmail.com";
$subject = "Gedeelde instagram post";

// $message = file_get_contents("mailTemplate.php");

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Additional headers
$headers .= 'From: Instagram shared post <medialab_prototype@test.com>' . "\r\n";

$message = '<div class="email-container" style="border: 1px dashed black;margin: 1em; max-height: 50em; max-width: 50em;">
<div class="images" style="background-image: url(images/1.jpg);background-repeat: round; background-size: cover;">
    <div class="grid-container2" style="display: grid; grid-template-columns: auto auto; padding: 60px; text-align: center;">';

foreach($scanned_directory as $value){      
    $message .= ' <div class="grid-item2" style="margin: 0.3em;">
    <div>
        <img src="uploads/'. $value . '" style="padding: 2em; height: 10em; width: 10em;">
    </div>
</div>';
}

$message .= ' </div>
    </div>
    <hr>
    <div class="sender">
        <div class="grid-container3" style="display: grid; grid-template-columns: auto auto; padding: 10px;">
            <div class="grid-item3" style="text-align: center;">
                    <img id="sender-pic" src="images/me.jpg" style="width: 5em; height: 5em; padding-top: 0.5em; border-radius: 50%;">
            </div>
            <div class="grid-item3" style="padding-left: 0.3em; font-family: Comic Sans MS; border: 1px solid black;max-height: 5em; max-width: 5em; text-align:center;">
                <h3>Sender: <br>Sonny Lo</h3>
                <br>               
    <h3>Beukenstraat 15 <br> 4341 TL GOES</h3>
    </div>

    </div>
    </div>
    </div>';
// echo $message;

$mpdf->WriteHTML($message);
// $pdf = $mpdf->Output();

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'solokh89@gmail.com';                 // SMTP username
    $mail->Password = 'marson2803';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;      

    //Recipients
    $mail->setFrom('sonny@example.com', 'Mailer');
    $mail->addAddress($to, 'Joe User');     // Add a recipient

    //Attachments
    // $pdf= $mpdf->Output("Mail.pdf", "S");
    $pdf = file_get_contents('mailPdf.php');
    
    echo $pdf;
    $mail->addStringAttachment($pdf, 'mail.pdf', 'base64', 'application/pdf');

    //Content
    // $mail->isHTML(true);                                  // Set email format to HTML
    // $mail->Subject = 'Here is the subject';
    // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    // $mail->send();
     