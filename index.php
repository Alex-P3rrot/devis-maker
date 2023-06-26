<?php

require_once __DIR__ . '/vendor/autoload.php';


$header = file_get_contents('./templates/header.html');
$content = file_get_contents('./templates/content.html');


$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => 'a4'
]);
$mpdf->useSubstitutions=false;
$mpdf->setAutoTopMargin = 'stretch';
$mpdf->SetDisplayMode('fullpage');
$mpdf->SetDefaultBodyCSS('background', "url('./assets/devis-background.png')");
$mpdf->SetDefaultBodyCSS('background-image-resize', 6);

$mpdf->SetHTMLHeader($header);
$mpdf->WriteHTML($content);

$mpdf->Output();