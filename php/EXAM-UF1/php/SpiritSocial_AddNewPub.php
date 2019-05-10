<?php
    session_start();
?>

<?php
    // Declaracion de variables:
    $Title=$Description="";
    $TitleError=$DescriptionError="";

    require("SpiritSocial_Functions.php");
        
        if(isset($_REQUEST["Logout"])){
            session_destroy();
            setcookie("CookieUser",0,1);
            setcookie("CookiePassword",0,1);
            header('Location:SpiritSocial.php');           
        } 

        if(isset($_REQUEST['MainMenu'])){
            header('Location:SpiritSocial_Login.php');
        }

        if(isset($_SESSION["login"]) && ($_SESSION["login"]==true)){
            if(($_SESSION["ValidUser"]=="sdk") && ($_SESSION["ValidPassword"]==md5("Sdk1234!"))){

    
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
                    <div style= "text-align:right"> 
                        <?=$_SESSION["ValidUser"]?>
                        <a href="SpiritSocial_Login.php?Logout">[Logout]</a>
                    </div> 
                </div>
            </header>

            <section>
                <div class='define'>
                    <div id ="logo"> <img src= "../imgs/SpiritSocial.jpg" alt="Logo" height="500px" width="500px"></div>
                    <div>
                    <form action="SpiritSocial_AddNewPub.php" method="POST">
                        <input type="submit" name="UploadPub" value="Upload Pub">
                        &nbsp;&nbsp;
                        <input type="submit" name="MainMenu" value="Main Menu">
                        <br><br>
                        <br><br>
                        
                        <h2><p><span class="Titulo"> Add New Pub</span></p></h2>
                        <p><span class="error">* Obligatory field</span></p>
                        <br><br>

                        Title:     <input type="text" name="Title" value="<?php echo $Title;?>">
                        <span class="error">* <?php echo $TitleError;?></span>
                        <br><br>
                        Description: <input type="text" name="Description" value="<?php echo $Description;?>">
                        <span class="error">* <?php echo $DescriptionError;?></span>
                        <br><br>
                        IMAGE:
                         
                    </form> 
                    </div>   
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