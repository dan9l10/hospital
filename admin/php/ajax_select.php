<?php
include '../../php/connect.php';
$selection=$dbh->prepare("select * from users where status<>'admin'");
$selection->execute();
$selection=$selection->fetchAll(PDO::FETCH_OBJ);
echo json_encode($selection);
?>
