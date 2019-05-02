<?php
    session_start();
    print("");
    if(isset($_REQUEST["logout"])){
        session_destroy(); 
        header('Location:Ejercicio5_bis(Sesiones).php');           
    }
    if(isset($_SESSION["login"])){
?>
    Bienvenido......<?=$_SESSION["nombre"]?>

    <a href="Ejercicio5_bis(Sesiones)_OK.php?logout">[logout]</a>
<?php
    }else{
        header('Location:Ejercicio5_bis(Sesiones).php');           
    }
?>