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
            $msg = '';
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
                $records  = $pdo->query('SELECT * FROM tags'); 

            } catch (PDOException $e) {
                echo 'クエリエラー: ' . $e->getMessage();
            }
            if (isset($_POST['password'])){
                if ($_POST['password']==='password'){
                    try {
                        //データを取得
                        $date_time = new DateTime(); 
                        $date_time_disp = $date_time->format("Y-m-d H:i");
                        $posts  = $pdo->query("UPDATE posts SET name='{$_POST['name']}',content='{$_POST['content']}',updated_at='{$date_time_disp}',tag_id='{$_POST['tag']}'  WHERE id='{$_POST['id']}'"); 
                        $msg='更新しました';
    
                    } catch (PDOException $e) {
                        echo 'クエリエラー: ' . $e->getMessage();
                    }
                } else {
                    $msg='パスワードが間違っています';
                }
            }
        ?>  
            <?php if ($msg==''):?>
            <?php foreach ($posts as $post) ?>
            <form action="kadai4-update.php" method="post">
                <input type='hidden' name='id' value='<?php echo $id ?>'>
                <p>タイトル</p>
                <input id="name" type="text" name="name" value="<?php echo $post['name'] ?>">
                <p>タグ</p>
                <select name="tag" id="tag">
                <option value="">--タグを選択してください--</option>
                <?php foreach ($records as $tag):?>
                <?php if ($post['tag_id']===$tag['tagid']): ?>
                    <option value="<?php echo $tag['tagid']?>" selected><?php echo $tag['tagname']?></option>
                <?php else : ?>
                    <option value="<?php echo $tag['tagid']?>"><?php echo $tag['tagname']?></option>
                <?php endif ?>
                <?php endforeach ?>
                </select>
                <p>内容</p>
                <textarea id="content" name="content" ><?php echo $post['content'] ?></textarea>
                <p></p>
                <p>パスワード</p>
                <input id="password" type="password" name="password">
                <p></p>
                <input type="submit" value="変更する">
            </form>
            <?php endif ?>      
            <p><?php echo $msg; ?></p>

</body>
</html>
