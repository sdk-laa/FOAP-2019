<?php
    session_start();  //Iniciar una nueva sesión o reanudar la existente
?>

<?php
    // Declaracion de variables:
    $comment1=$comment2=$comment3=$comment4="";

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

    if(isset($_SESSION["login"]) && ($_SESSION["login"]==true)){ //si se ha hecho login verifica se U. y C. son correctos  
        
        //if(($_SESSION["ValidUser"]=="sdk") && ($_SESSION["ValidPassword"]==md5("Sdk1234!"))){  // Si U. y C. son correctos muestra el contenido
            if (!empty($_POST["Comment1"])) { //si hay comentario guardalo
                $comment1 = test_input($_POST["Comment1"]);
            }
            if (!empty($_POST["Comment2"])) {
                $comment2 = test_input($_POST["Comment2"]);
            } 
            if (!empty($_POST["Comment3"])) {
                $comment3 = test_input($_POST["Comment3"]);
            }
            if (!empty($_POST["Comment4"])) {
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
                <div style= "width:200px"> <h2> Spirit Social </h2>   </div>
                <div style= "text-align:right"> 
                    Bienvenido.......... <?=$_SESSION["ValidUser"]?>  
                    <a href="SpiritSocial_Login_OK.php?Logout">[Logout]</a> 
                </div>  
            </div>
        </header>

        <section>  <!-- Contenido de la pagina -->
            <div class='define'>
                <div style="float:left"> <img src= "../imgs/SpiritSocial-2.jpg" alt="Logo" height="150px" width="960px"></div>
                <div id ="logo"> <img src= "../imgs/SpiritSocial.jpg" alt="Logo" height="300px" width="500px"></div>
                <br><br>
                <br><br>
                <div>
                <br><br>
                <br><br>
                <form action="SpiritSocial_Login_OK.php" method="POST">
                    <br><br>
                    <br><br>
                    <input type="submit" name="CheckNews" value="Check News">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" name="AddNewNews" value="Add New News">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" name="RemoveNews" value="Remove News">
                    <br><br>
                    <br><br>
                </form>
                </div>
            </div>
        </section>
    </div>
 
    <footer>  <!-- Pie de pagina -->
        <div class='define'>
            <p>Al hacer clic en Registrar, aceptas nuestras Condiciones. Obtén más información sobre cómo recopilamos, usamos y compartimos tu información en la Política de datos, así como el uso que hacemos de las cookies y tecnologías similares en nuestra Política de cookies.</p>
        </div>
    </footer>

    <?php  
            
        }
        else{
            header('Location:SpiritSocial.php');           
        }
    ?>
</body>
</html>