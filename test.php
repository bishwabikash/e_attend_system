<?php
$i = 0;
$test = "0,0,0,0";
echo($test);
$testarr = explode(',', $test);
print_r($testarr);
$testarr[$i] = $testarr[$i] + 1;
print_r($testarr);
$test1 = implode(",", $testarr);
echo($test1);