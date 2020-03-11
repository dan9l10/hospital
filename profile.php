
<?php
session_start();
if(!isset($_SESSION['usr'])){
    header('Location: index.php') ;
}
include 'php/connect.php';
if(isset($_SESSION['usr'])){
    echo $_SESSION['usr']['name'];
    echo $_SESSION['usr']['email'];
}

?>
<a href="php/exit.php">Exit</a>
