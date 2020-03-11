<?php
session_start();
unset($_SESSION['usr']);
header('Location: ../index.php')
?>