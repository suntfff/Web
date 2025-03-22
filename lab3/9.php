<?php

$arr1 = ['x', 'xx', 'xxx'];

function arrayFill($elem, $n){
    return array_fill(0, $n, $elem);
}


$arr2 = [[1, 2, 3], [4, 5], [6]];
$totalSum = 0;
for ($i=0; $i<count($arr2); $i++){
    for ($j=0; $j<count($arr2[$i]); $j++){
        $totalSum += $arr2[$i][$j];
    }
}

$arr3 = [];
for ($i=0; $i<3; $i++){
    $arr3[] = [];
    for ($j=0; $j<3; $j++){
        $arr3[$i][$j] = $i*3 + $j + 1;
    }
}

$arr4 = [2, 5, 3, 9];
$result = $arr4[0]*$arr4[1] + $arr4[2]*$arr4[3];
echo $result;

$user = [
    'name' => 'Ivan',
    'surname' => 'Ivanov',
    'patronymic' => 'Ivanovich',
    'age' => 11
];
echo "\n".$user['surname']." ".$user['name']." ".$user['patronymic']." ".$user['age'];

$date = [
    'year' => '2025',
    'month' => '03',
    'day' => '22'
];
echo "\n".$date['year']."-".$user['month']."-".$user['day'];

$arr = ['a', 'b', 'c', 'd', 'e'];
echo "\n";
echo count($arr);
echo "\n";
echo end($arr);
echo "\n";
echo prev($arr);

?>

