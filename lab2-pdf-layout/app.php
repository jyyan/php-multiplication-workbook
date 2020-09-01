<?php
require '../vendor/autoload.php';

// 因為只有顯示英數、故採用預設字體即可
$mpdf = new \Mpdf\Mpdf([
  'default_font_size' => '12'
]);

// A 卷
$dataSet = ["24 ÷ 4 =","24 ÷ 4 =","24 ÷ 4 =","24 ÷ 4 =","24 ÷ 4 =","24 ÷ 4 =","24 ÷ 4 =","24 ÷ 4 =","24 ÷ 4 ="];
$dataSetAnswer = ["70 ÷ 7 = 10", "70 ÷ 7 = 10"];

$mpdf->AddPage();
$mpdf->SetFontSize(15);

$i = 0;
foreach ($dataSet as $val) {
  $i++;
  $mpdf->WriteCell( 45, 20, $val , 0 , 0, 'L' , false);

  if ($i % 4 == 0) {
    $mpdf->Ln();
  }
}

$mpdf->Output('workbook.pdf', \Mpdf\Output\Destination::FILE);

?>
