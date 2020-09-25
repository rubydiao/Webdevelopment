async function covid() {
    let response = await fetch('https://covid19.th-stat.com/api/open/cases');
    let rawData = await response.text();
    let objectData = JSON.parse(rawData);
    let result = document.getElementById('result');
    let dshow = objectData.UpdateDate.split("/");
    let td = objectData.Data[0].ConfirmDate.split(" ");
    let sm = td[0].split("-");
    let year = sm[0];
    let month = sm[1];
    let tempdate, temps, tempmonth;
    let c1 = [0, 0, 0, 0];
    let c2 = [0, 0, 0, 0];
    var thmonth = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤษจิกายน", "ธันวาคม"];
    for (let i = 0; i < objectData.Data.length; i++) {
        tempdate = objectData.Data[i].ConfirmDate.split(" ");
        temps = tempdate[0].split("-");
        tempmonth = temps[1];
        if (parseInt(month) - parseInt(tempmonth) === 0) {
            if (objectData.Data[i].Age <=20) {
                c1[0]++;
            } else if (objectData.Data[i].Age > 20 && objectData.Data[i].Age <= 40) {
                c1[1]++;
            } else if (objectData.Data[i].Age > 40 && objectData.Data[i].Age <= 60) {
                c1[2]++;
            } else if (objectData.Data[i].Age > 60) {
                c1[3]++;
            }
        } else if (parseInt(month) - parseInt(tempmonth) === 1) {
            if (objectData.Data[i].Age <=20) {
                c2[0]++;
            } else if (objectData.Data[i].Age > 20 && objectData.Data[i].Age <= 40) {
                c2[1]++;
            } else if (objectData.Data[i].Age > 40 && objectData.Data[i].Age <= 60) {
                c2[2]++;
            } else if (objectData.Data[i].Age > 60) {
                c2[3]++;
            }
        }
    }
    let text = document.createElement('p')
    text.innerHTML = "ข้อมูลปรับปรุงล่าสุด: " + (parseInt(dshow[0])) + " " + thmonth[(parseInt(dshow[1]) - 1)] + " " + (parseInt(dshow[2]) + 543);
    let lastest = document.getElementById('lastest');
    lastest.appendChild(text);
    let li = document.createElement('li')
    li.innerHTML = thmonth[(parseInt(dshow[1]) - 1)] + " " + (parseInt(dshow[2]) + 543) + " (รวม " + (parseInt(c1[0]) + parseInt(c1[1]) + parseInt(c1[2]) + parseInt(c1[3])) + " คน)";
    let ul = document.createElement('ul')
    let f1 = document.createElement('li')
    f1.innerHTML = "อายุ 1-20 จำนวน " + c1[0] + " คน";
    f1.style.listStyleType = 'disc'
    ul.appendChild(f1);
    let f2 = document.createElement('li')
    f2.innerHTML = "อายุ 21-40 จำนวน " + c1[1] + " คน";
    f2.style.listStyleType = 'disc'
    ul.appendChild(f2);
    let f3 = document.createElement('li')
    f3.innerHTML = "อายุ 21-40 จำนวน " + c1[2] + " คน";
    f3.style.listStyleType = 'disc'
    ul.appendChild(f3);
    let f4 = document.createElement('li')
    f4.innerHTML = "อายุ 60 ขึ้นไปจำนวน " + c1[3] + " คน";
    f4.style.listStyleType = 'disc'
    ul.appendChild(f4);
    li.appendChild(ul);
    result.appendChild(li)
    let si = document.createElement('li')
    si.innerHTML = thmonth[(parseInt(dshow[1]) - 1)] + " " + (parseInt(dshow[2]) + 543) + " (รวม " + (parseInt(c2[0]) + parseInt(c2[1]) + parseInt(c2[2]) + parseInt(c2[3])) + " คน)";
    let sl = document.createElement('ul')
    let s1 = document.createElement('li')
    s1.innerHTML = "อายุ 1-20 จำนวน " + c2[0] + " คน";
    s1.style.listStyleType = 'disc'
    sl.appendChild(s1);
    let s2 = document.createElement('li')
    s2.innerHTML = "อายุ 21-40 จำนวน " + c2[1] + " คน";
    s2.style.listStyleType = 'disc'
    sl.appendChild(s2);
    let s3 = document.createElement('li')
    s3.innerHTML = "อายุ 21-40 จำนวน " + c2[2] + " คน";
    s3.style.listStyleType = 'disc'
    sl.appendChild(s3);
    let s4 = document.createElement('li')
    s4.innerHTML = "อายุ 60 ขึ้นไปจำนวน " + c2[3] + " คน";
    s4.style.listStyleType = 'disc'
    sl.appendChild(s4);
    si.appendChild(sl);
    result.appendChild(si)
}
covid()