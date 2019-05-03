<?php
    session_start();
?>
<?php
    if(isset($_REQUEST["Logout"])){
        session_destroy();
        setcookie("CookieUser",0,1);
        setcookie("CookiePassword",0,1);
        header('Location:Formulario_EX.php');           
    }
    if(isset($_SESSION["login"]) && ($_SESSION["login"]==true)){
        if(($_SESSION["ValidUser"]=="sdk") && ($_SESSION["ValidPassword"]==md5("1234"))){

        
?>
<html>
    <body>
        Bienvenido......<?=$_SESSION["ValidUser"]?>
        <a href="Login_OK_EX.php?Logout">[Logout]</a>

        <br><br>
        <input type="submit" name="Consultar Noticias" value="Consultar Noticias">
        <br><br>
        <input type="submit" name="Insertar Noticias" value="Insertar Noticias">
        <br><br>
        <input type="submit" name="Eliminar Noticias" value="Eliminar Noticias">
        <br><br>
       
        <?php
            }
        }
        else{
            header('Location:Formulario_EX.php');           
        }
        
        ?>
    <body>
<html>
    