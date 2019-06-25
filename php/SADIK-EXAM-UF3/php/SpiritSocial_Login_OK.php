<?php
    session_start();  //Iniciar una nueva sesión o reanudar la existente
?>

<?php
    //Declaracion de variables:
    $ConnectedUser=$_SESSION["ValidUser"];

    require("SpiritSocial_Functions.php");  //Incluir funciones

    if(isset($_REQUEST["Logout"])){  //Una vez el usuario clica "Logout" se borra variables de session y las cookies
        session_destroy();
        setcookie("CookieUser",0,1);
        setcookie("CookiePassword",0,1);
        header('Location:SpiritSocial.php'); // Y se envia a la pagina principal          
    }

    if(isset($_REQUEST['CheckNews'])){ //Si se clica en "CheckNews" se envia a otra pagina para consultar noticias
        header('Location:SpiritSocial_CheckNews.php');
    }

    if(isset($_REQUEST['AddNewNews'])){ //Si se clica en "AddNewNews" se envia a otra pagina para añadir noticias
        header('Location:SpiritSocial_AddNewNews.php');
    }

    if(isset($_REQUEST['ConfigureNews']) && ($ConnectedUser=="admin")){ //Si se clica en "AddNewNews" se envia a otra pagina para añadir noticias
        header('Location:SpiritSocial_ConfigureNews.php');
    }

    if(isset($_SESSION["login"]) && ($_SESSION["login"]==true)){ //si se ha hecho login verifica se U. y C. son correctos  
        

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="../css/Prueba1.css" />
</head>
 
<body>
    <div id="wrapper">
        <header>  <!-- Encabezado -->
            <div id="define">
                <div style= "width:200px"> <h2> Spirit Social </h2>   </div>
                <div style= "text-align:right"> 
                    Bienvenido.......... <?=$ConnectedUser?>  
                    <a href="SpiritSocial.php?Logout">[Logout]</a> &nbsp;&nbsp;&nbsp;&nbsp;
                </div>  
            </div>
        </header>

        <section>  <!-- Contenido de la pagina -->
            <div id="define">
                <div> <img src= "../imgs/SpiritSocial-2.jpg" alt="Logo" height="250px" width="100%"></div>
                <br><br>
                <div>
                <form action="SpiritSocial_Login_OK.php" method="POST">
                    <input type="submit" name="CheckNews" value="Check News">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" name="AddNewNews" value="Add New News">

                    <?php 
                        if ($ConnectedUser=="admin"){
                    ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" name="ConfigureNews" value="Configure News">
                    <?php 
                        }
                    ?>
                    <br><br>
                </form>
                </div>
                <div> <img src= "../imgs/SpiritSocial.jpg" alt="Logo" height="400px" width="700px"></div>
            </div>
        </section>
    </div>
 
    <footer>  <!-- Pie de pagina -->
        <div id="define">
            <p>Al hacer clic en Registrar, aceptas nuestras Condiciones. Obtén más información sobre cómo recopilamos, usamos y compartimos tu información en la Política de datos, así como el uso que hacemos de las cookies y tecnologías similares en nuestra Política de cookies.</p>
        </div>
    </footer>

<?php  
            
    }else{
        header('Location:SpiritSocial.php');           
    }
?>
</body>
</html>