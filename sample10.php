<DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>WEB開発7回目</title>
</head>
<body>
    <form action="sample9.php" menthod="post">
        <input id="name" type="text" name="name">
        <input type="submit" value="送信">
    </form>
    <?php
        if(isset($_GET['name'])){
            $value = htmlspecialchars($_GET['name']);
            echo $value;
        }
    ?>
</body>
</html>