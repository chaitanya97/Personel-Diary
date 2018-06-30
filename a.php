<?php

require("tcpdf/tcpdf.php");
require 'vendor/autoload.php';
$image = "img/profilehelloworld.jpg";
$pdf = new TCPDF();
$pdf->AddPage();
$pdf->Image($image,0,0,170,170);
$pdf->Output();
?>
