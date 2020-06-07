function clock() {
    var d = new Date();
    var month_num = d.getMonth()
    var day = d.getDate();
    var hours = d.getHours();
    var minutes = d.getMinutes();
    var seconds = d.getSeconds();
    
    month=new Array("01", "02", "03", "04", "05", "06",
    "07", "08", "09", "10", "11", "12");
    
    if (day <= 9) day = "0" + day;
    if (hours <= 9) hours = "0" + hours;
    if (minutes <= 9) minutes = "0" + minutes;
    if (seconds <= 9) seconds = "0" + seconds;
    
    date_time = "<i class='material-icons'>calendar_today</i>" + day + " " + month[month_num] + " " + d.getFullYear() +
    " г.&nbsp;&nbsp;&nbsp; <i class='material-icons'>alarm</i> "+ hours + ":" + minutes + ":" + seconds;
    
    if (document.layers) {
     document.layers.doc_time.document.write(date_time);
     document.layers.doc_time.document.close();
    }

    else document.getElementById("doc_time").innerHTML = date_time;
     setTimeout("clock()", 1000);
    }
function addTimeZadacha() {
    var time_date = new Date();
    
}