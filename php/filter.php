<?php
include 'connect.php';
$specialization=$_REQUEST['id'];


$sql = $dbh->prepare("select users.id,first_name,middle_name,last_name FROM users INNER JOIN doctors ON doctors.id=users.id WHERE doctors.Specialization='$specialization'");
$sql->execute();
$sql=$sql->fetchAll();
//print_r($sql);

foreach($sql as $res2){
    //$idw=$res[0];
    //print " $idw ";
    print "<option value=".'"'.$res2[0].'"'.">$res2[1] $res2[2] $res2[3] </option>";
}
$date=$_REQUEST['date'];
$id_doc=$_REQUEST['doc_id'];

$sql2=$dbh->prepare("select timetable.idtime,timetable.thetime FROM timetable INNER JOIN schedules ON timetable.idtime=schedules.thetime where status = 1 && thedate = '$date' && iddoctor=$id_doc  && (idpatient is null)");
$sql2->execute();
$sql2=$sql2->fetchAll();
//print_r($sql2);
//exit();
foreach($sql2 as $res){
    print "<option value="."$res[0]".">$res[1] </option>";
}
//echo date("d-m-Y");
?>

