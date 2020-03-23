<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['usr'])){
    header('Location: Patient.php') ; 
}elseif(isset($_SESSION['admin'])){
    header('Location: Admin.php') ; 
}elseif(isset($_SESSION['doctor'])){
    header('Location: Doctor.php') ;
}
include('php/connect.php');
?>
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
    </body>
</html>

