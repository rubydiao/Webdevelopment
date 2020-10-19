<?php include "connect.php" ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table,td,th{
            border : 1px solid black;
        }
        
    </style>
</head>

<body>
    <?php
    $stmt = $pdo->prepare("SELECT student.std_name FROM `register` join course JOIN student WHERE course.course_id = register.course_id AND register.std_id = student.std_id AND title LIKE ?");
    $stmt->bindParam(1,$_GET['sub']);
    $stmt->execute();
    $row = $stmt->fetch();
    ?>
    <table>
        <tr>
            <th>ชื่อคนลงทะเบียน</th>
        </tr>
        <?php
        while($row = $stmt->fetch()){
            ?>
            <tr>
                <td><?=$row['std_name'];?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>