<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $pdo = new PDO('mysql:host=mysql220.phy.lolipop.lan;dbname=LAA1516900-final; charset=utf8', 'LAA1516900', 'Pass0827');
        
        // チェックボックスで選択された店舗データの shop_id を取得
        $selectedShops = isset($_POST['selected_shops']) ? $_POST['selected_shops'] : [];

        // チェックボックスで選択された各店舗に対して削除処理を行う
        foreach ($selectedShops as $shopId) {
            $sql = $pdo->prepare('DELETE FROM shops WHERE id = :id');
            $sql->bindParam(':id', $shopId, PDO::PARAM_INT);
            $sql->execute();
        }

        // データが正常に削除されたらメニューページにリダイレクト
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
    <title>お店削除</title>
</head>
<body>
    <h2>お店を削除</h2>
    <form method="post" action="delete.php">
        <!-- チェックボックスで選択された店舗データを削除 -->
        <?php
        $pdo = new PDO('mysql:host=mysql220.phy.lolipop.lan;dbname=LAA1516900-final; charset=utf8', 'LAA1516900', 'Pass0827');
        $stmt = $pdo->query('SELECT id, name FROM shops');
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<label>';
            echo '<input type="checkbox" name="selected_shops[]" value="' . $row['id'] . '">';
            echo $row['name'];
            echo '</label><br>';
        }
        ?>
        <br>
        <input type="submit" value="削除">
    </form>
</body>
</html>
