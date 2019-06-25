<?php
    session_start();  //Iniciar una nueva sesión o reanudar la existente
?>

<?php
    // Declaracion de variables:
    $Title=$Description=$Image="";
    //$id_noticia=$_GET["id_noticia"];
    $ConnectedUser=$_SESSION["ValidUser"];
    $User=$_GET["Autor"];

    require("SpiritSocial_Functions.php");  //Incluir funciones
        
        if(isset($_REQUEST["Logout"])){  //Una vez el usuario clica "Logout" se borra variables de session y las cookies
            session_destroy();
            setcookie("CookieUser",0,1);
            setcookie("CookiePassword",0,1);
            header('Location:SpiritSocialLogin_OK.php');           
        } 

        if(isset($_REQUEST['Menu'])){  //Si se clica en "Main Menu" Vuelve al menu
            header('Location:SpiritSocial_Login_OK.php');   // fallo no encuentra la pagina
        }

        if(isset($_REQUEST['CheckNews'])){  //Si se clica en "CheckNews" Vuelve al muro de noticias
            header('Location:SpiritSocial_CheckNews.php');   // fallo no encuentra la pagina
        }

        if(isset($_REQUEST['ConfigureNews'])){  //Si se clica en "CheckNews" Vuelve al muro de noticias
            header('Location:SpiritSocial_ConfigureNews.php');   // fallo no encuentra la pagina
        }

        if(isset($_SESSION["login"]) && ($_SESSION["login"]==true)){  //Si se ha hecho login verifica se U. y C. son correctos 
                $con=connectDB();
                $id_noticia=$_GET["id_noticia"];
                $Read = "SELECT * FROM noticias WHERE id_noticia='$id_noticia'";
                $ResultatRead = mysqli_query($con,$Read) or die('Consulta fallida: ' . mysqli_error($con));
                CloseDB($con);
                $ReadNews = $ResultatRead->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="../../css/Prueba1.css" />
    </head>
 
    <body>
        <div id="wrapper">
            <header>  <!-- Encabezado -->
                <div id="define">
                    <div style= "width:200px"> <h2> Spirit Social </h2></div>
                    <div style= "text-align:right"> 
                        <?=$_SESSION["ValidUser"]?>
                        <a href="SpiritSocialLogin_OK.php?Logout">[Logout]</a>
                    </div> 
                </div>
            </header>

            <section>  <!-- Contenido de la pagina -->
                <div id="define">
                    <div>
                    <form action="../SpiritSocial-Read.php/?id_noticia=<?= $_GET['id_noticia'];?>" method="POST">
                        <input type="submit" name="Menu" value="Menu">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" name="CheckNews" value="Check News">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" name="ConfigureNews" value="Configure News">
                        <br><br>
                        <br><br>
                    </div> 
                    <div id="Centrado">
                        <?php
                                $Image="../".$ReadNews["RutaImagen"]; 
                        ?> 
                                <p><h1><span class="titulo"> <?=$ReadNews["Titulo"]?>:</span></h1></p>
                                <p><span> <?=$ReadNews["Descripcion"]?>.</span></p> 
                        <?php
                                echo "<br>";
                                echo "<img src=\"$Image\" alt='Logo' height='500px' width='900px'>";
                        ?>
                        <div style="text-align: left">Author: <?= $User;?></div>                      
                        <div style="text-align: right">
                            <a href="../SpiritSocial-Update.php/?id_noticia=<?= $noticias['id_noticia'];?>">Update News</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="../SpiritSocial-Delete.php/?id_noticia=<?= $noticias['id_noticia'];?>">Delete News</a>
                        </div>
                        <br><br>
                        <br><br>
                    </div>
                    </form>
                </div>
            </section>
        </div>
        <?php    
            
        }
        else{
            header('Location:../SpiritSocial.php');           
        }
        ?>        
    
        <footer>  <!-- Pie de pagina -->
            <div id="define">
                <p>Al hacer clic en Registrar, aceptas nuestras Condiciones. Obtén más información sobre cómo recopilamos, usamos y compartimos tu información en la Política de datos, así como el uso que hacemos de las cookies y tecnologías similares en nuestra Política de cookies.</p>
            </div>
        </footer>

    </body>
</html>