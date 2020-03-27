<?php
session_start();
if(!isset($_SESSION['admin'])){
    header('Location: index.php');
}
include 'php/connect.php';
$sql="select * from `users` inner join `doctors` on (users.id=doctors.id)";
$result=$dbh->prepare($sql);
$result->execute();
$result=$result->fetchAll();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hospital</title>
        <link rel="stylesheet" type="text/css" href="style/profile.css" >
        <script src="js/JavaScript.js"></script>
    </head>
    <body>
        <header>
                <a href="#">Home</a>
                <a href="admin/reg_doctor.php">Регистрация врачей</a>
                <a href="#">Records</a>
                <a href="#">History</a>
                <a href="php/exit.php">Exit</a>  
        </header>
      <img class="photo" src="<?= $_SESSION['admin']['avatar']?>" alt="" width="300px" height="300px">
        <p><b><?= $_SESSION['admin']["first_name"]?></b></p>
        <p><b><?= $_SESSION['admin']["last_name"]?></b></p>
        <p><b><?= $_SESSION['admin']["middle_name"]?></b></p>
        <form method="POST" action="php/gen_page.php" >
            <select name="select1" id="select1" onchange="show()">
            <?php foreach($result as $res): ?>
            <option value="<?=$res['Specialization'];?>"><?=$res['Specialization'];?></option>
            <?php endforeach; ?>
            </select>
            <select name="select" id="select" style="width: 300px;">
            </select>
            <button type="submit">Информация</button>
        </form>
            <?php
            if(isset($_SESSION['inf'])){
               
            }
            ?>
    </body>
</html>