<?php

function increaseEnthusiasm($inStr){
    return $inStr . '!';
}

echo increaseEnthusiasm('abc');

function repeatThreeTimes($inStr){
    return str_repeat($inStr,3);
}
echo "\n";
echo repeatThreeTimes('abc');
echo "\n";

echo increaseEnthusiasm(repeatThreeTimes('abc'));

function cut($inStr, $n = 10){
    return substr($inStr, 0, $n);
}

function printNumbers($numbers)
{
    if (strlen($numbers) > 0) {
        printNumbers(substr($numbers, 0,-1));
        echo substr($numbers, -1);
    }
}
function getNumber($inNumber){
    $sumDigits = array_sum(str_split($inNumber));
    if ($sumDigits>9){
        return getNumber($sumDigits);
    }
    return $sumDigits;
}

?>