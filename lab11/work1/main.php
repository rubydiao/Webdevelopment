<?php
    $display = $_GET['language'];
    setcookie("dis",$display,time()+10);
        if($_COOKIE['dis'] == "th"){
            echo "<h1>ยินดีต้อนรับ</h1>";
        }
        if($_COOKIE['dis'] == "en"){
            echo "<h1>Welcome</h1>";
        }
    
?>