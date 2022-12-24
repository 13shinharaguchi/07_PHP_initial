<?php 
// 数の比例
function compareNumbers($a, $b){
if ($a > $b) return $a;
if ($b > $a) return $b;
return "eq";
}

var_dump(compareNumbers(2,5));
var_dump(compareNumbers(5,2));
var_dump(compareNumbers(5,5));


?>