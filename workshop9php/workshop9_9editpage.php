<?php include "connect.php" ?>
<?php
$stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
$stmt->bindParam(1, $_GET["username"]); 
$stmt->execute(); 
$row = $stmt->fetch(); 
?>
<html>
<head><meta charset="utf-8"></head>
<body>
<form action="editwork9.php" method="post">
username:<input type="text" name="username" value="<?=$row["username"]?>" disabled><br>
password: <input type="password" name="password" id="" value="<?=$row["password"]?>"><br>
name: <input type="text" name="name" value="<?=$row["name"]?>" ><br>
ที่อยู่: <br>
<input type="text" name="address" id="" value="<?=$row["address"]?>"><br>
tel: <input type="text" name="tel"  value="<?=$row["mobile"]?>"><br>
email: <input type="email" name="email" id=""  value="<?=$row["email"]?>"><br><br>
<input type="submit" value="แก้ไข">
</form>
</body>
</html>