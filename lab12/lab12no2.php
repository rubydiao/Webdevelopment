<html>
<head>
<meta charset="utf-8">
<script>
    function send() {
        request = new XMLHttpRequest();
        request.onreadystatechange = showResult;
        var keyword = document.getElementById("keyword").value;
        var url= "member.php?keyword=" + keyword;
        request.open("GET", url, true);
        request.send(null);
    }
    function showResult() {
        if (request.readyState == 4) {
            if (request.status == 200)
                document.getElementById("result").innerHTML = request.responseText;
        }
    }
</script>
<style>
    table,th,td{
        border:1px solid black;
    }
</style>
</head>
<body>
ชื่อสมาชิก: <input type="text" id="keyword" onkeyup="send()">
<div id="result"></div>
</body>
</html>