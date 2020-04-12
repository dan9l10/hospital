<?php
include '../../php/connect.php';
$id_account=$_POST['id'];
$selection=$dbh->prepare("call delete_acc(:id)");
$selection->execute(array(":id"=>$id_account));
$selection=$selection->fetchAll(PDO::FETCH_OBJ);
//echo json_encode($selection);
?>
