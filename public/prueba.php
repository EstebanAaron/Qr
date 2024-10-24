<?php
require '../vendor/autoload.php';

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
$data =$_GET['data'];
$label =$_GET['label'];
$result = Builder::create()
    ->writer(new PngWriter())
    ->writerOptions([])
    ->data($data)
    ->encoding(new Encoding('UTF-8'))
    ->errorCorrectionLevel(ErrorCorrectionLevel::High)
    ->size(300)
    ->margin(10)
    ->roundBlockSizeMode(RoundBlockSizeMode::Margin)
    ->labelText($label)
    ->labelFont(new NotoSans(20))
    ->labelAlignment(LabelAlignment::Center)
    ->validateResult(false)
    ->build();

    $result->saveToFile(__DIR__.'/img/'.'/qrcode.png');
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body{
      background-color: #999999;
    }
    h1{
      font-size: 200px;
      color: #999;
      text-shadow: #0000ff 4px 5px;
      
    }
    p{
      text-align: center;
      flex-wrap: wrap;
    }
  </style>
</head>
<body>
  <h1>Prueba</h1>
  <p>
    <img src="<?= $result->getDataUri()?>" alt="">
  </p>
  <?php
  
  ?>
</body>
</html>