<?php
session_start();
unset($_SESSION['usr']);
unset($_SESSION['admin']);
unset($_SESSION['doctor']);
header('Location: ../index.php')
?>