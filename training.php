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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>ここに変化を</div>
</body>
</html>