<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課題4</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
        <?php
            //db接続
            try {
                $pdo = new PDO('mysql:dbname=blog;host=localhost;port=8889;charset=utf8', 'root', 'root');
            } catch (PDOException $e) {
                echo 'DB接続エラー: ' . $e->getMessage();
                exit; 
            }
            try {
                //データを取得
                $records  = $pdo->query('SELECT * FROM tags'); 

            } catch (PDOException $e) {
                echo 'クエリエラー: ' . $e->getMessage();
            }
        ?>
            <form action="kadai4-index.php" method="post">
                <p>タイトル</p>
                <input id="name" type="text" name="name">
                <p>タグ</p>
                <select name="tag" id="tag">
                <option value="">--タグを選択してください--</option>
                <?php foreach ($records as $tag):?>
                <option value="<?php echo $tag['tagid']?>"><?php echo $tag['tagname']?></option>
                <?php endforeach ?>
                </select>
                <p>内容</p>
                <textarea id="content" name="content"></textarea>
                <p></p>
                <input type="submit" value="投稿する">
            </form>       

</body>
</html>
