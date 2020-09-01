<?php
require '../vendor/autoload.php';

$displayAnswer = false;

// A / B or A * B
// 乘數、除數
$aMax = 10;
$aMin = 1;

// 被乘數、被除數
$bMax = 10;
$bMin = 1;

$dataCount = 52;

// A 卷
$dataSet = [];
$dataSetAnswer = [];

// B 券
$dataSet2 = [];
$dataSet2Answer = [];

while ($dataCount > 0) {
  $a = rand($aMin, $aMax);
  $b = rand($bMin, $bMax);
  $c = $a * $b;

  echo "{$a} x {$b} = " . ($displayAnswer ? $c : '') . " \t\t";
  echo "{$c} ÷ {$b} = " . ($displayAnswer ? $a : '') . " \t\t";
  echo "{$c} ÷ {$a} = " . ($displayAnswer ? $b : '') . PHP_EOL;

  // A 卷
  $dataSet[] = "{$c} ÷ {$b} =";
  $dataSetAnswer[] = "{$c} ÷ {$b} = $a";

  // B 券
  $dataSet2[] = "{$c} ÷ {$a} =";
  $dataSet2Answer[] = "{$c} ÷ {$a} = $b";

  $dataCount--;
}

// 因為只有顯示英數、故採用預設字體即可
$mpdf = new \Mpdf\Mpdf([
  'default_font_size' => '12'
]);

// A 卷
$mpdf->AddPage();
$mpdf->SetFontSize(15);
$mpdf->WriteCell(45, 10, "Workbook A", 0, 0, 'L', false);
$mpdf->Ln();

$i = 0;
foreach ($dataSet as $val) {
  $i++;
  $mpdf->WriteCell(45, 19, $val, 0, 0, 'L', false);

  if ($i % 4 == 0) {
    $mpdf->Ln();
  }
}

// A 卷 - 答案券
$mpdf->AddPage();
$mpdf->SetFontSize(15);
$mpdf->WriteCell(45, 10, "Workbook A - Answer", 0, 0, 'L', false);
$mpdf->Ln();

$i = 0;
foreach ($dataSetAnswer as $val) {
  $i++;
  $mpdf->WriteCell(45, 19, $val, 0, 0, 'L', false);

  if ($i % 4 == 0) {
    $mpdf->Ln();
  }
}

// B 卷
$mpdf->AddPage();
$mpdf->SetFontSize(15);
$mpdf->WriteCell(45, 10, "Workbook B", 0, 0, 'L', false);
$mpdf->Ln();

$i = 0;
foreach ($dataSet2 as $val) {
  $i++;
  $mpdf->WriteCell(45, 19, $val, 0, 0, 'L', false);

  if ($i % 4 == 0) {
    $mpdf->Ln();
  }
}

// B 卷 - 答案券
$mpdf->AddPage();
$mpdf->SetFontSize(15);
$mpdf->WriteCell(45, 10, "Workbook B - Answer", 0, 0, 'L', false);
$mpdf->Ln();

$i = 0;
foreach ($dataSet2Answer as $val) {
  $i++;
  $mpdf->WriteCell(45, 19, $val, 0, 0, 'L', false);

  if ($i % 4 == 0) {
    $mpdf->Ln();
  }
}

$mpdf->Output('workbook.pdf', \Mpdf\Output\Destination::FILE);


?>
