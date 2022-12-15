<?php
// var_dump($_POST);
// exit();

$title = $_POST['title'];
// $quantity = $_POST['quantity'];
// $stocks = $_POST['stocks'];


// $write_data = "{$deadline} {$text} \n";
$write_data = "{$title} \n";

$file = fopen('data/todo.csv', 'a');

flock($file, LOCK_EX);

fwrite($file,$write_data);

flock($file, LOCK_UN);

fclose($file);

header("Location:input.php");


exit();

?>