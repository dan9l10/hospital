<?php
session_start();
if(!isset($_SESSION['admin'])){
    header('Location: index.php');
}
include 'php/connect.php';
$sql="select `middle_name`,`surname`,`name`,`id` from `doctors`";
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
        <form method="POST" action="php/gen_page.php" >
            <select name="select">
            <option value="0">Choice</option>
            <?php foreach($result as $res): ?>
            <option value="<?=$res['id'];?>"><?=$res['middle_name'] .' '.$res['surname'].' '.$res['name'];?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Submit</button>
        </form>
        
    </body>
</html>