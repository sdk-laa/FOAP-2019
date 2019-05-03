<?php
    session_start();
?>
<?php
    if(isset($_REQUEST["logout"])){
        session_destroy();
        setcookie("CookieUser",0,1);
        setcookie("CookiePassword",0,1);
        header('Location:Formulario_EX.php');           
    }
    if(isset($_SESSION["login"]) && ($_SESSION["login"]==true)){
        if(($_SESSION["ValidUser"]=="sdk") && ($_SESSION["ValidPassword"]==md5("1234"))){

        
?>
        Bienvenido......<?=$_SESSION["ValidUser"]?>

        <input type="submit" name="Registrar" value="Registrar">
        <input type="submit" name="submit" value="Login">
        <a href="Login_OK_EX.php?logout">[logout]</a>
<?php
        }
    }
    else{
        header('Location:Formulario_EX.php');           
    }
?>