<?php
$text = $_POST["text"];
$pattern = "/[^a-zA-Z]+/";
$words = preg_split($pattern, $text, -1, PREG_SPLIT_NO_EMPTY);

$counts = [];
foreach ($words as $word) {
    $first = strtolower($word[0]);
    $counts[$first] = ($counts[$first] ?? 0) + 1;
}

ksort($counts);
echo "<h3>Word counter by first letter (English only):</h3>";
foreach ($counts as $letter => $count) {
    echo $letter . " - ". $count. "<br>\n";
}
?>
