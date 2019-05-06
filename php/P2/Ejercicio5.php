
<?php
$Error="";
$MostarF=true;
   if(isset($_REQUEST['submit'])){
        if(($_REQUEST["username"]=="sdk") && ($_REQUEST["password"]=="1234")) {      
                header('Location:Ejercicio5.OK.php');
        }    
        else{
            //<p><span class="error">* Usuario o contraseña incorrecta</span></p>
            print ("Usuario o contraseña incorrecta"); 
            //print ("<p>  class="error".$Error no está en 
                    //formato europeo</p>\n"); //hay corregir el error de esta linea
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
        

        <form action="Ejercicio5.php" method="POST">
                Usuario:    <input type="text" name="username" id=""><br>
                Contraseña: <input type="password" name="password" id=""><br> 

                <input type="submit" name="submit" value="OK">

        </form>
    </body>
</html>
