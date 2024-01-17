<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $pdo = new PDO('mysql:host=mysql220.phy.lolipop.lan;dbname=LAA1516900-final; charset=utf8', 'LAA1516900', 'Pass0827');

        // フォームから受け取ったデータを変数に格納
        $id = $_POST['id'];
        $name = $_POST['name'];
        $place = $_POST['place'];

        // データベースの更新処理
        $sql = $pdo->prepare('UPDATE shops SET name = :name, place = :place WHERE id = :id');

        // パラメータをバインド
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->bindParam(':name', $name, PDO::PARAM_STR);
        $sql->bindParam(':place', $place, PDO::PARAM_STR);

        // クエリの実行
        $sql->execute();

        // データベースの接続を閉じる
        $pdo = null;

        // データが正常に更新されたらメニューページにリダイレクト
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
    <title>お店情報更新</title>
</head>
<body>
    <h2>お店情報を更新</h2>
    <form method="post" action="update.php">
        <!-- 入力フォーム -->
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br>
        <label for="name">店舗名:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="place">所在地:</label>
        <input type="text" id="place" name="place" required><br>
        <input type="submit" value="更新">
    </form>
</body>
</html>

