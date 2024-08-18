<DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>WEB開発回目</title>
</head>
<body>
    <div>
        <?php
            //db接続
            try {
                $pdo = new PDO('mysql:dbname=mydb;host=localhost;port=8889;charset=utf8', 'root', 'root');
            } catch (PDOException $e) {
                echo 'DB接続エラー: ' . $e->getMessage();
                exit; 
            }

            //新しいデータを挿入
            try {
                $records  = $pdo->query('INSERT INTO items(id, name) VALUES(2,"商品2")'); 

                foreach ($records as $record) {
                    echo "id:{$record['id']} name:{$record['name']}". '<br>';
                }
            } catch (PDOException $e) {
                echo 'クエリエラー: ' . $e->getMessage();
            }

            //mydbの中身を表示
            try {
                $records  = $pdo->query('SELECT * FROM items');
                foreach ($records as $record) {
                    echo "id:{$record['id']} name:{$record['name']}". '<br>';
                }
            } catch (PDOException $e) {
                echo 'エラー: ' . $e->getMessage();
            }
        ?>
    </div>
</body>
</html>