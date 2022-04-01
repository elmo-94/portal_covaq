<?php 

include 'config.php'; 
//include_once 'phplot.php';

include ("pchart/class/pData.class.php");
include ("pchart/class/pDraw.class.php");
include ("pchart/class/pImage.class.php");


$data = new pData();

$data->addPoints(array(3,6,8,4),"Manuel");
$data->addPoints(array(4,7,3,9),"Sudiau");
$data->addPoints(array(7,8,2,3),"Congo");

$data->addPoints(array("1 Bim", "2 Bim", "3 Bim", "4, Bim"), "Bimestre");

$data->setAbscissa("Bimestre");
$data->setAxisName(0,"Notas");

$myPicture = new pImage(700, 230, $data);
$myPicture->setFontProperties(array("FontName"=>".pchart/fonts/verdana.ttf", "FontSize"=>9));
$myPicture->setGraphArea(60,50,640,190);
$myPicture->drawScale();
$myPicture->drawLineChart();
$myPicture->drawPlotChart(array("DisplayValues"=>TRUE, "PlotBorder"=>TRUE));
$myPicture->drawLegend(580, 85, array("Mode"=>LEGEND_VERTICAL));
$myPicture->autoOutput("grafico.png");
?>"