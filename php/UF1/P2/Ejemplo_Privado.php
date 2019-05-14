<?php
session_start();
if(isset($_REQUEST["logout"])){
    session_destroy(); 
    header('Location:Ejemplo_Login.php');
             
}
if(isset($_SESSION["login"])){
?>
Bienvenido......<?=$_SESSION["nom"]?>

<a href="ejemplo_privado.php?logout">[logout]</a>
<?php
}else{
    header('Location:Ejemplo_Login.php');           
}
?>