<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="cal.php" method="get">
        a=<input type="text" name="a"><br>
        b=<input type="text" name="b"><br>
        เลือก operator <select name="op" id="">
            <option value="">โปรดเลือก</option>
            <option value="+">บวก</option>
            <option value="-">ลบ</option>
            <option value="*">คูณ</option>
            <option value="/">หาร</option>
        </select><br>
        <input type="submit" value="คำนวณ">
    </form>
</body>
</html>