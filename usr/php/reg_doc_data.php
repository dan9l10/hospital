<?php
session_start();
include '../../php/connect.php';
$id_doc=$_POST['select'];
$id_user=$_SESSION['usr']['id'];
$id_time=$_POST['timetable'];
$date=$_POST['date'];
//$sql_rec="select `iddoctor` from `schedules` where `thedate`='$date' and `iddoctor`='$id_doc' and `thetime`='$id_time'";
$sql_rec="UPDATE `schedules` SET `idpatient`='$id_user' WHERE `iddoctor`='$id_doc' and `thetime`='$id_time' and `thedate`='$date'";
$resultsql=$dbh->prepare($sql_rec);
$resultsql->execute();
$_SESSION['inf']="Record completed";
header('Location: ../reg_to_doc.php');
?>

