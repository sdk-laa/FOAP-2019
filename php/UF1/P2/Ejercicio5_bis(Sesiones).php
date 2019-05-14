<?php
session_start();
?>

<?php
    $Usuario = $Contraseña="";
    $ErrorUsuario = $ErrorContraseña = $Error="";
    $MostarF=false;

    if (isset($_SESSION["login"]) && $_SESSION["login"]==true){   // Si ya esta hecho login enviar siempre a la pagina restringida
        if(($_SESSION["ValidUser"]==md5("sdk")) && ($_SESSION["ValidPassword"]==md5("1234"))){
            header('Location:Ejercicio5_bis(Sesiones)_OK.php');
        }
             
    }
    // Si se cierra navegador volver a login

    if (isset($_COOKIE["CookieUser"]) && $_COOKIE["CookiePassword"]){ // Cookie para mantener seccion abiera el tiempo que se desea aunque se cierra la pagina
        if(($_COOKIE["CookieUser"]=="sdk") && ($_COOKIE["CookiePassword"]==md5("1234"))){ // Si el usuario y la contraseña son cuardar Cookie
            $_SESSION["login"]=true;
            $_SESSION["ValidUser"]=$_COOKIE["CookieUser"];
            $_SESSION["ValidPassword"]=$_COOKIE["CookiePassword"];
            //$_SESSION["nombre"]=$_COOKIE["CookieUser"];
            header('Location:Ejercicio5_bis(Sesiones)_OK.php');
        }
        else{
            $Error="Usuario o Contraseña incorrecta";    
        }
        
    }

    if(isset($_REQUEST['submit'])){
            if (empty($_REQUEST["username"])) {
                $ErrorUsuario = "Rellena el usuario.";
            }
            else{
                $Usuario = test_input($_REQUEST["username"]);
            }

            if (empty($_REQUEST["password"])) {
                $ErrorContraseña = "Rellena la contraseña.";
            }
            else{
                $Contraseña = test_input($_REQUEST["password"]);
            }

            if(($_REQUEST["username"]=="sdk") && ($_REQUEST["password"]=="1234")) { // Si U o C son correctos enviar a la pagina restringida
                $_SESSION["login"]=true;
                $_SESSION["ValidUser"]="sdk";
                $_SESSION["ValidPassword"]=md5("1234");
                $_SESSION["nombre"]=$_REQUEST["username"];
                if(($_REQUEST["recordar"]) && ($_REQUEST["recordar"]==1)){
                    setcookie("CookiePassword",md5($_REQUEST["password"]),time()+60*60);
                    setcookie("CookieUser",$_REQUEST["username"],time()+60*60);
                }
                header('Location:Ejercicio5_bis(Sesiones)_OK.php');
                $MostarF=false;
                // Código para usuarios autorizados
            }    
            else{
                $MostarF=true;
                setcookie("CookieUser",0,1);
                setcookie("CookiePassword",0,1);
                // Mensaje de acceso no autorizado
            }

        
    }
    function test_input($data) {          // funcion para ajustar string
        $data = trim($data);              // eliminar espacios
        $data = stripslashes($data);      // eliminar barras....
        $data = htmlspecialchars($data);  // eliminar caracteres especiales...
        return $data;
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
            .error {color: #FF0000;}
        </style>
    <title>Document</title>
</head> 
    <body>
        <h2>Ejemplo de validación de Usuario PHP</h2>
        <?php
            if ($MostarF==true){
                //Mostrar Error los datos son incorrectos     
        ?>
        <p> <span class="error">* Usuario o contraseña incorrecta </span></p>
        <?php
        }
        ?>
        <?//=$Error?>
        
        
        <form action="Ejercicio5_bis(Sesiones).php" method="POST">
                <label>Usuario:</label>     
                <input type="text" name="username" value="<?php echo $Usuario;?>">
                <span class="error">* <?php echo $ErrorUsuario;?></span>
                <br><br>
                
                <label>Contraseña:</label> 
                <input type="password" name="password" value="<?php echo $Contraseña;?>">
                <span class="error">* <?php echo $ErrorContraseña;?></span>
                <br><br>

                <label>Recordar:</label> 
                <input type="checkbox" name="recordar" value="1">
                <br><br>

                <input type="submit" name="submit" value="Login">
        </form>
    </body>
</html>