<?php
include '../../php/connect.php';
$month=$_POST['month'];
$year=$_POST['year'];
$selection=$dbh->prepare("SET @p0='$month'; SET @p1='$year'; CALL `CreateSchedule`(@p0, @p1, @p2); SELECT @p2 AS `Result`;");
$selection->execute();


?>