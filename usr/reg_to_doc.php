<?php
session_start();
if(!isset($_SESSION['usr'])){
    header('Location: ../index.php');
}
include '../php/connect.php';
$sql="select * from `users` inner join `doctors` on (users.id=doctors.id)";
$sql_time="select * from `timetable`";
$result=$dbh->prepare($sql);
$result->execute();
$result=$result->fetchAll();
$result2=$dbh->prepare($sql_time);
$result2->execute();
$result2=$result2->fetchAll();
//print_r($result);
//exit();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hospital</title>
        <link rel="stylesheet" type="text/css" href="style/profile.css" >
    </head>
    <body>
        <form method="POST" action="php/reg_doc_data.php">
            <select name="select1">
            <option value="0">Choice</option>
            <?php foreach($result as $res): ?>
            <option value="<?=$res['id'];?>"><?=$res['first_name'] .' '.$res['middle_name'].' '.$res['last_name'];?></option>
            <?php endforeach; ?>
            </select>
            <select name="timetable">
            <option value="0">Choice</option>
            <?php foreach($result2 as $res): ?>
            <option value="<?=$res['idtime'];?>"><?=$res['thetime'];?></option>
            <?php endforeach; ?>
        </select>
            <input type="date" name="date" class="form-control" placeholder="Insert date"  value="2020-03-01">
        <button type="submit">Информация</button>
        </form>
        <a href="../Patient.php" id="text">Back</a>
        <p>
           <?php
            if(isset($_SESSION['inf'])){
               echo $_SESSION['inf'];
                unset($_SESSION['inf']);
            }
           
            ?> 
        </p>
            
            
        
    </body>
</html>

