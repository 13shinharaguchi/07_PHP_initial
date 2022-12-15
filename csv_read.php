<?php

//変数の準備
$str = '';

$file = fopen("data/todo.csv","r");

flock($file,LOCK_EX);


// if($file){
//   while($line = fgets($file)){
//     $str .= "<tr><td>{$line}</td></tr>";
//   }


// }

$title = fgets($file);
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

    <h1 id="top">Qiitaの記事を検索</h1>
    <div id="output"></div>
    <script type="module">
    $(function () {
        //ページ数と何個引っ張って来るかを設定する変数
        const page = 1
        const quantity = 1
        const search = <?= $title?>

        console.log(search)
        $.ajaxSetup({
            //Bearer の横にAPIkeyを下記のように張り付ける
            // Headers: { Authorization: "Bearer xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" }
            Headers: { Authorization: "Bearer " }
            
        });
        $.getJSON(`https://qiita.com/api/v2/items?page=${page}&per_page=${quantity}&query=title:${search}`, function (data) {

            //ifで検索結果がどうであったかを判断する
            if (data.length === 0) {
                //結果がない場合は検索なしを表示する
                $('#top').html("検索なし")
            } else {
                //結果表示する
                //入れる箱を準備
                let qiita_box = [];
                //レスポンス（data）が配列なのでfor文で中身の回数繰り返しする
                for (var i = 0; i < data.length; i++) {
                    let title = data[i].title
                    let url = data[i].url
                    let like = data[i].likes_count
                    let stock = data[i].stocks_count
                    let tags_array = data[i].tags
                    let tags = [];

                    //タグが配列に入っているから取り出すために、for文で取得する
                    for (var r = 0; r < tags_array.length; r++) {
                        tags.push(tags_array[r].name)
                    }

                    console.log(tags)

                    qiita_box.push(
                     `
                    <div class="qiita_wrapper">
                    <p><a href="${url}" target="_blank" rel="noopener noreferrer">${title}</a></p>
                    <div>タグ:${tags}</div>
                    <div>
                    <p>いいね数${like}</p>
                    <p>ストック数${stock}</p>
                    </div>
                    </div> 
                    `
                    )
                    $('#output').html(qiita_box)

                    //いいねが10以上はfirebaseに保存する
                    // firebaseのtitleはstring,URLはstring,timeはtimestamp
                    if (like > 10) {
                        const postData = {
                            title: title,
                            url: url,
                            time: time,
                        };
                        //firebaseについかする

                        // addDoc(collection(db, "自分のfirebaseのコレクションに切り替える"), postData);
                        addDoc(collection(db, "qiita_save"), postData);
                    }
                }
            }
        })
    })
  </script>
</body>

</html>