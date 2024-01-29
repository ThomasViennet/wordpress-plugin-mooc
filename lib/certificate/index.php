<?php
require('fpdf/fpdf.php');
header('content-type:image:jpeg');
$font = 'Roboto/Roboto-Light.ttf';
$fontBold = 'Roboto/Roboto-Regular.ttf';
$time = time();

$image = imagecreatefromjpeg('certification-SEO-referencime.jpg');
$color = imagecolorallocate($image, 34, 46, 90);

$title1 = 'Certificat';
$title2 = 'de réussite';

$name = 'Thomas Viennet';

$description1 = 'a validé et obtenu le certificat : ';
$description2 = 'Connaissances théoriques avancées en référencement naturel.';

$numCertificate = 1;
$dateObtention = date("d F Y");

imagettftext($image, 150, 0, 100, 600, $color, $font, $title1);
imagettftext($image, 150, 0, 100, 800, $color, $font, $title2);

imagettftext($image, 100, 0, 100, 1100, $color, $font, $name);

imagettftext($image, 70, 0, 100, 1300, $color, $font, $description1);
imagettftext($image, 70, 0, 100, 1400, $color, $fontBold, $description2);

imagettftext($image, 30, 0, 100, 1700, $color, $font, 'Certificate n° ' . $numCertificate);
imagettftext($image, 30, 0, 100, 1750, $color, $font, 'Délivré le ' . $dateObtention);

imagejpeg($image, 'certificates/' . $time . '.jpg');
imagedestroy($image);

$pdf = new FPDF();
$pdf->AddPage('L', 'A5');
$pdf->Image('certificates/' . $time . '.jpg', 0, 0, 210, 148);
ob_end_clean();
$pdf->Output();

// header('Content-Type: application/pdf');
// $pdf->Output('I', 'Certificat.pdf');
