<?php
    session_start();
?>

<?php
    // Declaracion de variables:
    $Title=$Description=$Image="";

    require("SpiritSocial_Functions.php");
        
        if(isset($_REQUEST["Logout"])){
            session_destroy();
            setcookie("CookieUser",0,1);
            setcookie("CookiePassword",0,1);
            header('Location:SpiritSocial.php');           
        } 

        if(isset($_REQUEST['MainMenu'])){
            header('Location:SpiritSocial_Login_OK.php');
        }



/*         if(($TitleError=="") && ($DescriptionError=="") && ($ImageError=="")){
            $_SESSION["Upload Pub"]=true;
            $ShowImage=true;
        } */

        if(isset($_SESSION["login"]) && ($_SESSION["login"]==true)){
            if(($_SESSION["ValidUser"]=="sdk") && ($_SESSION["ValidPassword"]==md5("Sdk1234!"))){
        
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
            <header>
                <div class='define'>
                    <div style= "width:200px"> <h2> Spirit Social </h2></div>
                    <div style= "text-align:right"> 
                        <?=$_SESSION["ValidUser"]?>
                        <a href="SpiritSocial_Login_OK.php?Logout">[Logout]</a>
                    </div> 
                </div>
            </header>

            <section>
                <div class='define'>
                    <div>
                    <form action="SpiritSocial_SeeNewPub.php" method="POST">
                        <input type="submit" name="MainMenu" value="Main Menu">
                        <br><br>
                        <br><br>
                    </form> 
                    </div> 

                    <?php        
                        echo "Titulo: ". $Title;
                        echo "Description: ". $Description;
                        echo "<img src=\"$Image_Upload\">"; 
                    
                    ?>
                </div>
            </section>
        </div>
    
        <footer>
            <div class='define'>
                <p>Al hacer clic en Registrar, aceptas nuestras Condiciones. Obtén más información sobre cómo recopilamos, usamos y compartimos tu información en la Política de datos, así como el uso que hacemos de las cookies y tecnologías similares en nuestra Política de cookies.</p>
            </div>
        </footer>
        <?php
                
           
            }
        }
        else{
            header('Location:SpiritSocial.php');           
        }

        
        ?>
    </body>
</html>