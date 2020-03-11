<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['usr'])){
    header('Location: ../profile.php') ; 

}
include('connect.php');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../style/main.css">
    </head>
    <body>
        <form action="check.php" method="POST" enctype="multipart/form-data"> 
                <h1>Registration</h1>
                <label>Login</label>
                <input type="text" name="login" class="form-control" placeholder="Введите логин">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Введите пароь">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Введите name">
                <label>Age</label>
                <input type="text" name="age" class="form-control" placeholder="Введите age">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Введите email">
                <label>Image</label>
                <input type="file" name="avatar">
                <button type="submit" class="btn-reg">Register</button><br>
                <!--<input type="submit" name="OK" class="form-control" value="Зарегестрироваться">-->
                <a href="../index.php">Login</a>
                <p class="mg">
                    <?php
                    if (isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                    }
                    
                    ?>
                
            </form>
        
    </body>
</html>


