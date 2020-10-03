<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lab9no3</title>
    <link rel="stylesheet" href="lab9no3.css">
</head>

<body>
    <?php
    $json = file_get_contents('https://covid19.th-stat.com/api/open/cases');
    $data = json_decode($json);
    $date = explode("/", $data->UpdateDate);
    $TH_Month = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
    ?>
    <?php
    $countfirst = 0;
    $datefirst = $data->Data[sizeof($data->Data) - 1]->ConfirmDate;
    $datefirst_split_tab = explode(" ", $datefirst);
    $datefirst_split_dat = explode("-", $datefirst_split_tab[0]);
    ?>
    <header>
        <h3><?php echo "ข้อมูลล่าสุด : ", intval($date[0]) . " " . $TH_Month[intval($date[1] - 1)] . " " . ($date[2] + 543) . " , ", "เก็บข้อมูลวันแรก : ", $datefirst_split_dat[2], " ", $TH_Month[($datefirst_split_dat[1] - 1)], " ", ($datefirst_split_dat[0]) + 543;
            ?>
        </h3>
    </header>
    <?php
    $select = $_GET['month'];
    $province = file_get_contents('https://opend.data.go.th/govspending/bbgfmisprovince?api-key=AxqaqKbuZy1z8c5Z0vPweEzfDIQluwaR&fbclid=IwAR2V1Oz6t87jq-TVXlfs2No5XMD-H3NwzYIWOlU07Ec0uXRHr8w_mzfZNu4');
    $dataprovince = json_decode($province);
    $numprovince = $dataprovince->summary->total;
    ?>
    <h1><?php echo "เดือน : " . $TH_Month[$select - 1]; ?></h1>
    <a id="return" href="lab9no3.php">กลับสู่หน้าหลัก</a>
    <table align="center">
        <tr>
            <th>จังหวัด/ช่วงอายุ</th>
            <th>อายุ 1-20</th>
            <th>อายุ 21-40</th>
            <th>อายุ 41-60</th>
            <th>อายุ 61 ขึ้นไป</th>
            <th>รวม</th>
        </tr>
        <?php
        for ($i = 0; $i < $numprovince; $i++) {
            $allprovince = $dataprovince->result[$i]->prov_name;
            $age1 = 0;
            $age2 = 0;
            $age3 = 0;
            $age4 = 0;
            for ($j = 0; $j < sizeof($data->Data); $j++) {
                $province = $data->Data[$j]->Province;
                $t_month = explode("-", $data->Data[$j]->ConfirmDate);
                if ($allprovince == $province && intval($t_month[1]) == $select) {
                    $age = $data->Data[$j]->Age;
                    if ($age <= 20) {
                        $age1 += 1;
                    } else if ($age > 20 && $age <= 40) {
                        $age2 += 1;
                    } else if ($age > 40 && $age <= 60) {
                        $age3 += 1;
                    } else if ($age > 60) {
                        $age4 += 1;
                    }
                }
            }
            $total = $age1 + $age2 + $age3 + $age4;
        ?>
            <tr>
                <th><?php echo $allprovince; ?></th>
                <td><?php echo $age1; ?></td>
                <td><?php echo $age2; ?></td>
                <td><?php echo $age3; ?></td>
                <td><?php echo $age4; ?></td>
                <td id="total"><?php echo $age1 + $age2 + $age3 + $age4." คน"; ?></td>
            <?php
        }
            ?>
    </table>
    ?>
</body>

</html>