<?php
    session_start();
?>
<?php
    if(isset($_REQUEST["logout"])){
        session_destroy();
        setcookie("CookieUser",0,1);
        setcookie("CookiePassword",0,1);
        header('Location:Ejercicio5_bis(Sesiones).php');           
    }
    if(isset($_SESSION["login"]) && ($_SESSION["login"]==true)){
        if(($_SESSION["ValidUser"]=="sdk") && ($_SESSION["ValidPassword"]==md5("1234"))){

        
?>
        Bienvenido......<?=$_SESSION["ValidUser"]?>

        <a href="Ejercicio5_bis(Sesiones)_OK.php?logout">[logout]</a>
<?php
        }
    }
    else{
        header('Location:Ejercicio5_bis(Sesiones).php');           
    }
?>