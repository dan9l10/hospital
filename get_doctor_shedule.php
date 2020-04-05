<?php
    include 'php/connect.php';
    session_start();
    if(!isset($_SESSION['doctor'])){
        header('Location: index.php');
    }  
    $id= $_SESSION['doctor']['id'];
    $date=intval($_GET['date']);
    $Correctdate=mb_substr($date,0,4).'-'.mb_substr($date,4,2).'-'.mb_substr($date,6,2);
    $date= $Correctdate;
    echo("<div style=\"margin:auto;width:80%\"><form onchange=\"javascript:getGrapfik(calendar.value)\">
            <span >Выбирите день </span> 
            <input id=\"calendar\" name=\"calendar\" type=\"date\" value=\"$date\" >
        </form></div>");
    $rezult=$dbh->query(
    "SELECT schedules.idpatient,timetable.thetime,users.first_name,users.middle_name,users.last_name,patient.FilePath 
    FROM schedules 
    JOIN timetable ON (schedules.thetime=timetable.idtime) 
    LEFT JOIN users ON(users.id=schedules.idpatient) 
    LEFT JOIN patient ON (schedules.idpatient=patient.id) 
    WHERE schedules.iddoctor=$id and thedate=\"$date\"");
        
    if(!(is_bool($rezult)))
    {
       
        echo("
        <table class=\"table_blur\" border=\"1\"  align=\"middle\" style=\"margin:auto;; width:80%; \">
            <tr>
                <td align=\"center\"><strong>Время</strong></td>
                <td align=\"center\"><strong>Пациент</strong></td>
            </tr>");
        foreach( $rezult as $row)
        {
            echo("<tr><td align=\"center\">$row[thetime]</td>");
            if((strlen($row[0]))>0)
            {
                echo("<td >
                <button style=\"width:100%\">
                    $row[first_name] $row[middle_name] $row[last_name]
                    </button>
                </td></tr>");
            }
            else{echo("<td></td></tr>");}
        }
        echo("</table>");
    }
?>