<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>covidjson1</title>
</head>
<body>
    <?php
    $json = file_get_contents('http://covid19.th-stat.com/api/open/cases');
    $data = json_decode($json);
    ?>
    <?php
        $sum = 0;
        for($i = 0 ; $i < sizeof($data->Data) ; $i++){
            if($data->Data[$i]->Age >=30 && $data->Data[$i]->Age <=50 && $data->Data[$i]->Gender == "หญิง"){
                $sum++;
            }
        }
    ?>
        <h1>เป็นผู้ติดเชื้อที่ยืนยันผลแล้วเพศหญิงอายุ 30-50ปี มีจำนวน <?=$sum;?> คน</h1>

</body>
</html>