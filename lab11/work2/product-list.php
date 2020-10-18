<?php
include "connect.php";
session_start();
if (empty($_SESSION["username"])) {
    header("location: login-form.php");
}
?>
<html>

<head>
    <meta charset="utf-8">
    <style>
        table,th,td{
            border:1px solid #000;
        }
    </style>
</head>

<body>
    <?php
    $stmt = $pdo->prepare("SELECT product.pname,item.quantity,orders.ord_id,product.price FROM `orders` JOIN product,item WHERE orders.ord_id=item.ord_id AND item.pid=product.pid AND orders.username=?");
    $stmt->bindParam(1,$_SESSION['username']);
    $stmt->execute();
    ?>
    <table>
        <tr>
            <th>เลขที่order</th>
            <th>ชื่อสินค้า</th>
            <th>ราคา</th>
        </tr>
    <?php
    while ($row = $stmt->fetch()) {
        ?>
        <tr>
        <td><?=$row['ord_id']; ?></td> 
        <td><?=$row['pname']; ?></td> 
        <td><?=$row['price']; ?></td> 
        </tr>
        <?php
    }
    ?>
    </table>
    <a href="./user-home.php">กลับสู่หน้าหลัก</a>
</body>

</html>