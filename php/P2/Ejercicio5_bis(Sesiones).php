<?php
session_start();
?>

<?php
$Error="";
$MostarF=true;
   if(isset($_REQUEST['submit'])){
        if(($_REQUEST["username"]=="sdk") && ($_REQUEST["password"]=="1234")) {
            $_SESSION["login"]=true;
            $_SESSION["nom"]=$_REQUEST["username"];      
            header('Location:Ejercicio5_bis(Sesiones)_OK.php');
            // Código para usuarios autorizados
        }    
        else{
            <p> <class="error">.$Error=<span class =error>"Usuario o contraseña incorrecta"<\span>;
            //print ("<p>  class="error".$Error no está en formato europeo</p>\n"); //hay corregir el error de esta linea
            $Error="Usuario o contraseña incorrecta.";
            // Mensaje de acceso no autorizado
        }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head> 
    <body>

        <?=$Error?>
        

        <form action="Ejercicio5_bis(Sesiones).php" method="POST">
                Usuario:    <input type="text" name="username" id=""><br>
                Contraseña: <input type="password" name="password" id=""><br> 

                <input type="submit" name="submit" value="OK">

        </form>
    </body>
</html>