<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8"/>
        <meta name="title" content="web開発5回目"/>
    </head>
    <body>
    <?php
        $array = [
            'apple' => 'りんご',
            'lemon' => 'レモン',
            'grape' => 'ぶどう',
            'tomato' => 'トマト'
        ];
        foreach ($array as $key => $value) {
            print('英語 : '. $key. "<br>");
            print('日本語 : '. $value. "<br>");
        }
    ?>
    </body>
</html>