<?php

$a = 10;
$b = 3;
$mod = $a % $b;

if ($mod == 0){
    $res = $a / $b;
    echo "Делится, результат $res";
}
else{
    echo "Делится с остатком, остаток $mod";
}

$st = pow(2,10);

$num1 = sqrt(245);

$numbers1 = [4, 2, 5, 19, 13, 0, 10];
$totalSum = 0;
foreach ($numbers1 as $number){
    $totalSum += $number**2;
}
$res = sqrt($totalSum);

$num2 = sqrt(379);
echo round($num2);
echo "\n";
echo round($num2, 1);
echo "\n";
echo round($num2, 2);
echo "\n";

$num3 = sqrt(587);
$numbers2 = [
    'floor' => floor($num3),
    'ceil' => ceil($num3)
];

$numbers3 = [4, -2, 5, 19, -130, 0, 10];
$minNumber = min($numbers3);
$maxNumber = max($numbers3);

echo rand(1, 100);

$randomNumbers = [];
for ($i = 0; $i < 10; $i++){
    $randomNumbers[] = rand(1, 100);
}

$a1 = 56;
$a2 = 123;
echo "\n";
echo abs($a1 - $a2);

$someNumbers = [1, 2, -1, -2, 3, -3];
$positiveNumbers = [];
foreach ($someNumbers as $number){
    $positiveNumbers[] = abs($number);
}

$num4 = 30;
$dividers = [];
for ($i = 1; $i <= ceil(sqrt($num4)); $i++){
    if ($num4%$i == 0){
        if ($i != $num4 / $i) {
            array_push($dividers, $i, $num4 / $i);
        }
        else{
            $dividers[] = $i;
        }
    }
}
sort($dividers);

$numbers4 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$totalSum = 0;
$res = 0;
while (true){
    if ($totalSum+$numbers4[$res]<=10) {
        $totalSum += $numbers4[$res];
        $res ++;
    }
    else{
        break;
    }
}

?>