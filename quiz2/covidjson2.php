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
    $month = array(1,2,3,4,5,6,7,8,9);
    ?>
    <?php
        $sum = 0;
        for($i = 0 ; $i < sizeof($data->Data) ; $i++){
            $date = $data->Data[$i]->ConfirmDate;
            $datesplit = explode("-",$date);
            if($data->Data[$i]->Age >=30 && $data->Data[$i]->Age <=50 && $data->Data[$i]->Gender == "หญิง" && $datesplit[1] == 4){
                $sum++;
            }
        }
    ?>
        <h1>เป็นผู้ติดเชื้อที่ยืนยันผลแล้วเพศหญิงอายุ 30-50 ปี เฉพาะเดือนเมษายน มีจำนวน <?=$sum;?> คน</h1>

</body>
</html>