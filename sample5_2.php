<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8"/>
        <meta name="title" content="web開発4回目"/>
    </head>
    <body>
    <?php
        for ($i=100; $i>=1; $i-=1){
            if ($i % 2 == 0){
                print("$i<br>");
            }
        }
    ?>
    </body>
</html>