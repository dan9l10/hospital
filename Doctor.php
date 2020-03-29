<?php
session_start();
if(!isset($_SESSION['doctor'])){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hospital</title>
        <link rel="stylesheet" type="text/css" href="style/profile.css" >
    </head>
    <body>
        <header>
                <a href="#">Домашняя</a>
                <a href="#">Записи</a>
                <a href="#" >История</a>
                <a href="#" onclick="javascript:getGrapfik()">График работы</a>
                <a href="php/exit.php">Exit</a>   
        </header>
      
        <!-- Тело с данными -->
        <div id="body" align="middle " >
        <img class="photo" src="<?= $_SESSION['doctor']['avatar']?>" alt="" width="300px" height="300px">
        <p><b><?= $_SESSION['doctor']["first_name"]?></b></p>
        <p><b><?= $_SESSION['doctor']["last_name"]?></b></p>
        <p><b><?= $_SESSION['doctor']["middle_name"]?></b></p>
        </div>

    </body>
</html>

<script>
    function  getGrapfik(date)
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
        body.innerHTML = '';
    }
</script>