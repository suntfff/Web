<?php

function sumNumbersArr($numbers){
    if (count($numbers) == 0) {
        return 0;
    }
    return $numbers[0] + sumNumbersArr(array_slice($numbers, 1));
}
$numbers = [53, 345, 346, 436, 46, 46];
$medium = sumNumbersArr($numbers) / count($numbers);

function sumNumbers($startNumber, $endNumber){
    if ($startNumber>$endNumber){
        return 0;
    }
    return $endNumber + sumNumbers($startNumber, $endNumber - 1);
}
$sumNumbers1to100 = sumNumbers(1, 100);

function sqrtNumbers($numbers){
    if (count($numbers) == 0) {
        return 0;
    }
    return sqrt($numbers[0]) + sqrtNumbers(array_slice($numbers, 1));
}

function alphabetArray($start, $end, &$alphabetArray) {
    if ($start <= $end) {
        $key = chr($start + 96);
        $alphabetArray[$key] = $start;
        alphabetArray($start + 1, $end, $alphabetArray);
    }
}
$alphabetArray = [];
alphabetArray(1, 26, $alphabetArray);

$numbersStr = '1234567890';
function sumPairsNumbers($numbers){
    if (strlen($numbers) == 0) {
        return 0;
    }
    if (strlen($numbers) == 1) {
        return intval($numbers[0]);
    }
    $pairSum = intval($numbers[0]) + intval($numbers[1]);
    return $pairSum + sumPairsNumbers(substr($numbers, 2));
}

?>