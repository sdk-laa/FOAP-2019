<?php
    session_start();
?>

<?php
    $comment="";
    if(isset($_REQUEST["Logout"])){
        session_destroy();
        setcookie("CookieUser",0,1);
        setcookie("CookiePassword",0,1);
        header('Location:SpiritSocial.php');           
    }

    if(isset($_REQUEST['AddNewPub'])){
        header('Location:SpiritSocial_AddNewPub.php');
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
                <div style= "width:200px"> <h2> Spirit Social </h2>   </div>
                <div style= "text-align:right"> 
                    Bienvenido.......... <?=$_SESSION["ValidUser"]?>
                    <a href="SpiritSocial_Login_OK.php?Logout">[Logout]</a>
                </div>
                
            </div>

        </header>


        <section>
            <div class='define'>
                <!--<div id ="logo"> <img src= "../imgs/SpiritSocial.jpg" alt="Logo" height="800px" width="250px"></div>-->
                <form action="SpiritSocial_Login_OK.php" method="POST">
                    <input type="submit" name="AddNewPub" value="Add New Pub">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" name="RemovePub" value="Remove Pub">
                    <br><br>
                    <br><br>
                    <div>
                        <b><p><span class="titulo"> Griezmann rumbo a Barcelona:</span></p></b>
                        <p><span> El francés concita el quorum en el área técnica del Barça por su calidad, experiencia y precio.</span></p>      
                        <p><span> La debacle en Champions refuerza la idea de poner competencia y fichar gol en la delantera.</span></p> 
                        <p><img src= "../imgs/Griezman.jpg" alt="Logo" height="400px" width="700px"></p>   
                        <input type="submit" name="Like" value="Like">
                        <p><span class="titulo"> Comment:</span></p>  
                        <textarea name="comment" rows="5" cols="40" <?php echo $comment;?>></textarea>
                        <br><br>
                        <br><br>
                    </div>
                    <div>
                        <b><p><span class="titulo"> Luis Suárez se pierde la final de Copa</span></p></b>
                        <p><span> El club azulgrana emitió un comunicado en el que aseguraba que la intervención había sido un éxito y que el uruguayo no podrá estar en Sevilla.</span></p>      
                        <p><img src= "../imgs/Suarez.jpg" alt="Logo" height="400px" width="700px"></p>   
                        <input type="submit" name="Like" value="Like">
                        <p><span class="titulo"> Comment:</span></p>  
                        <textarea name="comment" rows="5" cols="40" <?php echo $comment;?>></textarea>
                        <br><br>
                    </div>
                    <div>
                        <b><p><span class="titulo"> El Barça acelera los contactos finales por De Ligt</span></p></b>
                        <p><span> Tras el KO del Ajax en la Champions, el Barça quiere dejarlo todo lista para abordar su contratación cuando termine la Eredivise.</span></p>      
                        <p><img src= "../imgs/DeLigt.jpg" alt="Logo" height="400px" width="700px"></p> 
                        <input type="submit" name="Like" value="Like">
                        <p><span class="titulo"> Comment:</span></p>  
                        <textarea name="comment" rows="5" cols="40" <?php echo $comment;?>></textarea>
                        <br><br>
                    </div>

                </form>
                <!--<div style="float:left"> <img src= "../imgs/redesS.png" alt="Logo" height="750px" width="400px"></div>-->
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