<!DOCTYPE html>
<?php
include('php/connect.php');
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<link rel="stylesheet" type="text/css" href="sstyle/main.css" >
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hospital</title>
    </head>
    <body>
        <div id="container">
            <form  action= "php/auth.php" class="form-signin" method="POST"> 
                <h2>Login</h2>
                <p>Name</p>
                <input type="text" name="login" class="form-control" placeholder="Введите логин">
                <p>Password</p>
                <input type="password" name="password" class="form-contro" placeholder="Введите пароь">
                
                <input type="submit" name="OK" class="form-control" value="OK"><br>
                <a href="php/reg.php">Зарегесрироваться</a>
            </form>
        </div>
        <?php
        
        //$sql = "SELECT * FROM doctors";
        //foreach ($dbh->query($sql) as $row) {
        // var_dump($row); echo "<br>";
       // print "<br>$row[0] $row[1] $row[2] $row[3] $row[4] $row[2] ";
       // }

       //     echo 'hello';
        
        
        ?>
    </body>
</html>
