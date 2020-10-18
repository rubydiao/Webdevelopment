<?php include "connect.php"; ?>
<html>
<head><meta charset="utf-8">
<style>
    table,th,td{
        border:1px solid black;
        border-radius: 1px;
    }
</style>
</head>
<body>
<?php
$stmt = $pdo->prepare("SELECT * FROM product");
$stmt->execute();
?>
<table>
<tr>
    <th>รหัสสินค้า</th>
    <th>ชื่อสินค้า</th>
    <th>รายละเอียดสินค้า</th>
    <th>ราคา</th>
</tr>
<?php
while ($row = $stmt->fetch()) {
    ?>
    <tr>
    <td><?php echo $row["pid"];?></td>
    <td><?php echo $row["pname"];?></td>
    <td><?php echo $row["pdetail"];?></td>
    <td><?php echo $row["price"];?></td>
    </tr>
    <?php
}
?>
</table>
</body>
</html>

