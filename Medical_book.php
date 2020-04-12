<?php
include 'php/connect.php';
session_start();
if(!isset($_SESSION['doctor'])){
    header('Location: index.php');
}
$id=intval($_GET['id']);
$sql="SELECT users.first_name,users.middle_name,users.last_name,patient.FilePath,users.DOB,users.Email,patient.Plurography,users.Avatar FROM users LEFT JOIN patient on(patient.id=users.id) WHERE patient.id=$id";
$result=$dbh->prepare($sql);
$result->execute();
$result=$result->fetch();
if(is_bool($result))
{
    echo("Пользователь не существует, или отсутвует его мед книга, обратитесь к админитсратору");
    exit();
}
//print_r($result);
//echo($id);
$PatientData="";
$file = fopen($result[3], 'rt');
    if ($file)
    {
        while (!feof($file))
        {
            $mytext = fgets($file, 999);
            $PatientData=$PatientData.$mytext;
        }
    }
    else 
    {
        $mytext="Ошибка при открытии файла";
    }
    fclose($file);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hospital</title>
        <link rel="stylesheet" type="text/css" href="style/profile.css" >
    </head>
    
    <body>
        <header>
                <a href="#" onclick="javascript:location.reload()">Обновить данные медецинской книги </a>   
                <a href="#"  onclick="javascript:CloseWindow()">Close</a>  
        </header>
        <!-- Тело с данными -->
        <div id="body" align="middle " style="margin:auto;margin-top:1%;width:80%">
                <?php
                $AvatarPic="";
                if (file_exists(($result['Avatar'])))
                {$AvatarPic=$result['Avatar'];}
                else
                {$AvatarPic="src/defaultUserPicture.jpg";}
                
                echo(file_exists($result[6]));
                echo("
                        <div style=\"margin-bottom:4%;width:80%\">
                        <img src=\"$AvatarPic\" align=\"left\" width=\"200\" > 
                        <p style=\"margin:1%;\"><h1>Пациент</h1></p>
                        <p style=\"margin:0.5%;\"><b >ФИО:</b>   $result[first_name] $result[middle_name] $result[last_name] </p>
                        <p style=\"margin:0.5%;\"><b>Дата рождения</b>   $result[DOB]  </p>
                        <p style=\"margin:0.5%;\"><b>Email:</b>   $result[Email] </p>
                        <p style=\"margin:0.5%;\"><b>Флюрография:</b><b id=\"Plurography\"></b>$result[Plurography]<div id=\"calendar\"></div>
                        <button  onclick=\"javascript:updatePlurographi($id)\" >Обновить данные</button></p> 
                             </div>
                    ");
                ?>
                <div align="right">
                <?php
                echo("<textarea  style=\"margin:auto; margin-bottom:1%; width:100%\"  name=\"date\"    rows=\"40\" readonly >$PatientData </textarea>
                      <p style=\"margin:0.5%;\"> Новая запись для  $result[first_name] $result[middle_name] $result[last_name] </p>
                      <textarea  id=\"NewText\" style=\"margin:auto; width:100%;  margin-bottom:1%;\"  name=\"date\"    rows=\"10\"  > </textarea>
                      <button  style=\"width:200px;height:75px;\" align=\"right\" onclick=\"javascript:addDataToMedBook('$result[FilePath]')\">Внести данные</button> " );
                ?>
                </div>
        </div>
        <script src="JS/JavaScript.js"></script>
    </body>
</html>
