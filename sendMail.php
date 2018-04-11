<?php
    $to = "0879504@hr.nl";
    $subject = "Gedeelde instagram post";

    $message = file_get_contents("https://stud.hosted.hr.nl/0879504/MediaLab1/mailTemplate.php");

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Additional headers
    $headers .= 'From: Instagram shared post <medialab_prototype@test.com>' . "\r\n";

    if(mail($to,$subject,$message,$headers)) {
        echo "mail is verzonden";
    }