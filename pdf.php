<?php
include_once './dompdf/autoload.inc.php';
include_once './dompdf/src/Dompdf.php';
// Reference the Dompdf namespace 
use Dompdf\Dompdf;
function dateToFrench($date, $format) 
{
    $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    $french_days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
    $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
    return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date) ) ) );
}

$dompdf = new Dompdf();
// Load content from html file 
//$html = file_get_contents("contrat.html"); 
$options = $dompdf->getOptions();
$options->setDefaultFont('Courier');
$options->setIsHtml5ParserEnabled(true);
$options->set('isRemoteEnabled', true);
$dompdf->setOptions($options);        
$html='<html>
<head>
</head>
<body>
<div style="border: 5px solid blue;width:90%;margin:auto;min-height:1000px;" >
    <div style="text-align:center;margin-top:30%;padding-bottom:30%;">
    <img src="wp-includes/themes/images/logo-alfasigma-2.png" width="70%"  >
    <h1>Nom du delege</h1>
    <div style="margin-top:10%;">
        Training<br>
        pharmacovigilance Mai<br>
        2022
    </div>
    <div>
</div>
<div style="position:fixed;bottom:10%;left:10%;"><p>Fait le : ';
$current_time=dateToFrench("now" ,"l j F Y");
$html.=$current_time;
$html.='</p></div>
</body>
<html>';

$dompdf->loadHtml($html); 
    
// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', 'protrait'); 
$dompdf->render();
$output = $dompdf->output();
$path="./pdf/test.pdf";


file_put_contents($path, $output);