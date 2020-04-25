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
        <script src="../JS/JavaScript.js"></script>
        <link rel="stylesheet" type="text/css" href="../style/profile.css" >
    </head>
    <body>
        
            <form method="POST" action="php/reg_doc_data.php">
            
<!--            <select name="select1" id="select1" >
                <option value="0">Choice</option>
                <?php foreach($result as $res): ?>
                <option value="<?=$res['Specialization'];?>"><?=$res['Specialization'];?></option>
                <?php endforeach; ?>
            </select>-->
                <label>Выберите доктора</label>
            <select name="select" id="select" onchange="form_date()" >
                <?php foreach($result as $res): ?>
                <option value="<?=$res['id'];?>"><?=$res['first_name'].' '.$res['middle_name'].' '.$res['last_name'];?></option>
                <?php endforeach; ?>
            </select>
                 <label>Выберите время</label>
            <select name="timetable" id="time">
                <option value="0">Choice</option>
                <?php foreach($result2 as $res): ?>
                <option value="<?=$res['idtime'];?>"><?=$res['thetime'];?></option>
                <?php endforeach; ?>
            </select>
             <label>Выберите дату</label>
            <input  id="date" onchange="form_date()" type="date" name="date" class="form-control" min="<?php echo date("Y-m-d")?>" value="<?php echo date("Y-m-d")?>">
        <button type="submit">Информация</button>
        </form>
        <a href="../Patient.php" id="back_index">Back</a>
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

