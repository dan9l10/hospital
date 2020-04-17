<?php
session_start();
if(!isset($_SESSION['usr'])){
    header('Location: index.php') ;
}
include 'php/connect.php';
$id=$_SESSION['usr']['id'];
$file = $dbh->prepare("select patient.filepath from patient INNER JOIN users ON users.id=patient.id where users.id=$id");
$file->execute();
$file=$file->fetchAll(PDO::FETCH_ASSOC);
foreach ($file as $row){
    $_SESSION['usr']['path']=$row['filepath'];
}

//print_r($file);
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
        <header id="header">
                <a href="#">Домашняя</a>
                <a href="usr/showDoc.php">Врачи</a>
                <a href="usr/reg_to_doc.php">Запись</a>
                <a href="usr/records.php">История</a>
                <a href="php/exit.php">Exit</a>       
        </header>
        <div id="full_information">
        <div id="info">
            <?php if(!empty($_SESSION['usr']['avatar'])):?>
         <img class="photo" src="<?= $_SESSION['usr']['avatar']?>" alt="">
            <?php else:?>
         <img class="photo" src="src/default_ava.png" alt="">
         <?php endif; ?>
         <span id="name"><b><?= $_SESSION['usr']["first_name"]?> <?= $_SESSION['usr']["last_name"]?> <?= $_SESSION['usr']["middle_name"]?></b></span>
         <p>Пациент</p>
        </div>
            <hr id="line"> 
        <div id="private_info">
            <p><b>Username:</b>  <?=$_SESSION['usr']['login'] ?></p>
            <p><b>Email:</b>  <?=$_SESSION['usr']['email']?></p>
            <p><b>Date Birth:</b>  <?=$_SESSION['usr']['dob']?></p>
            <p><b>Bio:</b></p>
        </div>
        </div>
        <br>
        <h1>Медицинская книга</h1>
             <?php 
             if(isset($_SESSION['usr']['path'])&&!empty($_SESSION['usr']['path'])):
                 if(file_exists($_SESSION['usr']['path'])):
             $arr=file($_SESSION['usr']['path']);?>
             <textarea style="margin:auto; margin-bottom:1%; width:99%;resize: none; height: 500px;">
             <?php echo implode ("",$arr);?>
             </textarea>
             <?php endif; endif;?>
        
       
    </body>
</html>

