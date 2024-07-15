<DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>WEB開発8回目</title>
</head>
<body>
    <form action="sample9.php" method="post">
        名前
        <input id="name" type="text" name="name">
        <input type="submit" value="送信">
    </form>
    <?php
        if(isset($_POST['name'])){
            $value = $_POST['name'];
            echo $value;
        }
    ?>
</body>
</html>