<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hospital</title>
        <link rel="stylesheet" type="text/css" href="../style/showDoc.css" >
    </head>
    <body>
        <header>
                <a href="../Patient.php">Домашняя</a>
                <a href="../usr/showDoc.php">Врачи</a>
                <a href="reg_to_doc.php">Запись</a>
                <a href="../php/exit.php">Exit</a>  
        </header>
        <div id="cards">
           <?php
           include '../php/connect.php';
            $sql="select * from `users` inner join `doctors` on (users.id=doctors.id)";
            $result=$dbh->prepare($sql);
            $result->execute();
            $result=$result->fetchAll();
            $default_ava_path='../src/default_ava.png';
            
           foreach ($result as $res):
           ?>
        <div class="card" >
            <img src="<?php if(empty($res['avatar'])){
                echo $default_ava_path;
            } else {
                echo $res['avatar'];
            }?>" alt="Avatar" style="width:100%">
            <div class="container">
                <h4><b><?php echo $res['first_name'].' '.$res['last_name'].' '.$res['middle_name'];; ?></b></h4>
                <p><?=$res['Specialization']?></p>
            </div>
        </div>
        <?php 
        endforeach;
        ?> 
        </div>
        
    </body>
</html>




 
