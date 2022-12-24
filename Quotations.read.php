<?php


$emotions = $_POST['emotions'];


//取得したエモーションを変数に格納する
//配列を文字化する
$hit_emo = implode($emotions);

//まとめる変数の用意
$hit_quotaion = [];


//選択されたファイルを開く
$hit_file = fopen("data/{$hit_emo}.csv", "r");


flock($hit_file,LOCK_EX);

//配列にファイルから取得したデータを１行１行書き込む
//
while($hit_file_array = fgets($hit_file)){
    array_push($hit_quotaion,$hit_file_array);

}

$select_rand = array_rand($hit_quotaion,1);


$select_hit_quotaion = $hit_quotaion[$select_rand];

// ロックを解除する
flock($hit_file, LOCK_UN);
// ファイルを閉じる
fclose($hit_file);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>
<body>
   <div class="hit_quotaion"><?= $select_hit_quotaion ?></div> 
</body>
</html>