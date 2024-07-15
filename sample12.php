<DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>WEB開発8回目</title>
</head>
<body>
    <form action="sample12.php" method="post">
        セットするsession:
        <input id="session" type="text" name="session">
        <input type="submit" value="セット">
    </form>
    <?php
        if(isset($_POST['session'])){
            session_start();
            $_SESSION['session'] = $_POST['session'];
            echo 'sessionがセットされました';
        }
    ?>

</body>
</html>