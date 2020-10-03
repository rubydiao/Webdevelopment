<?php
    $a = $_POST['a'];
    $b = $_POST['b'];
    $op = $_POST['op'];
    if($op == '+'){
        echo "ผลลัพธ์ = ",$a+$b;
    }
    if($op == '-'){
        echo "ผลลัพธ์ = ",$a-$b;
    }if($op == '*'){
        echo "ผลลัพธ์ = ",$a*$b;
    }if($op == '/'){
        echo "ผลลัพธ์ = ",$a/$b;
    }
?>