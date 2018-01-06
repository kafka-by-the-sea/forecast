<?php

//require __DIR__ . "/../reports/vendor/autoload.php";
require "vendor/autoload.php";

$buyer = $_REQUEST['buyer'] ?? 7663;
$sales_book = $_REQUEST['sales_book'] ?? 127358;
$hq = $_REQUEST['hq'] ?? 85;
$tl = $_REQUEST['tl'] ?? 1976;
$bl = $_REQUEST['bl'] ?? 628;
$teens = $_REQUEST['teens'] ?? 220;
$girl = $_REQUEST['girl'] ?? 274;
$novel_love = $_REQUEST['novel_love'] ?? 5409;
$other = $_REQUEST['other'] ?? 2552;

//$command = escapeshellcmd("/home/staff/projects/sales-predictor/predict.py $buyer $sales_book $hq $tl $bl $teens $girl $novel_love $other");
$command = escapeshellcmd("predict.py $buyer $sales_book $hq $tl $bl $teens $girl $novel_love $other");
$result = json_decode(shell_exec($command), 1);

Twig_Autoloader::register();
$twig = new Twig_Environment(new Twig_Loader_Filesystem('.'), ['autoescape' => false]);

echo $twig->render('index.twig', ['buyer' => $buyer, 'sales_book' => $sales_book, 'hq' => $hq, 'tl' => $tl, 'bl' =>$bl, 'teens' => $teens, 'girl' => $girl, 'novel_love' => $novel_love, 'other' => $other, 'result' => $result]);
