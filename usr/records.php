<?php
session_start();
include '../php/connect.php';


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hospital</title>
        <link rel="stylesheet" type="text/css" href="../style/table.css" >
        <link rel="stylesheet" type="text/css" href="../style/profile.css" >
        <!--<script src="js/JavaScript.js"></script>-->
    </head>
    <body>
        <header>
            <a href="../Patient.php">Домашняя</a>
            <a href="showDoc.php">Врачи</a>
            <a href="reg_to_doc.php">Запись</a>
            <a href="#">История</a>
            <a href="../php/exit.php">Exit</a> 
        </header>
        <table border="1" class="table_blur">
            <tr><td><p>Date</p></td><td>Name</td><td>Time</td><td>Specialization</td><td>Cabinet</td></tr>
            <?php
                $id_usr=$_SESSION['usr']['id'];
                $name=$dbh->prepare("select schedules.thedate,timetable.thetime,users.first_name,users.middle_name,users.last_name,doctors.Specialization,doctors.cabinet from users INNER JOIN doctors ON doctors.id=users.id INNER JOIN schedules ON schedules.iddoctor=doctors.id INNER JOIN timetable ON timetable.idtime=schedules.thetime WHERE schedules.idpatient='$id_usr' ");
                $name->execute();
                $name=$name->fetchAll();
                foreach ($name as $res){
                    $first_name=$res['first_name'];
                    $time=$res['thetime'];
                    $specialization=$res['Specialization'];
                    $cab=$res['cabinet'];
                    $middleName=$res['middle_name'];
                    $surname=$res['last_name'];
                    $date=$res['thedate'];
                    echo "<tr> <td> $date </td> <td>$first_name"." $middleName"." $surname"."</td> <td>$time</td><td>$specialization</td><td>$cab</td></tr>";
                } 
            ?>
        </table>
    </body>
</html>

