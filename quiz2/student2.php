<?php include "connect.php" ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>student2</title>
    <style>
        table,td,th{
            border : 1px solid black;
        }
    </style>
</head>
<body>
    <?php
        $stmt = $pdo->prepare("SELECT course.course_id,title,student.std_name FROM `register` join course JOIN student WHERE course.course_id=register.course_id AND register.std_id = student.std_id AND title LIKE  '%WEB TECHNOLOGY%' ");
        $stmt->execute();
        ?>
        <h1>วิชา WEB TECHNOLOGY	</h1>
        <table>
            <tr>
                <th>รหัสวิชา</th>
                <th>ชื่อวิชา</th>
                <th>รายชื่อคนลงทะเบียน</th>
            </tr>
            <?php
        while($row = $stmt->fetch()){
            ?>
            <tr>
                <td><?=$row['course_id'];?></td>
                <td><?=$row['title'];?></td>
                <td><?=$row['std_name'];?></td>
            </tr>
        <?php
        }
        ?>
        </table>
        <?php
    ?>
</body>
</html>