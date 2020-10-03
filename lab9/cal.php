<?php
    $a = $_GET['a'];
    $b = $_GET['b'];
    $op = $_GET['op'];
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