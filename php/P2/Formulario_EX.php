<?php
    session_start();
?>

<?php
    $Usuario = $Contraseña="";
    $UsuarioError = $ContraseñaError = $Error="";
    $MostarF=false;

    if (isset($_SESSION["login"]) && $_SESSION["login"]==true){   // Si ya esta hecho login enviar siempre a la pagina restringida
        if(($_SESSION["ValidUser"]=="sdk") && ($_SESSION["ValidPassword"]==md5("1234"))){
            header('Location:Login_OK_EX.php');
        }
             
    }
    // Si se cierra navegador volver a login

    if (isset($_COOKIE["CookieUser"]) && $_COOKIE["CookiePassword"]){ // Cookie para mantener seccion abiera el tiempo que se desea aunque se cierra la pagina
        if(($_COOKIE["CookieUser"]=="sdk") && ($_COOKIE["CookiePassword"]==md5("1234"))){ // Si el usuario y la contraseña son cuardar Cookie
            $_SESSION["login"]=true;
            $_SESSION["ValidUser"]=$_COOKIE["CookieUser"];
            $_SESSION["ValidPassword"]=$_COOKIE["CookiePassword"];
            //$_SESSION["nombre"]=$_COOKIE["CookieUser"];
            header('Location:Login_OK_EX.php');
        }
        else{
            $Error="Usuario o Contraseña incorrecta";    
        }
        
    }
    if (isset($_REQUEST["Registrar"])){
        header('Location:Registro_EX.php');
    }

    if(isset($_REQUEST['submit'])){
            if (empty($_REQUEST["username"])) {
                $UsuarioError = "Rellena el usuario.";
            }
            else{
                $Usuario = test_input($_REQUEST["username"]);
            }

            if (empty($_REQUEST["password"])) {
                $ContraseñaError = "Rellena la contraseña.";
            }
            else{
                $Contraseña = test_input($_REQUEST["password"]);
            }

            if(($_REQUEST["username"]=="sdk") && ($_REQUEST["password"]=="1234")) { // Si U o C son correctos enviar a la pagina restringida
                $_SESSION["login"]=true;
                $_SESSION["ValidUser"]="sdk";
                $_SESSION["ValidPassword"]=md5("1234");
                //$_SESSION["nombre"]=$_REQUEST["username"];
                if(($_REQUEST["recordar"]) && ($_REQUEST["recordar"]==1)){
                    setcookie("CookiePassword",md5($_REQUEST["password"]),time()+60*60);
                    setcookie("CookieUser",$_REQUEST["username"],time()+60*60);
                }
                header('Location:Login_OK_EX.php');
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
        <!--<style>
            .error {color: #FF0000;}
        </style> -->
    <link rel="stylesheet" type="text/css" href="../../CSS/estiloT.css" />
    <title>Pagina de noticias PHP</title>
    
</head>
    <body>
   
        <h2><p><span class="Titulo"> Noticias </span></p></h2>
        

        <form action="Formulario_EX.php" method="POST">

            <label>Usuario:</label>
            <br>      
            <input type="text" name="username" value="<?php echo $Usuario;?>">
            <span class="error">* <?php echo $UsuarioError;?></span>
            <br><br>

            <label>Contraseña:</label>
            <br>  
            <input type="password" name="password" value="<?php echo $Contraseña;?>">
            <span class="error">* <?php echo $ContraseñaError;?></span>
            <br><br>

            <label>Recordar:</label>
            <br> 
            <input type="checkbox" name="recordar" value="1">
            <br><br>

            <input type="submit" name="submit" value="Login">
            <br><br>

            <label>Registrarte para Crear una cuenta:</label>
            <br>
            <input type="submit" name="Registrar" value="Registrar">
            
            
        </form>
    </body>
</html>