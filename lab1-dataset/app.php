<?php
$displayAnswer = false;

// A / B or A * B
// 乘數、除數
$aMax = 10;
$aMin = 1;

// 被乘數、被除數
$bMax = 10;
$bMin = 1;

$dataCount = 50;

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

  echo "{$a} x {$b} = ". ($displayAnswer ? $c : '') ." \t\t" ;
  echo "{$c} ÷ {$b} = ". ($displayAnswer ? $a : '') ." \t\t" ;
  echo "{$c} ÷ {$a} = ". ($displayAnswer ? $b : '') .PHP_EOL;

  // A 卷
  $dataSet[] = "{$c} ÷ {$b}";
  $dataSetAnswer[] = "{$c} ÷ {$b} = $a";

  // B 券
  $dataSet2[] = "{$c} ÷ {$a}";
  $dataSet2Answer[] = "{$c} ÷ {$a} = $b";

  $dataCount--;
}
?>
