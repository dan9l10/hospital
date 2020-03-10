<!DOCTYPE html>
<?php
include('connect.php');
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<link rel="stylesheet" type="text/css" href="style/main.css">
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div id="container2">
            <form action="check.php" method="POST"> 
                <h1>registration</h1>
                <p>Login</p>
                <input type="text" name="login" class="form-control" placeholder="Введите логин">
                <p>Password</p>
                <input type="password" name="password" class="form-contro" placeholder="Введите пароь">
                <p>Name</p>
                <input type="text" name="name" class="form-contro" placeholder="Введите name">
                <p>Age</p>
                <input type="text" name="age" class="form-contro" placeholder="Введите age">
                <p>Email</p>
                <input type="text" name="email" class="form-contro" placeholder="Введите email">
                <br>
                <input type="submit" name="OK" class="form-control" value="registration"><br>
                <a href="../index.php">Login</a><br>
            </form>
        </div>
    </body>
</html>


