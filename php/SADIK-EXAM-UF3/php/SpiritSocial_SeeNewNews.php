<?php
    session_start();  //Iniciar una nueva sesión o reanudar la existente
?>

<?php
    // Declaracion de variables:
    $Title=$Description=$Image="";

    require("SpiritSocial_Functions.php");  //Incluir funciones
        
        if(isset($_REQUEST["Logout"])){  //Una vez el usuario clica "Logout" se borra variables de session y las cookies
            session_destroy();
            setcookie("CookieUser",0,1);
            setcookie("CookiePassword",0,1);
            header('Location:SpiritSocial.php');           
        } 

        if(isset($_REQUEST['Menu'])){  //Si se clica en "Main Menu" Vuelve al muro de publicaciones
            header('Location:SpiritSocial_Login_OK.php');
        }

        if(isset($_SESSION["login"]) && ($_SESSION["login"]==true)){  //Si se ha hecho login verifica se U. y C. son correctos 
            //if(($_SESSION["ValidUser"]=="sdk") && ($_SESSION["ValidPassword"]==md5("Sdk1234!"))){  //Si U. y C. son correctos muestra el contenido
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
                    <div style= "width:200px"> <h2> Spirit Social </h2></div>
                    <div style= "text-align:right"> 
                        <?=$_SESSION["ValidUser"]?>
                        <a href="SpiritSocial.php?Logout">[Logout]</a>
                    </div> 
                </div>
            </header>

            <section>  <!-- Contenido de la pagina -->
                <div id="define">
                    <div>
                    <form action="SpiritSocial_SeeNewNews.php" method="POST">
                        <input type="submit" name="Menu" value="Menu">
                        <br><br>
                        <br><br>
                    </div> 
                    <div id="Centrado">
                        <?php
                                $Image=$_SESSION["Image"]; 
                        ?> 
                                <p><h1><span class="titulo"> <?=$_SESSION["Title"]?>:</span></h1></p>
                                <p><span> <?=$_SESSION["Description"]?>.</span></p> 
                        <?php
                                echo "<br>";
                                echo "<img src=\"$Image\" alt='Logo' height='500px' width='900px'>";
                        ?>
                        <br><br>
                        Author: <?= $_SESSION["ValidUser"];?>

                        <br><br>
                        <br><br>
                        <input type="submit" name="AddNewsToWall" value="Add News To Wall">
                    </div>
                    </form>
                </div>
            </section>
        </div>
        <?php    
            
        }
        else{
            header('Location:SpiritSocial.php');           
        }
        if(isset($_REQUEST["AddNewsToWall"])){

            $User=$_SESSION["ValidUser"];
            $Titulo=$_SESSION["Title"];
            $Descripcion=$_SESSION["Description"];
            
            $con=ConnectDB();
            $SqlNoticia = "insert into noticias (Titulo, Descripcion, RutaImagen, Autor) values ('$Titulo', '$Descripcion', '$Image', '$User')";
            $ResultatNoticia = mysqli_query($con,$SqlNoticia) or die('Consulta fallida: ' . mysqli_error($con));
            CloseDB($con);
            header('Location:SpiritSocial_CheckNews.php');
        }
        ?>        
    
        <footer>  <!-- Pie de pagina -->
            <div id="define">
                <p>Al hacer clic en Registrar, aceptas nuestras Condiciones. Obtén más información sobre cómo recopilamos, usamos y compartimos tu información en la Política de datos, así como el uso que hacemos de las cookies y tecnologías similares en nuestra Política de cookies.</p>
            </div>
        </footer>

    </body>
</html>