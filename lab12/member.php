<?php
$keyword = $_GET["keyword"];
$conn = mysqli_connect("localhost", "root", "");
    if ($conn) {
        mysqli_select_db($conn,"blueshop");
        mysqli_query($conn,"SET NAMES utf8");
    } 
    else {
    }
    $sql = "SELECT * FROM member WHERE name LIKE '%$keyword%'";
    $objQuery = mysqli_query($conn,$sql);
?>
<table> 
<tr>
<th>username</th>
<th>ชื่อ</th>
<th>ที่อยู่</th>
<th>หมายเลขโทรศัพท์</th>
</tr>
<?php while($row = mysqli_fetch_array($objQuery)):?>
<tr>
<td><?php echo $row["username"]?></td>
<td><?php echo $row["name"]?></td>
<td><?php echo $row["address"]?></td>
<td><?php echo $row["mobile"]?></td>
</tr>
<?php endwhile;?>
</table>