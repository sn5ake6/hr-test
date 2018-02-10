<?php
$handle = fopen ("php://stdin", "r");
$input = fgets($handle);
list($number_1, $number_2) = explode(" ", $input);
$number_1 = str_split($number_1);
$number_2 = str_split($number_2);
$add_one = 0;
$result = [];
while (count($number_1) + count($number_2) > 0){
    $digit_1 = array_pop($number_1) ?? 0;
    $digit_2 = array_pop($number_2) ?? 0;
    $summa = $digit_1 + $digit_2 + $add_one;
    $add_one = 0;
    if ($summa >= 10) {
        $summa -= 10;
        $add_one = 1;
    }
    $result[] = $summa;
}
if ($add_one == 1) $result[] = $add_one;
$result = implode(array_reverse($result));
echo $result;
