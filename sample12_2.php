<DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>WEB開発8回目</title>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['session'])){
            echo 'セットされたsession: '.$_SESSION['session'];
        }
        else {
            echo 'sessionがセットされていません';
        }
    ?>

</body>
</html>