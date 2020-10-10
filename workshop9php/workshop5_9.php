<?php include "connect.php"; ?>
<html>
<head><meta charset="utf-8">
</head>
<body>
<?php
$stmt = $pdo->prepare("SELECT * FROM member");
$stmt->execute();
while ($row = $stmt->fetch()) {
    ?>
    <a href="workshop5_9_2.php?username=<?=$row["username"];?>">
    <img src='member_photo/<?=$row["username"]?>.jpg' width='100'><br>
    <hr></a>
    <?php
}
?>
</body>
</html>