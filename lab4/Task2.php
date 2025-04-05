<?php
$str = 'a1b2c3';
$pattern = ['/1/', '/2/', '/3/'];
$replacement = ['101', '102', '103'];
$res = preg_replace($pattern, $replacement, $str);
echo $res;
?>
