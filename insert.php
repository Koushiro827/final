<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $pdo = new PDO('mysql:host=mysql220.phy.lolipop.lan;dbname=LAA1516900-final; charset=utf8','LAA1516900','Pass0827');
        
        // フォームから受け取ったデータを変数に格納
        $id = $_POST['id'];
        $name = $_POST['name'];
        $place = $_POST['place'];

        // プレースホルダを使用したクエリ
        $sql = $pdo->prepare('INSERT INTO shops (id, name, place) VALUES (:id, :name, :place)');
        
        // パラメータをバインド
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->bindParam(':name', $name, PDO::PARAM_STR);
        $sql->bindParam(':place', $place, PDO::PARAM_STR);

        // クエリの実行
        $sql->execute();

        // データベースの接続を閉じる
        $pdo = null;

        // データが正常に追加されたらメニューページにリダイレクト
        header("Location: menu.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新しいお店追加</title>
</head>
<body>
    <h2>新しいお店を追加</h2>
    <form method="post" action="insert.php">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br>
        <label for="name">店舗名:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="place">所在地:</label>
        <input type="text" id="place" name="place" required><br>
        <input type="submit" value="追加">
    </form>
</body>
</html>
