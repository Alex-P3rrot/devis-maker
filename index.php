<?php

require_once __DIR__ . '/vendor/autoload.php';

setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
$header = file_get_contents('./templates/header.html');
$content = file_get_contents('./templates/content.html');
$footer = "
<table>
    <tr>
        <td>
            <small>" . strftime('%d %B %Y') . "</small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
        <td>
            <small>N° Siret : 94786376700010</small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
        <td>
            <small>Non assujetti à la TVA </small>
        </td>
    </tr>
</table>
";


$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => 'a4',
    'default_font' => 'dejavusans'
]);
$mpdf->useSubstitutions=false;
$mpdf->setAutoTopMargin = 'stretch';
$mpdf->SetDisplayMode('fullpage');
$mpdf->SetDefaultBodyCSS('background', "url('./assets/devis-background.png')");
$mpdf->SetDefaultBodyCSS('background-image-resize', 6);

$mpdf->SetHTMLHeader($header);
$mpdf->SetHTMLFooter($footer);
$mpdf->WriteHTML($content);

$mpdf->Output();