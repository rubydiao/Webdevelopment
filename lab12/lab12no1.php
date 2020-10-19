<html>
<head>
<meta charset="utf-8">
<script>
var httpRequest;
function send() {
    httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = showResult;
    var a = document.getElementById("a").value;
    var b = document.getElementById("b").value;
    var c = document.getElementById("c").value;
    var url= "add.php?a=" + a + "&b=" + b + "&c=" + c;
    httpRequest.open("GET", url);
    httpRequest.send();
}
function showResult() {
    if (httpRequest.readyState == 4 && httpRequest.status == 200) {
    document.getElementById("result").innerHTML = httpRequest.responseText;
    }
}
</script>
</head>
<body>
มะม่วง กก.ละ 30 บาท ขายได้<input type="number" min="1" id="a"><br>
ส้ม กก.ละ 70 บาทขายได้<input type="number" min="1" id="b"><br>
กล้วย หวีละ 30 บาท ขายได้<input type="number" min="1" id="c" onkeyup="send()">
<br>
<span id="result"></span>
</body></html>