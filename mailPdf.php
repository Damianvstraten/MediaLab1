<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

require('fpdf.php');

$pdf = new FPDF();
$pdf->addPage();

// Font
$pdf->setFont("Arial", "B", "20");

// Table
$tableWidth = 190;
$tableHeight = 180;
$pdf->Cell($tableWidth, $tableHeight,'',1,200,'C');

// echo __DIR__ . '<br>';

// Images

$directory = "uploads/";
$scanned_directory = array_diff(scandir($directory), array('..', '.'));

$positionX = 10;
$positionY = 10;

foreach ($scanned_directory as $key=>$image) {
    if(count($scanned_directory) > 2) {
        $imageHeight = $tableHeight / (count($scanned_directory)/2);
        $imageWidth = $tableWidth / 2;

        $pdf->Image($directory . $image, $positionX, $positionY, $imageWidth, $imageHeight);

    } else if(count($scanned_directory) == 2){
        $imageHeight = 95;
        $imageWidth = 190;

        $pdf->Image("uploads/" . $image, $positionX, $positionY, $imageWidth, $imageHeight);

        $positionY = $positionY + $imageHeight;
    } else {
        $imageHeight = 180;
        $imageWidth = 190;

        $pdf->Image("uploads/" . $image, $positionX, $positionY, $imageWidth, $imageHeight);
    }
}

$pdf->Ln(15);
$pdf->Cell($tableWidth, 71,'',1,200,'C');

$pdf->Image("images/team2.jpeg", 14, 208, 90, 65);

// Text
$pdf->Text(115, $tableHeight + 40,'Afzender:');
$pdf->Text(115, $tableHeight + 60,'Team 2');
$pdf->Text(115, $tableHeight + 80,'Wijnhaven 107');
$pdf->Text(115, $tableHeight + 90,'7583 JK Rotterdam');

$content = $pdf->Output('Pdf','S');
$to = "sonnylo@hotmail.com";
$subject = "Gedeelde instagram post";

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
  //Server settings
//   $mail->SMTPDebug = 0;                                 // Enable verbose debug output
//   $mail->isSMTP();                                      // Set mailer to use SMTP
//   $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
//   $mail->SMTPAuth = true;                               // Enable SMTP authentication
//   $mail->Username='solokh89@gmail.com';                 // SMTP username
//   $mail->Password='marson2803';                           // SMTP password
//   $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
//   $mail->Port = 587;      

//Recipients
$mail->setFrom('sonnylo@hr.hotmail.com', 'Familie');
$mail->addAddress($to, 'Joe User');     // Add a recipient

// $members = array(
//     '0888150@hr.nl' => 'Sonny', 
//     "0879504@hr.nl" => 'Damian',
//     '0880446@hr.nl' => 'Kenzo',
//     '0891783@hr.nl' => 'Marian'
// );

// foreach($members as $email => $name){
//     $mail->addCC($email, $name);
// }

$mail->addStringAttachment($content, 'mail.pdf', 'base64', 'application/pdf');

//Content
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Beterschap Nikki';

// function to remove the directory with images after the message has been sent
function rrmdir($dir) { 
    if (is_dir($dir)) { 
      $objects = scandir($dir); 
      foreach ($objects as $object) { 
        if ($object != "." && $object != "..") { 
          if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object); 
        } 
      } 
      reset($objects); 
      rmdir($dir); 
    } 
 } 


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $message = "Beste Zorgplezier, <br>Kunt u dit delen met ";
    if(!empty($_POST['contact'])){
        foreach($_POST['contact'] as $send){
            $message .= $send.', ';
        }
    }
    $message .= ". <br> Met vriendelijke groet, <br> Team 2.";
    $mail->Body    = $message;
   if($mail->send()){
    echo "mail send";
   }else{
       echo "mail not send";
   }
    //remove uploads directory with the contents
    rrmdir($directory);
}

