<?php
include '../../php/connect.php';
$date=$_POST['date'];
$id=$_POST['id'];
$selection=$dbh->prepare("SELECT timetable.thetime,doc.first_name,doc.middle_name,doc.last_name,
                        usr.first_name,usr.middle_name,usr.last_name,schedules.status
                        from schedules 
                        INNER JOIN timetable 
                        ON(timetable.idtime=schedules.thetime)
                        INNER JOIN users as doc
                        ON(  (doc.id=schedules.iddoctor)   )
                        LEFT JOIN users as usr
                        ON(  (usr.id=schedules.idpatient)   )
                        WHERE ((iddoctor=$id or idpatient=$id) AND (thedate='$date'))
                        ");
$selection->execute();
echo('<table border=\'1\'>
                    <tr>
                    <td>Время</td>
                    <td>Доктор</td>
                    <td>Пациент</td>
                    <td>Активность</td>
                     </tr>');

foreach($selection as $row)
{
    echo("<tr>
            <td>$row[0]</td>
            <td>$row[1] $row[2] $row[3]</td>
            <td>$row[4] $row[5] $row[6]</td>");
        echo("");
        if($row[7]==1){echo("<td><div id=\"$row[0]\"><input type=\"checkbox\" onchange=\"onOffSmen('$date','$row[0]','$id')\"checked></div></td>");}
        else{echo("<td><div id=\"$row[0]\"><input type=\"checkbox\"  onchange=\"onOffSmen('$date','$row[0]','$id')\"></div></td>");}
        echo('</tr>');
}
echo('</table>');

?>