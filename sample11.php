<DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>WEB開発8回目</title>
</head>
<body>
    <form action="sample11.php" method="post" enctype="multipart/form-data">
        <Label for="file">写真：</Label>
        <input id="file" type="file" name="file">
        <input type="submit" value="送信">
    </form>
    <?php
        if (isset($_FILES['file'])){
            $file =$_FILES['file'];
            print('ファイル名：'.$file['name']."<br>");
            echo 'ファイルタイプ：'.$file['type']."<br>";
            echo 'ファイルサイズ：'.$file['size']."<br>";
            print('ファイル場所:'.$file['tmp_name']. "<br>");
            $file_path = './files/'. $file['name'];
            move_uploaded_file($file['tmp_name'], $file_path);
            print("<img src='".$file_path."'>");
        }
    ?>

</body>
</html>