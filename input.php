<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
  <form action="csv_create.php" method="POST">
    <fieldset>
      <legend>qiitaの検索したいこと</legend>
      <a href="csv_read.php">一覧画面</a>
      <div>
        タイトル: <input type="text" name="title">
      </div>
      <div>
        個数: <input type="number" name="quantity">
      </div>
            <div>
        ストック数: <input type="number" name="stocks">
      </div>
      <div>
       <button>検索</button>
      </div>
    </fieldset>
  </form>
  <script>
  </script>
</body>
</html>