<?php

//変数の準備
$str = '';

$file = fopen(`data/$emotions.csv`, `r`);

flock($file,LOCK_EX);


if($file){
  while($line = fgets($file)){
    $str .= "<tr><td>{$line}</td></tr>";
  }


}


// $title = fgets($file);
// var_dump($title);
// exit();


// ロックを解除する
flock($file, LOCK_UN);
// ファイルを閉じる
fclose($file);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <title>textファイル書き込み型todoリスト（一覧画面）</title>
</head>

<body>
  <fieldset>
    <a href="input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>todo</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th><?= $str ?></th>
        </tr>
      </tbody>
    </table>
  </fieldset>
    <script>
  </script>
</body>

</html>