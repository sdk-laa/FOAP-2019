<?php
    session_start();
?>

<?php
     // Declaracion de variables:
    $Username=$Password="";                   //Variables Usuario y Contraseña
    $UsernameError=$PasswordError=$Error="";  //Variables de Errpr de Usuario y Contraseña
    $MostarE=false;                           //Variable para mostar el error o no

    if (isset($_SESSION["login"]) && $_SESSION["login"]==true){   // Si ya esta hecho login enviar siempre a la pagina restringida
        if(($_SESSION["ValidUser"]=="sdk") && ($_SESSION["ValidPassword"]==md5("Sdk1234!"))){
            header('Location:SpiritSocial_Login.php');
        }       
    }                                                            // Si se cierra navegador volver a login
    

    if (isset($_COOKIE["CookieUser"]) && $_COOKIE["CookiePassword"]){ // Cookie para mantener seccion abiera el tiempo que se desea aunque se cierra la pagina
        if(($_COOKIE["CookieUser"]=="sdk") && ($_COOKIE["CookiePassword"]==md5("Sdk1234!"))){ // Si el usuario y la contraseña son correctos guardar Cookie
            $_SESSION["login"]=true;
            $_SESSION["ValidUser"]=$_COOKIE["CookieUser"];
            $_SESSION["ValidPassword"]=$_COOKIE["CookiePassword"];
            header('Location:SpiritSocial_Login.php');
        }
        else{
            $Error="Usuario o Contraseña incorrecta";   
        }
        
    }
    if (isset($_REQUEST["Registrar"])){              //Si se aprieta el boton Registrar se envial para registarse en la pagina
        header('Location:SpiritSocial_SignUp.php');
    }

    if(isset($_REQUEST['submit'])){
            if (empty($_REQUEST["username"])) {
                $UsernameError = "Rellena el usuario.";
            }
            else{
                $Username = test_input($_REQUEST["username"]);
            }

            if (empty($_REQUEST["password"])) {
                $PasswordError = "Rellena la contraseña.";
            }
            else{
                $Password = test_input($_REQUEST["password"]);
            }

            if(($_REQUEST["username"]=="sdk") && ($_REQUEST["password"]=="Sdk1234!")) { // Si U o C son correctos enviar a la pagina restringida
                $_SESSION["login"]=true;
                $_SESSION["ValidUser"]="sdk";
                $_SESSION["ValidPassword"]=md5("Sdk1234!");
                //$_SESSION["nombre"]=$_REQUEST["username"];
                if(($_REQUEST["recordar"]) && ($_REQUEST["recordar"]==1)){
                    setcookie("CookiePassword",md5($_REQUEST["password"]),time()+60*60);
                    setcookie("CookieUser",$_REQUEST["username"],time()+60*60);
                }
                header('Location:SpiritSocial_Login.php');
                $MostarE=false;
                // Código para usuarios autorizados
            }    
            else{
                $MostarE=true;
                $Error="Usuario o Contraseña incorrecta";
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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="../CSS/estilo.css" />
</head>
 
<body>
<div id="wrapper">
        <header>
            <div class='define'>
            <div style= "width:200px"> <h2> Spirit Social </h2></div> 
            </div>

        </header>


        <section>
            <div class='define'>
                <div id ="logo"> <img src= "../imgs/SpiritSocial.jpg" alt="Logo" height="450px" width="500px"></div>
                <form action="SpiritSocial.php" method="POST">

                    <label>Username:</label>
                    <br>      
                    <input type="text" name="username" value="<?php echo $Username;?>">
                    <span class="error">* <?php echo $UsernameError;?></span>
                    <br><br>

                    <label>Password:</label>
                    <br>  
                    <input type="password" name="password" value="<?php echo $Password;?>">
                    <span class="error">* <?php echo $PasswordError;?></span>
                    <br>
                        <?php
                            if($MostarE==true){   
                        ?>
                                <span class="error">* <?php echo $Error;?></span>
                        <?php    
                            }
                        ?> 

                    <br><br>    
                    <label>Remember:</label>
                    <br> 
                    <input type="checkbox" name="recordar" value="1">
                    <br><br>

                    <input type="submit" name="submit" value="login">
                    <br><br>

                    <label>Register to Create an account:</label>
                    <br>
                    <input type="submit" name="Registrar" value="Sign Up">
                    <br>
                    
                </form>
                <!--<div style="float:left"> <img src= "../imgs/redesS.png" alt="Logo" height="750px" width="400px"></div>-->
            </div>
        </section>
    </div>
 
    <footer>
        <div class='define'>
            <p>Contenido del pie de página</p>
        </div>
    </footer>
</body>
</html>