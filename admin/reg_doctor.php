<!DOCTYPE html>
<?php
session_start();
include('../php/connect.php');

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
       <link rel="stylesheet" type="text/css" href="../style/main.css">
    </head>
    <body style="background: none;">
        <form action="php/check_doc.php" method="POST" enctype="multipart/form-data"> 
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
                <label>spec</label>
                <input type="text" name="spec" class="form-control" placeholder="Введите name">
                <label>cab</label>
                <input type="text" name="cab" class="form-control" placeholder="Введите name">
                <button type="submit" class="btn-reg">Register</button><br>
                <!--<input type="submit" name="OK" class="form-control" value="Зарегестрироваться">-->
                <a href="../Admin.php">Back</a>
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
<?php


//$sqlinsert="INSERT INTO users (first_name,   last_name,   middle_name,   login ,   password,   email,    status,   avatar, DOB)
//VALUES '$firstName', '$lastName', '$middleName', '$login', '$pass'   , '$email', 'user'  , '$path', '$age');";
//$sqlinsert_doc="CALL c_doc('$login','$spec','$cab');";
//$dbh->query($sqlinsert);


?>


