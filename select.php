<?php
try {
    $pdo = new PDO('mysql:host=mysql220.phy.lolipop.lan;dbname=LAA1516900-final; charset=utf8','LAA1516900','Pass0827');
    // データの取得と一覧表示
    $stmt = $pdo->query('SELECT * FROM shops');

    echo "<h2>お店一覧</h2>";
    while ($row = $stmt->fetch()) {
        echo "" . $row["id"] . " : " . $row["name"] . " : " . $row["place"] . "<br>";
        // 他の表示項目も追加することができます
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お店一覧</title>
</head>
<body>
    <!-- データの一覧表示 -->
</body>
</html>
