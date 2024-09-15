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
            if (isset($_GET['id'])){
                if (gettype($_GET['id'])!=='string'){
                    $id = implode($_GET['id']);
                }
                else {
                    $id = $_GET['id'];
                }
            try {
                //データを取得
                $posts  = $pdo->query("SELECT * FROM posts INNER JOIN tags ON posts.tag_id=tags.tagid WHERE id='{$id}'"); 

            } catch (PDOException $e) {
                echo 'クエリエラー: ' . $e->getMessage();
            }
        }
            try {
                //データを取得
                $tags  = $pdo->query('SELECT * FROM tags'); 

            } catch (PDOException $e) {
                echo 'クエリエラー: ' . $e->getMessage();
            }
        ?>
        <?php foreach ($posts as $post):?>
            <p>
            <h2><?php echo $post['name'] ?></h2>
            <br>
            タグ：<a href='./kadai4-post.php'><?php echo $post['tagname'] ?></a>
            <br>
            <a href='./kadai4-update.php?id%5B%5D=<?php echo $post['id'] ?>'>変更</a>
            <a href='./kadai4-delete.php?id%5B%5D=<?php echo $post['id'] ?>'>削除</a>
            <br>
            <label> 作成日：<?php echo $post['created_at'] ?></label>
            <label> 更新日：<?php echo $post['updated_at'] ?></label>
            </p>
            <p><?php echo $post['content'] ?></p>
        <?php endforeach ?>
</body>
</html>
