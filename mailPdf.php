<?php

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
        $imageHeight = 90;
        $imageWidth = 95;

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

$pdf->Output();