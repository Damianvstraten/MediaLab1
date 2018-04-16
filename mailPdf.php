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

// Images

$directory = "uploads/";
$scanned_directory = array_diff(scandir($directory), array('..', '.'));

$positionX = 10;
$positionY = 10;

foreach ($scanned_directory as $key=>$image) {
    if(count($scanned_directory) > 2) {
        $imageHeight = $tableHeight / (count($scanned_directory)/2);
        $imageWidth = $tableWidth / 2;

        $pdf->Image("uploads/" . $image, $positionX, $positionY, $imageWidth, $imageHeight);

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

$pdf->Image("images/sender.jpg", 14, 208, 90, 65);

// Text
$pdf->Text(115, $tableHeight + 40,'Afzender:');
$pdf->Text(115, $tableHeight + 60,'Damian');
$pdf->Text(115, $tableHeight + 80,'Wijnhaven 107');
$pdf->Text(115, $tableHeight + 90,'7583 JK Rotterdam');

$content = $pdf->Output('Pdf','S');
$to = "sonnylo@hotmail.com";
$subject = "Gedeelde instagram post";

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
  //Server settings
  $mail->SMTPDebug = 0;                                 // Enable verbose debug output
  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = 'solokh89@gmail.com';                 // SMTP username
  $mail->Password = 'gmail_password';                           // SMTP password
  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587;      

//Recipients
$mail->setFrom('sonny@example.com', 'Familie');
$mail->addAddress($to, 'Joe User');     // Add a recipient

$members = array(
    '0888150@hr.nl' => 'Sonny', 
);

foreach($members as $email => $name){
    $mail->addCC($email, $name);
}

$mail->addStringAttachment($content, 'mail.pdf', 'base64', 'application/pdf');

//Content
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Here is final test preparation';

//function to remove the directory with images after the message has been sent
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
    $message .= ". <br> Met vriendelijke groet, <br> Damian.";
    $mail->Body    = $message;
    $mail->send();
    echo "mail send";

    //remove uploads directory with the contents
    rrmdir($directory);
}else{
    echo "You haven't selected any grandparents to send a message.";
}

