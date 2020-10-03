<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <a name="t"></a>
    <header>
        <h3><?php echo "ข้อมูลล่าสุด : ", intval($date[0]) . " " . $TH_Month[intval($date[1] - 1)] . " " . ($date[2] + 543) . " , ", "เก็บข้อมูลวันแรก : ", $datefirst_split_dat[2], " ", $TH_Month[($datefirst_split_dat[1] - 1)], " ", ($datefirst_split_dat[0]) + 543;
            ?>
        </h3>
    </header>
    <?php
    $province = file_get_contents('https://opend.data.go.th/govspending/bbgfmisprovince?api-key=AxqaqKbuZy1z8c5Z0vPweEzfDIQluwaR&fbclid=IwAR2V1Oz6t87jq-TVXlfs2No5XMD-H3NwzYIWOlU07Ec0uXRHr8w_mzfZNu4');
    $dataprovince = json_decode($province);
    ?>
    <br>
    <div id="navbar">
        <a href="#aa">จำแนกตามจังหวัด ตามรายเดือน</a>
        <a href="#bb">จำแนกตามอายุ 4 ช่วง และเพศ ตามรายเดือน</a>
        <a href="#cc">เลือกเดือน</a>
    </div>
    <br>
    <article id="a">
        <a name="aa"></a>
        <h1>จำแนกตามจังหวัด ตามรายเดือน</h1>
        <table align="center">
            <tr>
                <th>จังหวัด/เดือน</th>
                <?php
                for ($l = 0; $l < $date[1]; $l++) {
                ?>
                    <th><?php echo $TH_Month[$l]; ?></th>
                <?php
                }
                ?>
                <th>รวม</th>
            </tr>
            <?php
            for ($i = 0; $i < 77; $i++) {
                $allprovince = $dataprovince->result[$i]->prov_name;
                $provincetotal = 0;
            ?>
                <tr>
                    <th><?php echo  $allprovince ?></th>
                    <?php
                    for ($k = 1; $k <= 9; $k++) {
                        $total = 0;
                        for ($j = 0; $j < sizeof($data->Data); $j++) {
                            $province = $data->Data[$j]->Province;
                            $t_month = explode("-", $data->Data[$j]->ConfirmDate);
                            if ($allprovince == $province && intval($t_month[1]) == $k) {
                                $total += 1;
                            }
                        }
                        $provincetotal += $total;
                    ?>
                        <td><?php echo $total; ?> </td>
                    <?php
                    }
                    ?>
                    <td id="total"><?php echo $provincetotal." คน"; ?> </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </article>
    <?php
    $td = explode(" ", $data->Data[0]->ConfirmDate);
    $month = 9;
    $tempdate = 0;
    $temps = 0;
    $tempmonth = 0;
    $c9m = array(0, 0, 0, 0);
    $c9f = array(0, 0, 0, 0);
    $c8m = array(0, 0, 0, 0);
    $c8f = array(0, 0, 0, 0);
    $c7m = array(0, 0, 0, 0);
    $c7f = array(0, 0, 0, 0);
    $c6m = array(0, 0, 0, 0);
    $c6f = array(0, 0, 0, 0);
    $c5m = array(0, 0, 0, 0);
    $c5f = array(0, 0, 0, 0);
    $c4m = array(0, 0, 0, 0);
    $c4f = array(0, 0, 0, 0);
    $c3m = array(0, 0, 0, 0);
    $c3f = array(0, 0, 0, 0);
    $c2m = array(0, 0, 0, 0);
    $c2f = array(0, 0, 0, 0);
    $c1m = array(0, 0, 0, 0);
    $c1f = array(0, 0, 0, 0);
    for ($i = 0; $i < sizeof($data->Data); $i++) {
        $tempdate = explode(" ", $data->Data[$i]->ConfirmDate);
        $temps = explode("-", $tempdate[0]);
        $tempmonth = $temps[1];
        if (intval($month) - intval($tempmonth) === 0) {
            if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Male") {
                $c9m[0]++;
            } else if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Female") {
                $c9f[0]++;
            } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Male") {
                $c9m[1]++;
            } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Female") {
                $c9f[1]++;
            } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Male") {
                $c9m[2]++;
            } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Female") {
                $c9f[2]++;
            } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Male") {
                $c9m[3]++;
            } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Female") {
                $c9f[3]++;
            }
        } else if (intval($month) - intval($tempmonth) === 1) {
            if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Male") {
                $c8m[0]++;
            } else if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Female") {
                $c8f[0]++;
            } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Male") {
                $c8m[1]++;
            } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Female") {
                $c8f[1]++;
            } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Male") {
                $c8m[2]++;
            } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Female") {
                $c8f[2]++;
            } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Male") {
                $c8m[3]++;
            } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Female") {
                $c8f[3]++;
            }
        } else if (intval($month) - intval($tempmonth) === 2) {
            if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Male") {
                $c7m[0]++;
            } else if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Female") {
                $c7f[0]++;
            } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Male") {
                $c7m[1]++;
            } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Female") {
                $c7f[1]++;
            } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Male") {
                $c7m[2]++;
            } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Female") {
                $c7f[2]++;
            } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Male") {
                $c7m[3]++;
            } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Female") {
                $c7f[3]++;
            }
        } else if (intval($month) - intval($tempmonth) === 3) {
            if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Male") {
                $c6m[0]++;
            } else if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Female") {
                $c6f[0]++;
            } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Male") {
                $c6m[1]++;
            } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Female") {
                $c6f[1]++;
            } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Male") {
                $c6m[2]++;
            } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Female") {
                $c6f[2]++;
            } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Male") {
                $c6m[3]++;
            } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Female") {
                $c6f[3]++;
            }
        } else if (intval($month) - intval($tempmonth) === 4) {
            if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Male") {
                $c5m[0]++;
            } else if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Female") {
                $c5f[0]++;
            } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Male") {
                $c5m[1]++;
            } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Female") {
                $c5f[1]++;
            } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Male") {
                $c5m[2]++;
            } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Female") {
                $c5f[2]++;
            } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Male") {
                $c5m[3]++;
            } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Female") {
                $c5f[3]++;
            }
        } else if (intval($month) - intval($tempmonth) === 5) {
            if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Male") {
                $c4m[0]++;
            } else if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Female") {
                $c4f[0]++;
            } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Male") {
                $c4m[1]++;
            } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Female") {
                $c4f[1]++;
            } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Male") {
                $c4m[2]++;
            } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Female") {
                $c4f[2]++;
            } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Male") {
                $c4m[3]++;
            } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Female") {
                $c4f[3]++;
            }
        } else if (intval($month) - intval($tempmonth) === 6) {
            if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Male") {
                $c3m[0]++;
            } else if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Female") {
                $c3f[0]++;
            } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Male") {
                $c3m[1]++;
            } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Female") {
                $c3f[1]++;
            } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Male") {
                $c3m[2]++;
            } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Female") {
                $c3f[2]++;
            } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Male") {
                $c3m[3]++;
            } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Female") {
                $c3f[3]++;
            }
        } else if (intval($month) - intval($tempmonth) === 7) {
            if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Male") {
                $c2m[0]++;
            } else if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Female") {
                $c2f[0]++;
            } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Male") {
                $c2m[1]++;
            } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Female") {
                $c2f[1]++;
            } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Male") {
                $c2m[2]++;
            } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Female") {
                $c2f[2]++;
            } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Male") {
                $c2m[3]++;
            } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Female") {
                $c2f[3]++;
            }
        } else if (intval($month) - intval($tempmonth) === 8) {
            if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Male") {
                $c1m[0]++;
            } else if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Female") {
                $c1f[0]++;
            } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Male") {
                $c1m[1]++;
            } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Female") {
                $c1f[1]++;
            } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Male") {
                $c1m[2]++;
            } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Female") {
                $c1f[2]++;
            } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Male") {
                $c1m[3]++;
            } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Female") {
                $c1f[3]++;
            }
        }
    }
    ?>
    <br>
    <article id="b">
        <a name="bb"></a>
        <h1>จำแนกตามอายุ 4 ช่วง และเพศ ตามรายเดือน</h1>
        <table align="center">
            <tr>
                <th>อายุ/เดือน</th>
                <th><?php echo $TH_Month[0]; ?></th>
                <th><?php echo $TH_Month[1]; ?></th>
                <th><?php echo $TH_Month[2]; ?></th>
                <th><?php echo $TH_Month[3]; ?></th>
                <th><?php echo $TH_Month[4]; ?></th>
                <th><?php echo $TH_Month[5]; ?></th>
                <th><?php echo $TH_Month[6]; ?></th>
                <th><?php echo $TH_Month[7]; ?></th>
                <th><?php echo $TH_Month[8]; ?></th>
                <th>รวม</th>
            </tr>
            <tr>
                <th>อายุ 1-20 ชาย จำนวน(คน)</th>
                <td><?php echo $c1m[0]; ?></td>
                <td><?php echo $c2m[0]; ?></td>
                <td><?php echo $c3m[0]; ?></td>
                <td><?php echo $c4m[0]; ?></td>
                <td><?php echo $c5m[0]; ?></td>
                <td><?php echo $c6m[0]; ?></td>
                <td><?php echo $c7m[0]; ?></td>
                <td><?php echo $c8m[0]; ?></td>
                <td><?php echo $c9m[0]; ?></td>
                <td id="total"><?php echo $c1m[0] + $c2m[0] + $c3m[0] + $c4m[0] + $c5m[0] + $c6m[0] + $c7m[0] + $c8m[0] + $c9m[0]." คน"; ?></td>

            </tr>
            <tr>
                <th>อายุ 1-20 หญิง จำนวน(คน)</th>
                <td><?php echo $c1f[0]; ?></td>
                <td><?php echo $c2f[0]; ?></td>
                <td><?php echo $c3f[0]; ?></td>
                <td><?php echo $c4f[0]; ?></td>
                <td><?php echo $c5f[0]; ?></td>
                <td><?php echo $c6f[0]; ?></td>
                <td><?php echo $c7f[0]; ?></td>
                <td><?php echo $c8f[0]; ?></td>
                <td><?php echo $c9f[0]; ?></td>
                <td id="total"><?php echo $c1f[0] + $c2f[0] + $c3f[0] + $c4f[0] + $c5f[0] + $c6f[0] + $c7f[0] + $c8f[0] + $c9f[0]." คน"; ?></td>
            </tr>
            <tr>
                <th>อายุ 21-40 ชาย จำนวน(คน)</th>
                <td><?php echo $c1m[1]; ?></td>
                <td><?php echo $c2m[1]; ?></td>
                <td><?php echo $c3m[1]; ?></td>
                <td><?php echo $c4m[1]; ?></td>
                <td><?php echo $c5m[1]; ?></td>
                <td><?php echo $c6m[1]; ?></td>
                <td><?php echo $c7m[1]; ?></td>
                <td><?php echo $c8m[1]; ?></td>
                <td><?php echo $c9m[1]; ?></td>
                <td id="total"><?php echo $c1m[1] + $c2m[1] + $c3m[1] + $c4m[1] + $c5m[1] + $c6m[1] + $c7m[1] + $c8m[1] + $c9m[1]." คน"; ?></td>
            </tr>
            <tr>
                <th>อายุ 21-40 หญิง จำนวน(คน)</th>
                <td><?php echo $c1f[1]; ?></td>
                <td><?php echo $c2f[1]; ?></td>
                <td><?php echo $c3f[1]; ?></td>
                <td><?php echo $c4f[1]; ?></td>
                <td><?php echo $c5f[1]; ?></td>
                <td><?php echo $c6f[1]; ?></td>
                <td><?php echo $c7f[1]; ?></td>
                <td><?php echo $c8f[1]; ?></td>
                <td><?php echo $c9f[1]; ?></td>
                <td id="total"><?php echo $c1f[1] + $c2f[1] + $c3f[1] + $c4f[1] + $c5f[1] + $c6f[1] + $c7f[1] + $c8f[1] + $c9f[1]." คน"; ?></td>
            </tr>
            <tr>
                <th>อายุ 41-60 ชาย จำนวน(คน)</th>
                <td><?php echo $c1m[2]; ?></td>
                <td><?php echo $c2m[2]; ?></td>
                <td><?php echo $c3m[2]; ?></td>
                <td><?php echo $c4m[2]; ?></td>
                <td><?php echo $c5m[2]; ?></td>
                <td><?php echo $c6m[2]; ?></td>
                <td><?php echo $c7m[2]; ?></td>
                <td><?php echo $c8m[2]; ?></td>
                <td><?php echo $c9m[2]; ?></td>
                <td id="total"><?php echo $c1m[2] + $c2m[2] + $c3m[2] + $c4m[2] + $c5m[2] + $c6m[2] + $c7m[2] + $c8m[2] + $c9m[2]." คน"; ?></td>
            </tr>
            <tr>
                <th>อายุ 41-60 หญิง จำนวน(คน)</th>
                <td><?php echo $c1f[2]; ?></td>
                <td><?php echo $c2f[2]; ?></td>
                <td><?php echo $c3f[2]; ?></td>
                <td><?php echo $c4f[2]; ?></td>
                <td><?php echo $c5f[2]; ?></td>
                <td><?php echo $c6f[2]; ?></td>
                <td><?php echo $c7f[2]; ?></td>
                <td><?php echo $c8f[2]; ?></td>
                <td><?php echo $c9f[2]; ?></td>
                <td id="total"><?php echo $c1f[2] + $c2f[2] + $c3f[2] + $c4f[2] + $c5f[2] + $c6f[2] + $c7f[2] + $c8f[2] + $c9f[2]." คน"; ?></td>
            </tr>
            <tr>
                <th>อายุ 61 ขึ้นไป ชาย จำนวน(คน)</th>
                <td><?php echo $c1m[3]; ?></td>
                <td><?php echo $c2m[3]; ?></td>
                <td><?php echo $c3m[3]; ?></td>
                <td><?php echo $c4m[3]; ?></td>
                <td><?php echo $c5m[3]; ?></td>
                <td><?php echo $c6m[3]; ?></td>
                <td><?php echo $c7m[3]; ?></td>
                <td><?php echo $c8m[3]; ?></td>
                <td><?php echo $c9m[3]; ?></td>
                <td id="total"><?php echo $c1m[3] + $c2m[3] + $c3m[3] + $c4m[3] + $c5m[3] + $c6m[3] + $c7m[3] + $c8m[3] + $c9m[3]." คน"; ?></td>
            </tr>
            <tr>
                <th>อายุ 61 ขึ้นไป หญิง จำนวน(คน)</th>
                <td><?php echo $c1f[3]; ?></td>
                <td><?php echo $c2f[3]; ?></td>
                <td><?php echo $c3f[3]; ?></td>
                <td><?php echo $c4f[3]; ?></td>
                <td><?php echo $c5f[3]; ?></td>
                <td><?php echo $c6f[3]; ?></td>
                <td><?php echo $c7f[3]; ?></td>
                <td><?php echo $c8f[3]; ?></td>
                <td><?php echo $c9f[3]; ?></td>
                <td id="total"><?php echo $c1f[3] + $c2f[3] + $c3f[3] + $c4f[3] + $c5f[3] + $c6f[3] + $c7f[3] + $c8f[3] + $c9f[3]." คน"; ?></td>
            </tr>
        </table>
    </article>
    <article id="c">
        <a href="" name="cc" id="choose"><h1>เลือกเดือน</h1></a>
        <a id="top" href="#t">Go top</a>
        <form action="lab9no3_c.php" method="get" align="center">
        <select name="month" id="">
            <option value="1">มกราคม</option>
            <option value="2">กุมภาพันธ์</option>
            <option value="3">มีนาคม</option>
            <option value="4">เมษายน</option>
            <option value="5">พฤษภาคม</option>
            <option value="6">มิถุนายน</option>
            <option value="7">กรกฏาคม</option>
            <option value="8">สิงหาคม</option>
            <option value="9">กันยายน</option>
        </select>
        <input type="submit" value="กด">
        </form>
    </article>
</body>
</html>