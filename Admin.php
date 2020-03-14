<?php
session_start();
if(!isset($_SESSION['admin'])){
    header('Location: index.php');
}
include 'php/connect.php';
$sql="select `first_name`,`middle_name`,`last_name` from `users`";
$result=$dbh->prepare($sql);
$result->execute();
$result=$result->fetchAll();
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
        <header>
                <a href="#">Home</a>
                <a href="#">Doctors</a>
                <a href="#">Records</a>
                <a href="#">History</a>
                <a href="php/exit.php">Exit</a>  
        </header>
      <img class="photo" src="<?= $_SESSION['admin']['avatar']?>" alt="" width="300px" height="300px">
        <p><b><?= $_SESSION['admin']["first_name"]?></b></p>
        <p><b><?= $_SESSION['admin']["last_name"]?></b></p>
        <p><b><?= $_SESSION['admin']["middle_name"]?></b></p>
        <select>
            <option>Choice</option>
            <?php foreach($result as $res): ?>
            <option value="<?=$res['first_name'] . $res['middle_name'];?>"><?=$res['first_name'] .' '.$res['middle_name'];?></option>
            <?php endforeach; ?>
        </select>
    </body>
</html>