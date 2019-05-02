<?php
    session_start();
    print("");
    if(isset($_REQUEST["logout"])){
        session_destroy(); 
        header('Location:Ejercicio5_bis(Sesiones).php');           
    }
    if(isset($_SESSION["login"])){
?>
    Bienvenido......<?=$_SESSION["nom"]?>

    <a href="ejemplo_privado.php?logout">[logout]</a>
<?php
    }else{
        header('Location:Ejercicio5_bis(Sesiones).php');           
    }
?>