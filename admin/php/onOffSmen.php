<?php
include '../../php/connect.php';
$date=$_POST['date'];
$id=$_POST['id'];
$time=$_POST['time'];
$selection=$dbh->prepare("SELECT schedules.status,schedules.thetime
                        FROM schedules
                        INNER JOIN timetable 
                        ON(timetable.idtime=schedules.thetime)
                        WHERE ((iddoctor=$id or idpatient=$id) AND (thedate='$date') AND (timetable.thetime='$time'))
                        ");
$selection->execute();
$rezult=$selection->fetchAll(PDO::FETCH_ASSOC);
$newVal=1;
$time=$rezult[0]['thetime'];
if(($rezult[0]['status'])==1){$newVal=0;}
$update=$dbh->prepare("UPDATE schedules 
                    SET schedules.status=$newVal
                    WHERE ((iddoctor=$id or idpatient=$id) AND (thedate='$date')
                    AND (thetime='$time'))
");
$update->execute();

?>