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
                $tags  = $pdo->query('SELECT * FROM tags'); 

            } catch (PDOException $e) {
                echo 'クエリエラー: ' . $e->getMessage();
            }
            if (isset($_GET['tagid'])){
                if (gettype($_GET['tagid'])!=='string'){
                    $id = implode($_GET['tagid']);
                }
                else {
                    $id = $_GET['tagid'];
                }
                try {
                    //データを取得
                    $posts  = $pdo->query("SELECT * FROM posts INNER JOIN tags ON posts.tag_id=tags.tagid WHERE tagid='{$id}'"); 

                } catch (PDOException $e) {
                    echo 'クエリエラー: ' . $e->getMessage();
                }
            }
        ?>
        <form action="kadai4-searchtag.php" method="get">
                <p>タグで検索</p>
                <select name="tagid" id="tagid">
                <option value="">--タグを選択してください--</option>
                <?php foreach ($tags as $tag):?>
                <option value="<?php echo $tag['tagid']?>"><?php echo $tag['tagname']?></option>
                <?php endforeach ?>
                <p></p>
                <input type="submit" value="検索">
            </form>  
        <?php foreach ($posts as $post):?>
            <p>
            <a href='./kadai4-post.php?id%5B%5D=<?php echo $post['id'] ?>' style="font-size:22px;"><?php echo $post['name'] ?></a>
            <br>
            タグ：<a href='./kadai4-searchtag.php?tagid%5B%5D=<?php echo $post['tagid']?>'><?php echo $post['tagname'] ?></a>
            <label> 作成日時：<?php echo $post['created_at'] ?></label>
            </p>
        <?php endforeach ?>
</body>
</html>
