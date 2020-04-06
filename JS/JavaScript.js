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

function  getDoctorGrafik(date)
{
    dellBody();

    if(date==undefined)
    {
        var curDate= new Date();
        date=String(curDate.getFullYear());
        if((curDate.getUTCMonth()+1)<10)
        {date=date+'0'+String(curDate.getUTCMonth()+1);}
        else
        {date=date+String(curDate.getUTCMonth()+1);}
        if((curDate.getDate())<10)
        {date=date+'0'+String(curDate.getDate());}
        else
        {date=date+String(curDate.getDate());}
    }
    else
    {date=date.replace(/-/g, '');}

    if (window.XMLHttpRequest) 
    {
        xmlhttp = new XMLHttpRequest();// code for IE7+, Firefox, Chrome, Opera, Safari
    } 
    else 
    {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); // code for IE6, IE5
    }
    
    xmlhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200)
        {
            document.getElementById("body").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","get_doctor_shedule.php?date="+date,true);
    xmlhttp.send();
}


function dellBody()
{
    var body=document.getElementById("body");
    var head=document.getElementById("full_information");
    body.innerHTML = '';
    head.innerHTML='';
}

function CloseWindow()
{
    window.close();
}


function addDataToMedBook(Path)
{
  
  var Text = document.getElementById('NewText').value;
  if(confirm('Внести данные в мед книгу?'))
    {if (window.XMLHttpRequest) 
        {
            xmlhttp = new XMLHttpRequest();// code for IE7+, Firefox, Chrome, Opera, Safari
        } 
        else 
        {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); // code for IE6, IE5
        }
        xmlhttp.open("GET","WriteOnFile.php?Path="+encodeURIComponent(Path)+"&Text="+encodeURIComponent(Text),true);
        xmlhttp.send();
    }
    location.reload();
}

function openMedicalBook(PatientId)
{
    open("Medical_book.php?id="+PatientId);
}
