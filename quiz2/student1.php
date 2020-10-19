<?php include "connect.php" ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>student1</title>
    <style>
        table,td,th{
            border : 1px solid black;
        }
        
    </style>
</head>
<body>
    <?php
        $stmt = $pdo->prepare("SELECT title,COUNT(course.course_id) FROM `course` join register WHERE course.course_id = register.course_id GROUP BY title");
        $stmt->execute();
        ?>
        <table>
            <tr>
                <th>ชื่อวิชา</th>
                <th>จำนวนคนลงทะเบียน</th>
            </tr>
            <?php
        while($row = $stmt->fetch()){
            ?>
            <tr>
                <td><?=$row['title'];?></td>
                <td><?=$row['COUNT(course.course_id)'];?></td>
            </tr>
        <?php
        }
        ?>
        </table>
        <?php
    ?>
</body>
</html>