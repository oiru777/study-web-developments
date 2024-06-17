<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8"/>
        <meta name="title" content="web開発5回目"/>
    </head>
    <body>
    <?php
        $start = strtotime('today');
        $end = strtotime('+1 year', $start);

        for ($date = $start; $date <= $end; $date = strtotime('+1 day', $date))
        {
            print(date('n/j,(D) ',$date));
        }
    ?>
    </body>
</html>