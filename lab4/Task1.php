<?php
$str = "mermtmvbmdfmmmm";
$pattern = '/m..m/ui';
preg_match_all($pattern, $str, $matches);
var_dump($matches)
?>
