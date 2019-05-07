<?php
    session_start();
?>
<?php
    if(isset($_REQUEST["Logout"])){
        session_destroy();
        setcookie("CookieUser",0,1);
        setcookie("CookiePassword",0,1);
        header('Location:Formulario_EX.php');           
    }


    if(isset($_SESSION["login"]) && ($_SESSION["login"]==true)){
        if(($_SESSION["ValidUser"]=="sdk") && ($_SESSION["ValidPassword"]==md5("1234"))){

        
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" type="text/css" href="../../CSS/estiloT.css" />
        <title>Pagina de noticias PHP</title>
        
    </head>
    <body>


        <div id="wrapper">
            <header>
                <div class='define'>
                    <h1>Noticias</h1> <!-- Titulo de pagina -->
                </div>
            </header>
    
            <section>
                <div class='define'>
                    <!-- Continido de la pagina -->
                    Bienvenido......<?=$_SESSION["ValidUser"]?>
                    <a href="Login_OK_EX.php?Logout">[Logout]</a>
                    <br><br>
                    <p>Esta pagina te ayuda a encentrar las utlimas noticias y compartir tus noticias con las personas que forman parte de tu vida.</p>

                    <br><br>
                    <form action="Consultar-Noticias_EX.php" method="POST">
                        <input type="submit" name="ConsultarNoticias" value="Consultar Noticias">
                        <br><br>
                        <input type="submit" name="InsertarNoticias" value="Insertar Noticias">
                        <br><br>
                        <input type="submit" name="EliminarNoticias" value="Eliminar Noticias">
                        <br><br>
                        <br><br>
                        <br><br>
                    </form>
                </div>
            </section>
        </div>
    
        <footer>
            <div class='define'>
                <!-- Continido de pie de pagina -->
                <p>Gracias por visitar nuetra web</p>
            </div>
        </footer>



       
        <?php
                if(isset($_REQUEST['ConsultarNoticias'])){
                    header('Location:Consultar-Noticias_EX.php');
                }
            
            }
        }
        else{
            header('Location:Formulario_EX.php');           
        }

        
        ?>
    <body>
<html>
    