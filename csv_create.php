<?php
// var_dump($_POST);
// exit();

$emotions = $_POST['emotions'];
// var_dump($emotions);
// exit();
// $quantity = $_POST['quantity'];
// $stocks = $_POST['stocks'];


// $write_data = "{$deadline} {$text} \n";
$write_data = "{$title} \n";

$file = fopen(`data/$emotions.csv`, `a`);

flock($file, LOCK_EX);

fwrite($file,$write_data);

flock($file, LOCK_UN);

fclose($file);

header("Location:input.php");


exit();

?>