<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['usr'])){
    header('Location: profile.php') ; 
}
include('php/connect.php');
//$Data=$dbh->query("Select * from users;");
//echo(gettype($Data));
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>Hospital</title>
        <link rel="stylesheet" type="text/css" href="style/main.css" >
    </head>
    <body>
            <form  action= "php/auth.php" class="form-signin" method="POST"> 
                <label>Login</label>
                <input type="text" name="login" class="form-control" placeholder="Введите логин">
                <label>Password</label>
                <input type="password" name="password" class="form-contro" placeholder="Введите пароь">

                <input type="submit" name="OK" class="form-control" value="OK"><br>
                <a href="php/reg.php" id="text">Зарегесрироваться</a>
                 <p class="mg">
                    <?php
                    if (isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                    }
                    
                    ?>
                </p>
        </div>
        <?php
        //$sql = "SELECT * FROM doctors";
        //foreach ($dbh->query($sql) as $row) {
        // var_dump($row); echo "<br>";
       // print "<br>$row[0] $row[1] $row[2] $row[3] $row[4] $row[2] ";
       // }
       //     echo 'hello';
        //dfsdsdsddsdprivet
        ?>
    </body>
</html>

