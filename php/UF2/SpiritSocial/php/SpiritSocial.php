<?php
    session_start(); //Iniciar una nueva sesión o reanudar la existente
?>

<?php
    // Declaracion de variables:
    $Username=$Password="";                   //Variables Usuario y Contraseña
    $UsernameError=$PasswordError=$Error="";  //Variables de Errpr de Usuario y Contraseña
    $MostarE=false;                           //Variable para mostar el error o no

    require("SpiritSocial_Functions.php");    //Incluir funciones

    if (isset($_SESSION["login"]) && $_SESSION["login"]==true){   // Si ya esta hecho login enviar siempre a la pagina restringida
                                                                  // Y si se cierra navegador volver a login
        
            header('Location:SpiritSocial_Login_OK.php');     
          
    }                                                            
    

    if (isset($_COOKIE["CookieUser"]) && $_COOKIE["CookiePassword"]){ // Cookie para mantener seccion abiera el tiempo que se desea aunque se cierra la pagina
        if(checklogin($_COOKIE["username"],$_COOKIE["password"])){
        //if(($_COOKIE["CookieUser"]=="sdk") && ($_COOKIE["CookiePassword"]==md5("Sdk1234!"))){ // Si el usuario y la contraseña son correctos guardar Cookie
            $_SESSION["login"]=true;
            $_SESSION["ValidUser"]=$_COOKIE["CookieUser"];
            $_SESSION["ValidPassword"]=$_COOKIE["CookiePassword"];
            header('Location:SpiritSocial_Login_OK.php');
        }
        else{
            $Error="Usuario o Contraseña incorrecta";   
        }
        
    }
    if (isset($_REQUEST["Registrar"])){              //Si se aprieta el boton Registrar se envial para registarse en la pagina
        header('Location:SpiritSocial_SignUp.php');
    }

    if(isset($_REQUEST['submit'])){  // si se intenta acceder a la pagina se verifica que todo es correcto antes de acceder.
            if (empty($_REQUEST["username"])) {  //Usuario Vacio envia error
                $UsernameError = "Rellena el usuario.";
            }
            else{
                $Username = test_input($_REQUEST["username"]);
            }

            if (empty($_REQUEST["password"])) { //Contraseña vacia envia error
                $PasswordError = "Rellena la contraseña.";
            }
            else{
                $Password = test_input($_REQUEST["password"]);
            }
            
            if(checklogin($_REQUEST["username"],$_REQUEST["password"])){
            //if(($_REQUEST["username"]=="sdk") && ($_REQUEST["password"]=="Sdk1234!")) { // Si U. y C. son correctos enviar a la pagina restringida y guarda variables de session
                // Código para usuarios autorizados
                $_SESSION["login"]=true;
                $_SESSION["ValidUser"]=$_REQUEST["username"];
                $_SESSION["ValidPassword"]=$_REQUEST["password"];
                if(($_REQUEST["recordar"]) && ($_REQUEST["recordar"]==1)){ //Si se clica en Recordar guarda cookie el tiempo que se desea
                    setcookie("CookiePassword",md5($_REQUEST["password"]),time()+60*60);
                    setcookie("CookieUser",$_REQUEST["username"],time()+60*60);
                }
                header('Location:SpiritSocial_Login_OK.php');
                $MostarE=false;
            }    
            else{
                // Mensaje de acceso no autorizado
                $MostarE=true;
                $Error="Usuario o Contraseña incorrecta";
                setcookie("CookieUser",0,1);
                setcookie("CookiePassword",0,1);
            }
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="../css/estilo.css" />
</head>
 
<body>
<div id="wrapper">
        <header> <!-- Encabezado -->
            <div class='define'>
            <div style= "width:200px"> <h2> Spirit Social </h2></div> 
            </div>
        </header>

        <section>  <!-- Contenido de la pagina -->
            <div class='define'>
                <div style="float:left"> <img src= "../imgs/SpiritSocial-2.jpg" alt="Logo" height="200px" width="960px"></div>
                <div id ="logo"> <img src= "../imgs/SpiritSocial.jpg" alt="Logo" height="300px" width="500px"></div>
                <form action="SpiritSocial.php" method="POST">
                    <label><b>Username:</b></label>
                    <br>      
                    <input type="text" name="username" value="<?php echo $Username;?>">
                    <span class="error">* <?php echo $UsernameError;?></span>
                    <br><br>

                    <label><b>Password:</b></label>
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

                    <label><b>Remember:</b></label>
                    <br> 
                    <input type="checkbox" name="recordar" value="1">
                    <br><br>

                    <input type="submit" name="submit" value="login">
                    <br><br>

                    <label><b>Register to Create an account:</b></label>
                    <br>
                    <input type="submit" name="Registrar" value="Sign Up">
                    <br><br>
                </form>
            </div>
        </section>
    </div>
 
    <footer>  <!-- Pie de pagina -->
        <div class='define'>
            <p>Al hacer clic en Registrar, aceptas nuestras Condiciones. Obtén más información sobre cómo recopilamos, usamos y compartimos tu información en la Política de datos, así como el uso que hacemos de las cookies y tecnologías similares en nuestra Política de cookies.</p>
        </div>
    </footer>
</body>
</html>