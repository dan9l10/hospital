const ajax = new XMLHttpRequest();

function show(){
   // form_date();
    var variable = document.getElementById("select1").value;
    ajax.open("GET","/phpProject1/php/filter.php?id=" + variable+"&");
    ajax.onreadystatechange=upd;
    ajax.send();
}



function form_date(){
    var date = document.getElementById("date").value;
    var id_doc= document.getElementById("select").value;
    //alert("id_doc"+id_doc+" "+"date"+date);
    if (id_doc.trim() == '') {
       alert("Выберите доктора"); 
    }else{
        ajax.open("GET","/phpProject1/php/filter.php?date="+date+"&doc_id="+id_doc+"&");
        ajax.onreadystatechange=upd2;
        ajax.send();    
    } 
}

//upd function for insert into html
function upd(){
    document.getElementById("select").innerHTML=ajax.responseText;
}
function upd2(){
    document.getElementById("time").innerHTML=ajax.responseText;
}
//select timetable.thetime FROM timetable INNER JOIN schedules ON timetable.idtime=schedules.thetime where status is NULL && thedate = '2020-03-01' && iddoctor=42
