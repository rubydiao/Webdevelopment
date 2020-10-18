<?php session_start(); ?>
<html>
<body>
<h1>สวัสดี<?=$_SESSION["fullname"]?></h1>
รายละเอียดออเดอร์ <a href='product-list.php'>คลิก</a><br>
หากต้องการออกจากระบบโปรดคลิก <a href='logout.php'>ออกจากระบบ</a>
</body>
</html>