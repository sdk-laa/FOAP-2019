<?php
    session_start();
?>
<?php
    if(isset($_REQUEST["logout"])){
        session_destroy(); 
        header('Location:Ejercicio5_bis(Sesiones).php');           
    }
    if(isset($_SESSION["login"])){
        $cookie_name = "ValidUser";
        $cookie_value = "sdk";
        setcookie($cookie_name, $cookie_value, time() + (20), "/"); // 86400 = 1 day

?>
        Bienvenido......<?=$_SESSION["nombre"]?>

        <a href="Ejercicio5_bis(Sesiones)_OK.php?logout">[logout]</a>
<?php
    }
    else{
        header('Location:Ejercicio5_bis(Sesiones).php');           
    }
?>