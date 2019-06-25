<?php
    session_start();  //Iniciar una nueva sesión o reanudar la existente
?>

<?php
    // Declaracion de variables:
    $Title=$Description=$Image=$comment4="";

    require("SpiritSocial_Functions.php");  //Incluir funciones
        
        if(isset($_REQUEST["Logout"])){  //Una vez el usuario clica "Logout" se borra variables de session y las cookies
            session_destroy();
            setcookie("CookieUser",0,1);
            setcookie("CookiePassword",0,1);
            header('Location:SpiritSocial.php');           
        } 

        if(isset($_REQUEST['MainMenu'])){  //Si se clica en "Main Menu" Vuelve al muro de publicaciones
            header('Location:SpiritSocial_Login_OK.php');
        }

        if(isset($_SESSION["login"]) && ($_SESSION["login"]==true)){  //Si se ha hecho login verifica se U. y C. son correctos 
            if(($_SESSION["ValidUser"]=="sdk") && ($_SESSION["ValidPassword"]==md5("Sdk1234!"))){  //Si U. y C. son correctos muestra el contenido
                if (!empty($_POST["Comment4"])) { //Si hay comentario muestralo
                    $comment4 = test_input($_POST["Comment4"]);
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
            <header>  <!-- Encabezado -->
                <div class='define'>
                    <div style= "width:200px"> <h2> Spirit Social </h2></div>
                    <div style= "text-align:right"> 
                        <?=$_SESSION["ValidUser"]?>
                        <a href="SpiritSocial_Login_OK.php?Logout">[Logout]</a>
                    </div> 
                </div>
            </header>

            <section>  <!-- Contenido de la pagina -->
                <div class='define'>
                    <div>
                    <form action="SpiritSocial_SeeNewPub.php" method="POST">
                        <input type="submit" name="MainMenu" value="Main Menu">
                        <br><br>
                        <br><br>
                    </div> 
                    <div>
                        <?php
                                $Image=$_SESSION["Image"]; 
                        ?> 
                                <p><h1><span class="titulo"> <?=$_SESSION["Title"]?>:</span></h1></p>
                                <p><span> <?=$_SESSION["Description"]?>.</span></p> 
                        <?php
                                echo "<br>";
                                echo "<img src=\"$Image\">";
                        ?>
                                <script language="javascript">
                                    var LikeCount_4 = 0;
                                    function contador4(){
                                        LikeCount_4 = LikeCount_4 + 1;
                                        var btn = document.getElementById("boton4");
                                        btn.value = "Like (" + LikeCount_4 + ")";
                                        <?php echo("LikeCount_4");?>
                                    }
                                </script>
                                <p><input type="button" id="boton4" value="Like" onclick="javascript: contador4()" /></p> 
                                <p><span> Comment:</span></p>
                                <p><input type="text" name="Comment4" size="50" maxlength="100" value="<?php echo $comment4;?>"></p>
                                <p><input type="submit" name="AddComment4" value="Add Comment"></p> 
                                <?php 
                                    if(isset($_REQUEST["AddComment4"])){
                                        echo $comment4;
                                    } 
                                ?>  
                                <!--<textarea name="comment" rows="5" cols="60"></textarea>-->
                                <br><br>
                                <br><br>
                        <input type="submit" name="AddPubToWall" value="Add Pub To Wall">
                    </div>
                    </form>
                </div>
            </section>
        </div>
        <?php    
            }
        }
        else{
            header('Location:SpiritSocial.php');           
        }
        if(isset($_REQUEST["AddPubToWall"])){
            $_SESSION["Add Pub To Wall"] = true;
            header('Location:SpiritSocial_Login_OK.php');
        }
        else{
            $_SESSION["Add Pub To Wall"] = false;
        }
        ?>        
    
        <footer>  <!-- Pie de pagina -->
            <div class='define'>
                <p>Al hacer clic en Registrar, aceptas nuestras Condiciones. Obtén más información sobre cómo recopilamos, usamos y compartimos tu información en la Política de datos, así como el uso que hacemos de las cookies y tecnologías similares en nuestra Política de cookies.</p>
            </div>
        </footer>

    </body>
</html>