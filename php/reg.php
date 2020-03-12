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
                <h1>Регистрация</h1>
                <label>Логин</label>
                <input type="text" name="login" class="form-control" placeholder="Введите логин">
                <label>Пароль</label>
                <input type="password" name="password" class="form-control" placeholder="Введите пароь">
                <label>Имя</label>
                <input type="text" name="FirstName" class="form-control" placeholder="Введите name">
                <label>Фамилия</label>
                <input type="text" name="LastName" class="form-control" placeholder="Введите name">
                <label>Отчество</label>
                <input type="text" name="MiddleName" class="form-control" placeholder="Введите name">
                <label>Age</label>
                <input type="date" name="age" class="form-control" placeholder="Введите age"  value="2000-01-01">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Введите email">
                <label>Аватар</label>
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


