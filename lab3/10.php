<?php

function isSumTwoNumbersMore10($a, $b){
    if ($a+$b>10){
        return true;
    }
    else{
        return false;
    }
}

function isNumbersEqual($a, $b){
    if ($a==$b){
        return true;
    }
    else{
        return false;
    }
}

$test = 5;
echo ($test == 0) ? 'верно' : '';
echo "\n";

$age = 37;
if ($age < 10 or $age > 99){
    echo 'Число меньше 10 или больше 99';
}
else{
    $sumDigits = $age%10 + intval($age / 10)%10;
    if ($sumDigits<=9){
        echo 'Сумма цифр однозначна';
    }
    else{
        echo 'Сумма цифр двузначна';
    }
}
echo "\n";

$arr = [463, 4, 46, 49];
if (count($arr)==3){
    echo $arr[0]+$arr[1]+$arr[2];
}

?>