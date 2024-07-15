<DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>WEB開発8回目</title>
</head>
<body>
    <form action="ouyou3.php" method="post">
        身長
        <input id="name" type="text" name="height">
        体重
        <input id="name" type="text" name="weight">
        <input type="submit" value="送信">
    </form>
    <?php
        if (isset($_POST['height']) && isset($_POST['weight'])){
            $height = htmlspecialchars($_POST['height']) / 100;
            $weight = htmlspecialchars($_POST['weight']);
            $good_weight = $height * $height * 22;
            echo '理想の体重: '.$good_weight."<br>";
            if ($weight == $good_weight){
                echo 'あなたの体重は適正体重です。';
            }
            else{
                echo '後'.$good_weight-$weight.'キロで適正体重です。';
            }
        }
    ?>

</body>
</html>