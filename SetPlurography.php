<?php
    include 'php/connect.php';
    $id=$_GET['ID'];
    $Plurographt=$_GET['date'];
    echo( "<p> $id </p>");
    echo( "<p> $Plurographt </p>");
    $dbh->query("UPDATE patient SET Plurography=\"$Plurographt\" WHERE id=$id;");
?>